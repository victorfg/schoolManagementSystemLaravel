@extends('layouts.app')
@section('content')
    <!--<h5>{{$type ?? null}}</h5>
    @foreach($users as $user)
        <p>{{$user->name}}</p>
    @endforeach-->
@include('menu.app')
<div class="container">
    <h2 class="margin-top-20">Usuarios</h2>
    <div class="row margin-top-20 align-items">
        <label>Usuario</label>
        <input class="form-control" type="text" name="userValue">
    </div>
    <div class="row margin-top-20 align-items">
        <label>Contraseña</label>
        <input class="form-control" type="text" name="passwordValue">
    </div>
    <div class="row margin-top-20 align-items">
        <label>Email</label>
        <input class="form-control" type="text" name="emailValue">
    </div>
    <div class="row margin-top-20 align-items">
        <label>Nombre</label>
        <input class="form-control" type="text" name="nameValue">
    </div>
    <div class="row margin-top-20 align-items">
        <label>Apellidos</label>
        <input class="form-control" type="text" name="surnameValue">
    </div>
    <div class="row margin-top-20 align-items">
        <label>Teléfono</label>
        <input class="form-control" type="text" name="telephoneValue">
    </div>
    <div class="row margin-top-20 align-items">
        <label>NIF/DNI</label>
        <input class="form-control" type="text" name="dniValue">
    </div>
    <div class="row margin-top-20 align-items">
        <label>Tipo Usuario</label>
        <select class="form-control">
            <option>Administrador</option>
            <option>Profesor</option>
            <option>Estudiante</option>
        </select>
    </div>
    <div class="form-group text-center margin-top-20">
        <button class="btn btn-success btn-submit">Guardar</button>
    </div>
</div>
@endsection