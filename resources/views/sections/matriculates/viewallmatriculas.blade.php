@extends('layouts.app')
@section('content')
    <!--<h5>{{$type ?? null}}</h5>
    @foreach($users as $user)
        <p>{{$user->name}}</p>
    @endforeach-->
@include('menu.app')
<div class="container">
    <h2 class="margin-top-20">Matrículas</h2>
    <button type="button" class="btn btn-primary margin-top-20">Crear matrícula</button>
    <div class="table-responsive margin-top-20">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Estudiante</th>
                <th scope="col">Curso</th>
                <th scope="col">Activo</th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="row">11</th>
                <td>testnombre</td>
                <td>base de datos</td>
                <td>1</td>
                <td><button type="button" class="btn btn-primary">Modificar</button></td>
                <td><button type="button" class="btn btn-danger">Borrar</button></td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection