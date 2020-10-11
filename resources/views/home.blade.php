@extends('layouts.app')
@section('content')
    <!--<h5>{{$type ?? null}}</h5>
    @foreach($users as $user)
        <p>{{$user->name}}</p>
    @endforeach-->
@include('menu.app')
<div class="container">
    <div class="center-horizontal-vertical margin-top-50">
       <span class="welcome-text">¡Bienvenido/a!</span> <img class="welcome-gif"src="{{asset('/images/welcome_school.gif')}}">
    </div>
</div>
@endsection