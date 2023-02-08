@extends('emails._layout')

@section('content')
    <p>&nbsp;</p>
    <h4>{{ $user->name }}!</h4>
    <h4>Ваш код для входа в систему  <h2>{{ $code }}</h2></h4>
    <h4>Активен в течение 3 минут.</h4>
    <p>&nbsp;</p>
@endsection

