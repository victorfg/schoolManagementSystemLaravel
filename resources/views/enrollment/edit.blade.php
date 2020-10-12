
    @extends('layouts.app')

    @section('content')
        @include('menu.app')
        <div class="container">
            {{ Form::open(array('url' => route('enrollment.update',$enrollment->id))) }}
            @method('PUT')
            <h2 class="margin-top-20">Matrículas</h2>
            <h5 class="margin-top-20">Elige un curso y estudiante para hacer la matrícula</h5>
            <div class="row margin-top-20 align-items">
                <label>Curso</label>
                {{Form::select('course_id',$courses, $enrollment->course->id, ['class' => 'form-control'])}}
            </div>
            <div class="row margin-top-20 align-items">
                <label>Estudiante</label>
                {{Form::select('user_id',$students, $enrollment->user->id, ['class' => 'form-control'])}}
            </div>
            <div class="row margin-top-20  align-items">
                <label>Estado</label>
                {{Form::select('status',[1=>'Activado',0=>'Desactivado'], $enrollment->status, ['class' => 'form-control'])}}
            </div>
            <div class="form-group text-center margin-top-20">
                <button class="btn btn-success btn-submit">Guardar</button>
            </div>
            {{ Form::close() }}
        </div>
    @endsection

