@extends('layouts.app')
@section('content')
    <!--<h5>{{$type ?? null}}</h5>
    @foreach($users as $user)
        <p>{{$user->name}}</p>
    @endforeach-->
@include('menu.app')
<div class="container">
    <h2 class="margin-top-20">Cursos</h2>
    <button type="button" class="btn btn-primary margin-top-20">Asignar horario a asignatura</button>
    <div class="table-responsive margin-top-20">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">id_curso</th>
                <th scope="col">id_asignatura</th>
                <th scope="col">Inicio</th>
                <th scope="col">Fin</th>
                <th scope="col">Dias</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="row">11</th>
                <td>9</td>
                <td>18</td>
                <td>02:04:00</td>
                <td>03:05:00</td>
                <td>m|w|f</td>
                <td><button type="button" class="btn btn-primary">Modificar</button></td>
                <td><button type="button" class="btn btn-danger">Borrar</button></td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection