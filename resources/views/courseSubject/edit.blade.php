
    @extends('layouts.app')

    @section('content')
        @include('menu.app')
        <div class="container">
            <h2 class="margin-top-20">Cursos</h2>
            <h5 class="margin-top-20">Vincula el curso con la asignatura</h5>

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
            <div class="form-group text-center margin-top-20">
                <button class="btn btn-success btn-submit">Guardar</button>
            </div>
        </div>
    @endsection

