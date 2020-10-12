
    @extends('layouts.app')

    @section('content')
        {{$course}}
        @include('menu.app')
        <div class="container">
            <h2 class="margin-top-20">Cursos</h2>
            <div class="row margin-top-20 align-items">
                <label>Nombre</label>
                <input class="form-control" type="text" name="nameValue">
            </div>
            <div class="row margin-top-20 align-items">
                <label>Descripción</label>
                <input class="form-control" type="text" name="descriptionValue">
            </div>
            <div class="row margin-top-20 align-items">
                <label for="date-input-inicio">Inicio</label>
                <input class="form-control" type="date" value="2020-08-19" id="date-input-inicio">
            </div>
            <div class="row margin-top-20 align-items">
                <label for="date-input-fin">Fin</label>
                <input class="form-control" type="date" value="2020-08-19" id="date-input-fin">
            </div>
            <div class="form-group row margin-top-20">
                <div class="form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" type="checkbox"> Curso Activado
                    </label>
                </div>
            </div>
            <div class="form-group text-center margin-top-20">
                <button class="btn btn-success btn-submit">Guardar</button>
            </div>
        </div>
    @endsection

