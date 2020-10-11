@extends('layouts.app')
@section('content')
    <!--<h5>{{$type ?? null}}</h5>
    @foreach($users as $user)
        <p>{{$user->name}}</p>
    @endforeach-->
@include('menu.app')
<div class="container">
    <h2 class="margin-top-20">Asignaturas</h2>
    <div class="row margin-top-20 align-items">
        <label>Profesor</label>
        <select class="form-control">
            <option>profesor1</option>
            <option>profesor2</option>
            <option>profesor3</option>
        </select>
    </div>
    <div class="row margin-top-20 align-items">
        <label>Nombre</label>
        <input class="form-control" type="text" name="nameSubject">
    </div>
    <div class="row margin-top-20 align-items">
        <label>Color</label>
        <select class="form-control">
            <option>rojo</option>
            <option>verde</option>
            <option>lila</option>
        </select>
    </div>
    <div class="form-group text-center margin-top-20">
        <button class="btn btn-success btn-submit">Guardar</button>
    </div>
</div>
@endsection
