<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'DQRS') }}</title>
        <!-- Favicon -->
        <link href="{{ secure_asset('argon/img/brand/favicon.png') }}" rel="icon" type="image/png">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
        <!-- Icons -->
        <link href="{{ secure_asset('argon/vendor/nucleo/css/nucleo.css') }}" rel="stylesheet">
        <link href="{{ secure_asset('argon/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
        <!-- Argon CSS -->
        <link type="text/css" href="{{ secure_asset('argon/css/argon.css?v=1.0.0') }}" rel="stylesheet">
        <link type="text/css" href="{{ secure_asset('argon/css/animate.css') }}" rel="stylesheet">



    </head>
    <body class="{{ $class ?? '' }}">


        <div class="main-content">
            {{-- @include('layouts.navbars.navs.welcome') --}}
            @yield('content')
        </div>


        <script src="{{ secure_asset('assets/js/app.js') }}"></script>
        <script src="{{ secure_asset('argon/vendor/jquery/dist/jquery.min.js') }}"></script>
        <!-- Argon JS -->
        <script src="{{ secure_asset('argon/js/argon.js?v=1.0.0') }}"></script>


        @stack('js')


    </body>
</html>
