@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ __('messages.' . (isset($schedule) ? 'Edit' : 'Add') .  ' Event') }}
        </div>
        <div class="card-body">
            @if(\Illuminate\Support\Facades\Session::has('alert-warning'))
                <div class="alert alert-warning" role="alert">
                    {{ \Illuminate\Support\Facades\Session::get('alert-warning') }}
                </div>
            @endif
            <form action="{{ isset($schedule) ? route('schedules.update', $schedule) : route('schedules.store') }}"
                  method="post">
                @isset($schedule)
                    @method('PUT')
                @endisset
                @csrf
                <div class="form-group row">
                    <div class="col-sm-2">
                        <label for="project_name">{{ __('messages.Project name') }}</label>
                    </div>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('project_name') is-invalid @enderror"
                               id="project_name" name="project_name"
                               value="{{ $schedule->project_name ?? old('project_name') }}">
                        @error('project_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-2">
                        <label for="price">{{ __('messages.Price') }}</label>
                    </div>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('price') is-invalid @enderror" id="price"
                               name="price"
                               value="{{ $schedule->price ?? old('price') }}">
                        @error('price')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-2">
                        <label for="type">{{ __('messages.Type') }}</label>
                    </div>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('type') is-invalid @enderror" id="type"
                               name="type"
                               value="{{ $schedule->type ?? old('type') }}">
                        @error('type')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-2">
                        <label for="company">{{ __('messages.Company') }}</label>
                    </div>
                    <div class="col-sm-10">
                        <select class="form-control @error('company') is-invalid @enderror" id="company" name="company">
                            <option value="0">{{ __('messages.Choose company') }}</option>
                            @foreach($companies as $company)
                                <option value="{{ $company->id }}" {{ ($schedule->company_id ?? old('company')) == $company->id ? 'selected' : '' }}>
                                    {{ $company->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('company')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-2">
                        <label for="user">{{ __('messages.Employee') }}</label>
                    </div>
                    <div class="col-sm-10">
                        <select class="form-control @error('user') is-invalid @enderror" id="user" name="user">
                            @isset($users)
                                <option value="0">{{ __('messages.Choose employee') }}</option>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}" {{ ($schedule->user_id ?? old('user')) == $user->id ? 'selected' : '' }}>{{ $user->surname . ' ' . $user->name . ' ' . $user->patronymic }}</option>
                                @endforeach
                            @endisset
                        </select>
                        @error('user')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-2">
                        <label for="date">{{ __('messages.Date') }}</label>
                    </div>
                    <div class="col-sm-10">
                        <input type="date" class="form-control @error('date') is-invalid @enderror" id="date"
                               name="date" value="{{ $schedule->date ?? old('date') }}">
                        @error('date')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-2">
                        <label for="shift">{{ __('messages.Shift') }}</label>
                    </div>
                    <div class="col-sm-10">
                        <select class="form-control @error('shift') is-invalid @enderror" id="shift" name="shift">
                            <option value="0">{{ __('messages.Choose shift') }}</option>
                            @foreach($shifts as $shift)
                                <option value="{{ $shift->id }}" {{ ($schedule->shift_id ?? old('$shift')) == $shift->id ? 'selected' : '' }}>
                                    {{ $shift->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('shift')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <button class="btn btn-primary"
                        type="submit">{{ __('messages.' . (isset($schedule) ? 'Edit' : 'Add') .  ' Event') }}</button>
            </form>
        </div>
    </div>
    <script src="{{ asset('js/ajax.js') }}"></script>
@endsection
