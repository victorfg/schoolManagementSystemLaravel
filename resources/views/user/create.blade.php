@extends('layouts.app')
@section('content')
@include('menu.app')
<div class="container">
<div class="box">
    {{ Form::open(array('url' => route('user.store'))) }}
        <div class="box-header margin-top-20"><h2>Crear Usuario</h2></div>
        <div class="row margin-top-20 align-items">
            <label>Nombre</label>
            <input class="margin-left-10 form-control" type="text" name="name">
        </div>
        <div class="row margin-top-20 align-items">
            <label>Apellidos</label>
            <input class="margin-left-10 form-control" type="text" name="surname">
        </div>
        <div class="row margin-top-20 align-items">
            <label>Email</label>
            <input class="margin-left-10 form-control" type="email" name="email">
        </div>
        <div class="row margin-top-20 align-items">
            <label>Tipo</label>
            {{Form::select('type',$userTypes,null, ['class' => 'form-control'])}}
        </div>
        <div class="row margin-top-20 align-items">
            <label>Contraseña</label>
            <input class="form-control" type="password" name="password" >
        </div>
        <div class="row margin-top-20 align-items">
            <label>Repite contraseña</label>
            <input class="form-control" type="password" name="password_confirmation" >
        </div>
        <div class="form-group text-center margin-top-20">
            <button class="btn btn-success btn-submit">Guardar</button>
        </div>
    {{ Form::close() }}
</div>
</div>
@endsection
