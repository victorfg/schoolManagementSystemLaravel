<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{config('app.name', "Laravel")}}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet"> 

        <style>
            body {
                font-family: 'Nunito';
            }
        </style>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body class="image-main-div" style="background-image: url({{asset('images/cover.jpg')}})">
            @if (Route::has('login'))
                <div class="header">
                    <div class="title">
                        Sistema de gestión escolar
                    </div>
                    <div class="login-register">
                        @auth
                            <a href="{{ url('/home') }}">Home</a>
                        @else
                            <a href="{{ route('login') }}">Login</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}">Register</a>
                            @endif
                        @endif
                    </div>
                </div>
            @endif
    </body>
</html>
