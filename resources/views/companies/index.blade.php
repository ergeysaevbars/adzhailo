@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ __('messages.Companies') }}
            <a href="{{ route('companies.create') }}" class="btn btn-success btn-sm" style="float: right">
                {{ __('messages.Add company') }}
            </a>
        </div>
        <div class="card-body">
            <table class="table table-sm">
                <thead>
                <tr>
                    <th scope="col">{{ __('messages.Company') }}</th>
                    <th scope="col">{{ __('messages.Actions') }}</th>
                </tr>
                </thead>
                <tbody>

                @foreach($companies as $company)
                    <tr>
                        <td width="80%">{{ $company->name }}</td>
                        <td width="20%">
                            <div class="btn-group" role="group">
                                <form action="{{ route('companies.destroy', $company) }}" method="post">
                                    <a href="{{ route('companies.edit', $company) }}" class="btn btn-info btn-sm">{{ __('messages.Edit') }}</a>
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
            {{ $companies->links() }}
        </div>
    </div>
@endsection