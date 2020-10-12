    @extends('layouts.app')

    @section('content')
        <div class="box">
            <div class="box-header margin-top-20"><h2>Modificar contraseña</h2></div>
            {{ Form::open(array('url' => route('profile/modify/password'))) }}
            @method('PUT')
            <div class="margin-top-20 align-items">
                <label>email</label>
                <label class="form-control">{{$user->email}}</label>
            </div>
            <div class="margin-top-20 align-items">
                <label>Contraseña</label>
                <input class="form-control" type="password" name="password" >
            </div>
            <div class="margin-top-20 align-items">
                <label>Repite contraseña</label>
                <input class="form-control" type="password" name="password_confirmation" >
            </div>
            <div class="form-group text-center margin-top-20">
                <button class="btn btn-success btn-submit">Guardar</button>
            </div>
            {{ Form::close() }}
        </div>

    @endsection

