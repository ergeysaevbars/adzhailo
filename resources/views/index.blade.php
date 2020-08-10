@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ __('messages.Events') }}
            @if(\Illuminate\Support\Facades\Auth::user())
                <a href="{{ route('schedules.create') }}" class="btn btn-sm btn-success"
                   style="float: right">{{ __('messages.Add Event') }}</a>
            @endif
        </div>
        <div class="card-body">
            <form action="{{ route('schedules.show') }}" method="get">
                <div class="form-group">
                    <label for="company">{{ __('messages.Choose company') }}</label>
                    <select class="form-control" id="company" name="company">
                        <option value="0"></option>
                        @foreach($companies as $company)
                            <option value="{{ $company->id }}">{{ $company->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button class="btn btn-info">{{ __('messages.View') }}</button>
            </form>
        </div>
    </div>
@endsection