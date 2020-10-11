@extends('layouts.app')
@section('content')
    <!--<h5>{{$type ?? null}}</h5>
    @foreach($users as $user)
        <p>{{$user->name}}</p>
    @endforeach-->
@include('menu.app')
<div class="container">
    <h2 class="margin-top-20">Asignaturas</h2>
    <button type="button" class="btn btn-primary margin-top-20">Crear asignatura</button>
    <table class="table table-hover margin-top-20">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Asignatura</th>
        <th scope="col"></th>
        <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        <tr>
        <th scope="row">1</th>
        <td>Mates</td>
        <td><button type="button" class="btn btn-primary">Modificar</button></td>
        <td><button type="button" class="btn btn-danger">Borrar</button></td>
        </tr>
        <tr>
        <th scope="row">2</th>
        <td>Fisica</td>
        <td><button type="button" class="btn btn-primary">Modificar</button></td>
        <td><button type="button" class="btn btn-danger">Borrar</button></td>
        </tr>
        <tr>
        </tr>
    </tbody>
    </table>
</div>
@endsection
