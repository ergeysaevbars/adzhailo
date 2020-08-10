@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">
            {!! __('messages.Events') . ': ' . '<b>'. $company->name . '</b>' !!}
            @if(\Illuminate\Support\Facades\Auth::user())
                <a href="{{ route('schedules.create') }}" class="btn btn-sm btn-success"
                   style="float: right">{{ __('messages.Add Event') }}</a>
            @endif
        </div>
        <div class="card-body">
            @foreach($schedules as $date => $schedule)
                <h4 align="center">{{ $date }}</h4>
                <table class="table table-bordered table-sm">
                    <thead>
                    <tr>
                        <th scope="col">{{ __('messages.Shift') }}</th>
                        <th scope="col">{{ __('messages.Project name') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($shifts as $shift)
                        <tr>
                            <td>{{ $shift->name }}</td>
                            <td>
                                @foreach($schedule as  $sch)
                                    @if($sch['shift'] == $shift->id)
                                        <div class="card">
                                            <div class="card-header">
                                                {{ $sch['project_name'] }}
                                                @if(\Illuminate\Support\Facades\Auth::user())
                                                    <form action="{{ route('schedules.destroy', $sch['id']) }}" style="float: right" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-sm btn-danger">Удалить</button>
                                                    </form>
                                                @endif
                                            </div>
                                            <div class="card-body">
                                                <p>{{ $sch['price'] }}</p>
                                                <p>{{ $sch['type'] }}</p>
                                                <p>{{ $sch['user'] }}</p>
                                                @if(\Illuminate\Support\Facades\Auth::user())
                                                    <a href="{{ route('schedules.edit', $sch['id']) }}"
                                                       class="btn btn-sm btn-info">
                                                        {{ __('messages.Edit') }}
                                                    </a>
                                                @endif
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endforeach
        </div>
    </div>
@endsection