@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('messages.' . (!isset($user) ? 'Add' : 'Edit') . ' user') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ !isset($user) ? route('users.store') : route('users.update', $user) }}">
                            @isset($user)
                                @method('PUT')
                            @endisset
                            @csrf

                            <div class="form-group row">
                                <label for="surname" class="col-md-4 col-form-label text-md-right">{{ __('messages.Surname') }}</label>

                                <div class="col-md-6">
                                    <input id="surname" type="text" class="form-control @error('surname') is-invalid @enderror" name="surname" value="{{ $user->surname ?? old('surname') }}"  autocomplete="surname" autofocus>

                                    @error('surname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('messages.Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name ?? old('name') }}"  autocomplete="name">

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="patronymic" class="col-md-4 col-form-label text-md-right">{{ __('messages.Patronymic') }}</label>

                                <div class="col-md-6">
                                    <input id="patronymic" type="text" class="form-control @error('patronymic') is-invalid @enderror" name="patronymic" value="{{ $user->patronymic ?? old('patronymic') }}"  autocomplete="patronymic">

                                    @error('patronymic')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="company" class="col-md-4 col-form-label text-md-right">{{ __('messages.Company') }}</label>

                                <div class="col-md-6">
                                    <select class="form-control" id="company" name="company">
                                        <option value="0"></option>
                                        @foreach($companies as $company)
                                            <option value="{{ $company->id }}" {{ ($user->company_id ?? old('company')) == $company->id ? 'selected' : '' }}>{{ $company->name }}</option>
                                        @endforeach
                                    </select>
                                    <small id="emailHelp" class="form-text text-muted">{{ __('messages.Field blank') }}</small>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('messages.E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email ?? old('email') }}"  autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('messages.Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="text" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('messages.' . (!isset($user) ? 'Add' : 'Edit') . ' user') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
