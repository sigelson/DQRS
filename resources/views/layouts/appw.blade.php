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
        <script src="{{ secure_asset('assets/js/app.js') }}"></script>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
        <!-- Icons -->
        <link href="{{ secure_asset('argon/vendor/nucleo/css/nucleo.css') }}" rel="stylesheet">
        <link href="{{ secure_asset('argon/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
        <!-- Argon CSS -->
        <link type="text/css" href="{{ secure_asset('/argon/css/argon.css?v=1.0.0') }}" rel="stylesheet">
        <link type="text/css" href="{{ secure_asset('/argon/css/animate.css') }}" rel="stylesheet">
    </head>
    <body class="{{ $class ?? '' }}">
        @auth()
            <form id="logout-form" action="{{ route('new.logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            @include('layouts.navbars.sidebar')
        @endauth

        <div class="main-content">
            @yield('content')
        </div>
        {{-- @guest
        @include('layouts.footers.guest')
        @endguest --}}



        <script src="{{ secure_asset('argon/vendor/jquery/dist/jquery.min.js') }}"></script>
        <script src="{{ secure_asset('argon/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
        @stack('js')


        <!-- Argon JS -->
        <script src="{{ secure_asset('argon/js/argon.js?v=1.0.0') }}"></script>
        {{-- <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
        <script src="https://unpkg.com/axios/dist/axios.min.js"></script> --}}
    </body>
</html>
