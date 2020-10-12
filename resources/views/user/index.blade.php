@extends('layouts.app')

@section('content')
    @include('menu.app')
    <div class="container">
        <h2 class="margin-top-20">Usuarios</h2>
        <a href="" type="button" class="btn btn-primary margin-top-20">Crear usuario</a>
        <div class="table-responsive margin-top-20">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Email</th>
                    <th scope="col">Tipo</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row"></th>
                        <td>Alberto</td>
                        <td>alberto@gmail.com</td>
                        <td>teacher</td>
                        <td><a href="" type="button" class="btn btn-primary">Modificar</a></td>
                        <td>
                            <button type="submit" class="btn btn-danger btn-submit">Borrar</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
