@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ __('messages.' . ( isset($shift) ? 'Edit' : 'Add') . ' shift') }}
        </div>
        <div class="card-body">
            <form action="{{ isset($shift) ? route('shifts.update', $shift) : route('shifts.store') }}"
                  method="post">
                @isset($shift)
                    @method('PUT')
                @endisset
                @csrf
                <div class="form-group">
                    <label for="name">{{ __('messages.Shift name') }}</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                           value="{{ $shift->name ?? '' }}">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <button type="submit"
                        class="btn btn-primary">{{ __('messages.' . ( isset($shift) ? 'Edit' : 'Add') . ' shift') }}</button>
            </form>
        </div>
    </div>
@endsection