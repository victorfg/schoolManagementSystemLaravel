
    @extends('layouts.app')

    @section('content')
        @include('menu.app')
        <div class="container">
            <h2 class="margin-top-20">Curso: {{$course->name}}</h2>
            <a href="{{route('subjects.create',$course->id)}}" type="button" class="btn btn-primary margin-top-20">Asignar asignatura a curso</a>
            <div class="table-responsive margin-top-20">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">id_curso</th>
                        <th scope="col">id_asignatura</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($courseSubjects as $courseSubject)
                        <tr>
                            <th scope="row">{{$courseSubject->id}}</th>
                            <td>{{$courseSubject->course->name}}</td>
                            <td>{{$courseSubject->subject->name}}</td>
                            <td><a href="{{route('subjects.edit', [$course->id, $courseSubject->id])}}" type="button" class="btn btn-primary">Modificar</a></td>
                            <td><a href="{{route('schedules.index', [$course->id, $courseSubject->subject->id])}}" type="button" class="btn btn-success">Horarios</a></td>
                            <td>
                                {{ Form::open(array('url' => route('subjects.destroy', [$course->id, $courseSubject->id]))) }}
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

