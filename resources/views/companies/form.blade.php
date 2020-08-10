@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ __('messages.' . ( isset($company) ? 'Edit' : 'Add') . ' company') }}
        </div>
        <div class="card-body">
            <form action="{{ isset($company) ? route('companies.update', $company) : route('companies.store') }}"
                  method="post">
                @isset($company)
                    @method('PUT')
                @endisset
                @csrf
                <div class="form-group">
                    <label for="name">{{ __('messages.Company name') }}</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                           value="{{ $company->name ?? '' }}">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <button type="submit"
                        class="btn btn-primary">{{ __('messages.' . ( isset($company) ? 'Edit' : 'Add') . ' company') }}</button>
            </form>
        </div>
    </div>
@endsection