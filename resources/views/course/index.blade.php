
    @extends('layouts.app')

    @section('content')
        @include('menu.app')
        <div class="container">
            <h2 class="margin-top-20">Cursos</h2>
            <a href="{{route('course.create')}}" type="button" class="btn btn-primary margin-top-20">Crear curso</a>
            <div class="table-responsive margin-top-20">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Inicio</th>
                        <th scope="col">Fin</th>
                        <th scope="col">Activo</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($courses as $course)
                        <tr>
                            <th scope="row">{{$course->id}}</th>
                            <td>{{$course->name}}</td>
                            <td>{{$course->description}}</td>
                            <td>{{$course->date_start}}</td>
                            <td>{{$course->date_end}}</td>
                            <td>{{$course->active}}</td>
                            <td><a href="{{route('course.edit', $course->id)}}" type="button" class="btn btn-primary">Modificar</a></td>
                            <td><a href="{{route('courseSubject.index', $course->id)}}" type="button" class="btn btn-success">Asignaturas</a></td>
                            <td>
                                {{ Form::open(array('url' => route('course.destroy', $course->id))) }}
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

