@extends('layouts.app')

@section('content')
    @include('menu.app')
    <div class="container">
        <h2 class="margin-top-20">Usuarios</h2>
        <a href="{{route('user.create')}}" type="button" class="btn btn-primary margin-top-20">Crear usuario</a>
        <div class="table-responsive margin-top-20">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellidos</th>
                    <th scope="col">Email</th>
                    <th scope="col">Tipo</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($users as $user)
                    <tr>
                        <th scope="row">{{$user['id']}}</th>
                        <td>{{$user['name']}}</td>
                        <td>{{$user['surname']}}</td>
                        <td>{{$user['email']}}</td>
                        <td>{{$user['typeName']}}</td>
                        <td><a href="{{route('user.edit', $user['id'])}}" type="button" class="btn btn-primary">Modificar</a></td>
                        <td>
                            {{ Form::open(array('url' => route('user.destroy', $user['id']))) }}
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-submit">Borrar</button>
                            {{ Form::close() }}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
