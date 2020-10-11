@extends('layouts.app')
@section('content')
    <!--<h5>{{$type ?? null}}</h5>
    @foreach($users as $user)
        <p>{{$user->name}}</p>
    @endforeach-->
@include('menu.app')
<div class="container">
    <h2 class="margin-top-20">Usuarios</h2>
    <button type="button" class="btn btn-primary margin-top-20">Crear usuario</button>
    <div class="table-responsive margin-top-20">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Usuario</th>
                <th scope="col">Email</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellidos</th>
                <th scope="col">Teléfono</th>
                <th scope="col">NIF</th>
                <th scope="col">Fecha de registro</th>
                <th scope="col">Tipo</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="row">1</th>
                <td>admin</td>
                <td>prosen@example.com	</td>
                <td>Manuel</td>
                <td>Mendizábal González</td>
                <td>677784082</td>
                <td>987654</td>
                <td>0000-00-00 00:00:00</td>
                <td>admin</td>
                <td><button type="button" class="btn btn-primary">Modificar</button></td>
                <td><button type="button" class="btn btn-danger">Borrar</button></td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>student</td>
                <td>student@example.com	</td>
                <td>student</td>
                <td>student</td>
                <td>677784082</td>
                <td>987654</td>
                <td>0000-00-00 00:00:00</td>
                <td>admin</td>
                <td><button type="button" class="btn btn-primary">Modificar</button></td>
                <td><button type="button" class="btn btn-danger">Borrar</button></td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td>teacher</td>
                <td>teacher@example.com	</td>
                <td>teacher</td>
                <td>teacher</td>
                <td>677784082</td>
                <td>987654</td>
                <td>0000-00-00 00:00:00</td>
                <td>admin</td>
                <td><button type="button" class="btn btn-primary">Modificar</button></td>
                <td><button type="button" class="btn btn-danger">Borrar</button></td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection