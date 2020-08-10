@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ __('messages.Shifts') }}
            <a href="{{ route('shifts.create') }}" class="btn btn-success btn-sm" style="float: right">
                {{ __('messages.Add shift') }}
            </a>
        </div>
        <div class="card-body">
            <table class="table table-sm">
                <thead>
                <tr>
                    <th scope="col">{{ __('messages.Shift') }}</th>
                    <th scope="col">{{ __('messages.Actions') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($shifts as $shift)
                    <tr>
                        <td width="80%">{{ $shift->name }}</td>
                        <td width="20%">
                            <div class="btn-group" role="group">
                                <form action="{{ route('shifts.destroy', $shift) }}" method="post">
                                    <a href="{{ route('shifts.edit', $shift) }}" class="btn btn-info btn-sm">{{ __('messages.Edit') }}</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">{{ __('messages.Delete') }}</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection