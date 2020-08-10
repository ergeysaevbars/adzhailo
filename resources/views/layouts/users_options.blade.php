<option value="0">{{ __('messages.Choose employee') }}</option>
@foreach($users as $user)
    <option value="{{ $user->id }}">{{ $user->surname . ' ' . $user->name . ' ' . $user->patronymic }}</option>
@endforeach