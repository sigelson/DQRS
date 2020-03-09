@extends('layouts.appw', ['class' => 'bg-lighter'])

@section('content')
    <div class="header bg-gradient-lighter py-9">
        <div class="container">
            <div class="col-12">
                @if (session('status'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('status') }} {{ session('name') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
            </div>
            <div class="header-body text-center mb-7">
                <div class="row justify-content-center">
                    <div class="col-sm-8 col-md-7 text-center">
                        {{-- <h1 class="text-white">{{ __('Dominican Queue Reservation System') }}</h1> --}}
                        <img src="{{ asset('assets/argon') }}/img/brand/logo-red.png" alt="" class="img-fluid animated fadeInDown">

                    </div>
                    @auth
                    <div class="col-sm-12 text-center">
                        <h1 class="display-1 text-gray mt-5 text-center">A D M I N</h1>
                    </div>
                    @endauth
                </div>

                <div class="row justify-content-center">
                    @guest
                    <div class="col-sm-12 col-md-6 text-center mt-5 animated fadeInUp">
                    <a href="{{ route('queues.create') }}" class="btn btn-success btn-lg w-100 animated pulse infinite slower delay-1s" {{-- data-toggle="modal" data-target="#startModal" --}} >Get Started</a>
                    </div>
                    @endguest

                </div>





            </div>
        </div>
        {{-- <div class="separator separator-bottom separator-skew zindex-100">
            <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
                <polygon class="fill-light" points="2560 0 2560 100 0 100"></polygon>
            </svg>
        </div> --}}
    </div>
    <div class="container fixed-bottom py-3">
        @include('layouts.footers.nav')
    </div>
@endsection
