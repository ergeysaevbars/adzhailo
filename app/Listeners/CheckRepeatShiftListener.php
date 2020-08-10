<?php

namespace App\Listeners;

use App\Models\Schedule;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Redirect;

class CheckRepeatShiftListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $schedule = Schedule::where(['company_id' => $event->request->company, 'shift_id' => $event->request->shift])->first();
        if ($schedule){
            Redirect::back()->with('alert-warning', __('messages.Action event record'));
        }
    }
}
