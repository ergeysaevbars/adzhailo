@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ __('messages.Users') }}
            <a href="{{ route('users.create') }}" class="btn btn-success btn-sm" style="float: right">
                {{ __('messages.Add user') }}
            </a>
        </div>
        <div class="card-body">
            <table class="table table-sm">
                <thead>
                <tr>
                    <th scope="col">{{ __('messages.Users') }}</th>
                    <th scope="col">{{ __('messages.E-Mail Address') }}</th>
                    <th scope="col">{{ __('messages.Company') }}</th>
                    <th scope="col">{{ __('messages.Actions') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td width="40%">{{ $user->surname . ' ' . $user->name   . ' ' . $user->patronymic}}</td>
                        <td width="20%">{{ $user->email }}</td>
                        <td width="20%">{{ $user->company->name ?? __('messages.Not found') }}</td>
                        <td width="20%">
                            <div class="btn-group" role="group">
                                <form action="{{ route('users.destroy', $user) }}" method="post">
                                    <a href="{{ route('users.edit', $user) }}"
                                       class="btn btn-info btn-sm">{{ __('messages.Edit') }}</a>
                                    @csrf
                                    @if($user->id != Auth::user()->id)
                                        @method('DELETE')
                                        <button type="submit"
                                                class="btn btn-danger btn-sm">{{ __('messages.Delete') }}</button>
                                    @endif
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $users->links() }}
        </div>
    </div>
@endsection