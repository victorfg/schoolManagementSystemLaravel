@extends('layouts.app')
@section('content')
@include('menu.app')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xs-12">
                {!! Form::open(['url' => url('profile/modify')]) !!}
                    @include('profile.form')
                {!! Form::close() !!}
            </div>
            @if($modified??false)
                <label style="color: forestgreen;">¡El usuario ha sido modificado correctamente!</label>
            @endif
        </div>
    </div>
</div>
@endsection
