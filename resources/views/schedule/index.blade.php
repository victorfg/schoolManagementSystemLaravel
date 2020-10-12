
    @extends('layouts.app')

    @section('content')
        {{$schedules}}
        @include('menu.app')
        <div class="container">
            <h2 class="margin-top-20">Curso: {{$course->name}}</h2>
            <a href="{{route('schedules.create',[$course->id,$subject->id])}}" type="button" class="btn btn-primary margin-top-20">Asignar horario a asignatura/curso</a>
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
                    @foreach ($schedules as $schedule)
                        <tr>
                            <th scope="row">{{$schedule->id}}</th>
                            <td>{{$schedule->course->name}}</td>
                            <td>{{$schedule->subject->name}}</td>
                            <td>{{$schedule->time_start}}</td>
                            <td>{{$schedule->time_end}}</td>
                            <td>{{$schedule->days}}</td>
                            <td><a href="{{route('subjects.edit', $schedule->id)}}" type="button" class="btn btn-primary">Modificar</a></td>
                            <td>
                                {{ Form::open(array('url' => route('subjects.destroy', $schedule->id))) }}
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

