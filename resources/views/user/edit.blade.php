@extends('layouts.app')
@section('content')
@include('menu.app')
<div class="container">
<div class="box">
    {{ Form::open(array('url' => route('user.update',$user->id))) }}
    @method('PUT')
        <div class="box-header margin-top-20"><h2>Crear Usuario</h2></div>
        <div class="row margin-top-20 align-items">
            <label>Nombre</label>
            <input class="margin-left-10 form-control" type="text" name="name" value="{{ $user->name }}">
        </div>
        <div class="row margin-top-20 align-items">
            <label>Apellidos</label>
            <input class="margin-left-10 form-control" type="text" name="surname" value="{{ $user->surname }}">
        </div>
        <div class="row margin-top-20 align-items">
            <label>Email</label>
            <input class="margin-left-10 form-control" type="email" name="email" value="{{ $user->email }}">
        </div>
        <div class="row margin-top-20 align-items">
            <label>Tipo</label>
            {{Form::select('type',$userTypes,$user->type, ['class' => 'form-control'])}}
        </div>
        <div class="form-group text-center margin-top-20">
            <button class="btn btn-success btn-submit">Guardar</button>
        </div>
    {{ Form::close() }}
</div>
</div>
@endsection
