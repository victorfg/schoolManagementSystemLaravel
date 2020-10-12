
    @extends('layouts.app')

    @section('content')
        @include('menu.app')
        <div class="container">
            <h2 class="margin-top-20">Asignaturas</h2>
            <a href="{{route('subject.create')}}" type="button" class="btn btn-primary margin-top-20">Crear asignatura</a>
            <table class="table table-hover margin-top-20">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Asignatura</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($subjects as $subject)
                <tr>
                    <th scope="row">{{$subject->id}}</th>
                    <td>{{$subject->name}}</td>
                    <td><a href="{{route('subject.edit', $subject->id)}}" type="button" class="btn btn-primary">Modificar</a></td>
                    <td>
                        {{ Form::open(array('url' => route('subject.destroy', $subject->id))) }}
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-submit">Borrar</button>
                        {{ Form::close() }}
                    </td>
                   </tr>
                @endforeach
                <tr>
                </tr>
                </tbody>
            </table>
        </div>
    @endsection

