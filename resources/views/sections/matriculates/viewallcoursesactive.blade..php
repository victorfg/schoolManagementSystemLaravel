@extends('layouts.app')
@section('content')
    <!--<h5>{{$type ?? null}}</h5>
    @foreach($users as $user)
        <p>{{$user->name}}</p>
    @endforeach-->
@include('menu.app')
<div class="container">
    <h2 class="margin-top-20">Matrículas</h2>
    <div class="table-responsive margin-top-20">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Curso</th>
                <th scope="col">Descripción</th>
                <th scope="col">Inicio</th>
                <th scope="col">Fin</th>
                <th scope="col">Activo</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="row">11</th>
                <td>Base de datos</td>
                <td>Base de datos descripción</td>
                <td>2020-08-24</td>
                <td>2020-08-24</td>
                <td>1</td>
                <td><button type="button" class="btn btn-primary">Seleccionar</button></td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection