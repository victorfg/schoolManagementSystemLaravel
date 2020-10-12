
    @extends('layouts.app')

    @section('content')
        @include('menu.app')
        <div class="container">
            {{ Form::open(array('url' => route('course.update',$course->id))) }}
            @method('PUT')
            <h2 class="margin-top-20">Cursos</h2>
            <div class="row margin-top-20 align-items">
                <label>Nombre</label>
                <input class="form-control" type="text" name="name" value="{{$course->name}}">
            </div>
            <div class="row margin-top-20 align-items">
                <label>Descripción</label>
                <input class="form-control" type="text" name="description" value="{{$course->description}}">
            </div>
            <div class="row margin-top-20 align-items">
                <label for="date-input-inicio">Inicio</label>
                <input class="form-control" type="date" name="date_start" value="{{$course->date_start}}">
            </div>
            <div class="row margin-top-20 align-items">
                <label for="date-input-fin">Fin</label>
                <input class="form-control" type="date" name="date_end" value="{{$course->date_end}}">
            </div>
            <div class="form-group row margin-top-20">
                <div class="form-check">
                    <label class="form-check-label">
                        @if($course->active)
                            <input class="form-check-input" type="checkbox" name="active" checked> Activado
                        @else
                            <input class="form-check-input" type="checkbox" name="active"> Activado
                        @endif
                    </label>
                </div>
            </div>
            <div class="form-group text-center margin-top-20">
                <button class="btn btn-success btn-submit">Guardar</button>
            </div>
            {{ Form::close() }}
        </div>
    @endsection

