
    @extends('layouts.app')

    @section('content')
        @include('menu.app')
        <div class="container">
            <h2 class="margin-top-20">Matrículas</h2>
            <a href="{{route('enrollment.create')}}" type="button" class="btn btn-primary margin-top-20">Crear matrícula</a>
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
                    @foreach ($enrollments as $enrollment)
                        <tr>
                            <th scope="row">{{$enrollment->id}}</th>
                            <td>{{$enrollment->user->name}}</td>
                            <td>{{$enrollment->course->name}}</td>
                            <td>{{$enrollment->status}}</td>
                            <td><a href="{{route('enrollment.edit', $enrollment->id)}}" type="button" class="btn btn-primary">Modificar</a></td>
                            <td>
                                {{ Form::open(array('url' => route('enrollment.destroy', $enrollment->id))) }}
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

