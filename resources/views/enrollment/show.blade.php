
    @extends('layouts.app')

    @section('content')
        {{$enrollment}}
        @include('menu.app')
        <div class="container">
            <h2 class="margin-top-20">Matrículas</h2>
            <h5 class="margin-top-20">Elige un curso y estudiante para hacer la matrícula</h5>
            <div class="row margin-top-20 align-items">
                <label>Curso</label>
                <select class="form-control">
                    <option>base de datos 1</option>
                    <option>base de datos 2</option>
                    <option>base de datos 3</option>
                </select>
            </div>
            <div class="row margin-top-20 align-items">
                <label>Estudiante</label>
                <select class="form-control">
                    <option>estudiante1</option>
                    <option>estudiante2</option>
                    <option>estudiante3</option>
                </select>
            </div>
            <div class="form-check margin-top-20">
                <input type="checkbox" class="form-check-input" id="checkActivadoMatricula">
                <label class="form-check-label">Activado</label>
            </div>
            <div class="form-group text-center margin-top-20">
                <button class="btn btn-success btn-submit">Guardar</button>
            </div>
        </div>
    @endsection

