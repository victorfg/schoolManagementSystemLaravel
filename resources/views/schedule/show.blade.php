
    @extends('layouts.app')

    @section('content')
        {{$schedule}}
        @include('menu.app')
        <div class="container">
            <h2 class="margin-top-20">Cursos</h2>
            <h5 class="margin-top-20">Vincula el horario con la asignatura</h5>

            <div class="row margin-top-20 align-items">
                <label>Curso</label>
                <select class="form-control">
                    <option>Bases de datos</option>
                    <option>Programación</option>
                    <option>Prácticas</option>
                </select>
            </div>
            <div class="row margin-top-20 align-items">
                <label>Asignatura</label>
                <select class="form-control">
                    <option>PHP y MSQL</option>
                    <option>Java</option>
                    <option>React</option>
                </select>
            </div>
            <div class="form-group row">
                <label for="example-time-input" class="col-form-label">Inicio</label>
                <input class="form-control" type="time" value="13:45:00" id="example-time-input">
            </div>
            <div class="form-group row">
                <label for="example-time-input" class="col-form-label">Fin</label>
                <input class="form-control" type="time" value="16:45:00" id="example-time-input">
            </div>
            <div class="row margin-top-20 align-items">
                <select class="custom-select" multiple>
                    <option selected>Open this select menu</option>
                    <option value="1">Lunes</option>
                    <option value="2">Martes</option>
                    <option value="3">Miercoles</option>
                    <option value="4">Jueves</option>
                    <option value="5">Viernes</option>
                    <option value="6">Sabado</option>
                    <option value="7">Domingo</option>
                </select>
            </div>
            <div class="form-group text-center margin-top-20">
                <button class="btn btn-success btn-submit">Guardar</button>
            </div>
        </div>
    @endsection

