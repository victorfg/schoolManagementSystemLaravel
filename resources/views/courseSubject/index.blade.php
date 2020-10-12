
    @extends('layouts.app')

    @section('content')
        @include('menu.app')
        <div class="container">
            <h2 class="margin-top-20">Curso: {{$course->name}}</h2>
            @can('canModifyCoursesSubjects')<a href="{{route('courseSubject.create',$course->id)}}" type="button" class="btn btn-primary margin-top-20">Asignar asignatura a curso</a>@endcan
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
                            @can('canModifyCoursesSubjects')<td><a href="{{route('courseSubject.edit', [$course->id, $courseSubject->id])}}" type="button" class="btn btn-primary">Modificar</a></td>@endcan
                            <td><a href="{{route('schedules.index', [$course->id, $courseSubject->subject->id])}}" type="button" class="btn btn-success">Horarios</a></td>
                            @can('canModifyCoursesSubjects')<td>
                                {{ Form::open(array('url' => route('courseSubject.destroy', [$course->id, $courseSubject->id]))) }}
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-submit">Borrar</button>
                                {{ Form::close() }}@endcan
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endsection

