@extends('layouts.app')
@section('content')
    <!--<h5>{{$type ?? null}}</h5>
    @foreach($users as $user)
        <p>{{$user->name}}</p>
    @endforeach-->
@include('menu.app')
<div class="container">
<div class="box">
    <div class="box-header margin-top-20"><h2>Crear Usuario</h2></div>
    <div class="row margin-top-20 align-items">
        <label>Nombre</label>
        <input class="margin-left-10 form-control" type="text" name="name" value="{{$user->name}}">
    </div>
    <div class="row margin-top-20 align-items">
        <label>Email</label>
        <input class="margin-left-10 form-control" type="email" name="email"  value="{{$user->email}}">
    </div>
    <div class="row margin-top-20 align-items">
        <label>Tipo</label>
        <select class="form-control">
            <option>Profesor</option>
            <option>Estudiante</option>
        </select>
    </div>
    <div class="form-group text-center margin-top-20">
        <button class="btn btn-success btn-submit">Guardar</button>
    </div>
</div>
</div>
@endsection