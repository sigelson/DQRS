<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'DQRS') }}</title>
        <!-- Favicon -->
        <link href="{{ asset('assets/argon') }}/img/brand/favicon.png" rel="icon" type="image/png">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
        <!-- Icons -->
        <link href="{{ asset('assets/argon') }}/vendor/nucleo/css/nucleo.css" rel="stylesheet">
        <link href="{{ asset('assets/argon') }}/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
        <!-- Argon CSS -->
        <link type="text/css" href="{{ asset('assets/argon') }}/css/argon.css?v=1.0.0" rel="stylesheet">
        <link type="text/css" href="{{ asset('assets/argon') }}/css/animate.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    </head>
    <body class="{{ $class ?? '' }}">


        <div class="main-content">
            {{-- @include('layouts.navbars.navs.welcome') --}}
            @yield('content')
        </div>



        <script src="{{ asset('assets/argon') }}/vendor/jquery/dist/jquery.min.js"></script>


        @stack('js')

        <!-- Argon JS -->
        <script src="{{ asset('assets/argon') }}/js/argon.js?v=1.0.0"></script>
    </body>
</html>
