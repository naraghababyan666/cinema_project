@extends('emails._layout')

@section('content')
<p>&nbsp;</p>
<p>{{ $user->name }}!</p>
<p>Вас зарегистрировали на сайте
<h3>
    <a href="{{ env('APP_URL') }}">{{ env('APP_NAME') }}</a>
</h3>
</p>
<p>Логин: {{ $user->email }}</p>
<p>Пароль: {{ $user->open_password }}</p>
<p>&nbsp;</p>
@endsection