
    @extends('layouts.app')

    @section('content')
        @include('menu.app')
        <div class="container">
            {{ Form::open(array('url' => route('courseSubject.update',[$course->id,$courseSubject->id]))) }}
            @method('PUT')
                <h2 class="margin-top-20">Curso: {{$course->name}}</h2>
                <h5 class="margin-top-20">Vincula el curso con la asignatura</h5>
                <div class="row margin-top-20 align-items">
                    <label>Curso</label>
                    {{Form::select('course_name',$courses, $courseSubject->course_id, ['class' => 'form-control', 'disabled' => true])}}
                    <input type="hidden" name ="course_id" value="{{$course->id}}">
                </div>
                <div class="row margin-top-20 align-items">
                    <label>Asignatura</label>
                    {{Form::select('subject_id',$subjects, $courseSubject->subject_id, ['class' => 'form-control'])}}
                </div>
                <div class="form-group text-center margin-top-20">
                    <button class="btn btn-success btn-submit">Guardar</button>
                </div>
            {{ Form::close() }}
        </div>
    @endsection

