<?php

namespace App\Http\Controllers;

use App\Events\CheckRepeatShift;
use App\Http\Requests\ScheduleRequest;
use App\Models\Company;
use App\Models\Schedule;
use App\Models\Shift;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class SchedulesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::orderBy('name')->get();
        return view('index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::orderBy('name')->get();
        $shifts = Shift::all();
        return view('schedules.form', compact('companies', 'shifts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ScheduleRequest $request)
    {
        if ($this->checkCompanyShift($request))
            return back()->with('alert-warning', __('messages.Action event record'));
        Schedule::create([
           'project_name' => $request->project_name,
           'price' => $request->price,
           'type' => $request->type,
           'company_id' => $request->company,
           'user_id' => $request->user,
           'date' => $request->date,
           'shift_id' => $request->shift,
        ]);
        return redirect()->route('schedules.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $company = Company::find($request->company);
        $schedules = Schedule::where('company_id', $request->company)->orderBy('date')->get();
        $shifts = Shift::all();
        $tree = [];
        foreach ($schedules as $schedule) {
            $date = Carbon::parse($schedule->date)->locale('ru_RU')->isoFormat('LLLL');
            $date = mb_substr($date, 0, mb_strlen($date) - 6);
            $tree[$date][] = [
                'id' => $schedule->id,
                'project_name' => $schedule->project_name,
                'price' => $schedule->price,
                'type' => $schedule->type,
                'user' => $schedule->user->surname . ' ' . $schedule->user->name . ' ' . $schedule->user->patronymic,
                'shift' => $schedule->shift_id

            ];
        }
        $schedules = $tree;
//        dd($schedules);
        return view('schedules.show', compact('company', 'schedules', 'shifts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function edit(Schedule $schedule)
    {
        $users = User::where('company_id',  $schedule->company_id)->orderBy('surname')->orderBy('name')->orderBy('patronymic')->get();
        $companies = Company::orderBy('name')->get();
        $shifts = Shift::all();
        return view('schedules.form', compact('schedule', 'users',  'companies', 'shifts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function update(ScheduleRequest $request, Schedule $schedule)
    {
        if ($this->checkCompanyShift($request))
            return back()->with('alert-warning', __('messages.Action event record'));
        $schedule->update([
            'project_name' => $request->project_name,
            'price' => $request->price,
            'type' => $request->type,
            'company_id' => $request->company,
            'user_id' => $request->user,
            'date' => $request->date,
            'shift_id' => $request->shift,
        ]);
        return redirect()->route('schedules.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function destroy(Schedule $schedule)
    {
        $schedule->delete();
        return redirect()->route('schedules.index');
    }

    /*
     * проверяет чтобы в одну смену было только одно событие
     * */
    private function checkCompanyShift($request)
    {
        return Schedule::where(['company_id' => $request->company, 'shift_id' => $request->shift, 'date' => $request->date])->first();
    }
}
