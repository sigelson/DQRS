@extends('layouts.appw', ['class' => 'bg-dark'])

@section('content')
    <div class="header bg-gradient-lighter py-7 py-lg-8">
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
            <div class="header-body text-center mt-7 mb-7">
                <div class="row justify-content-center mb-5">
                    <div class="col-sm-12 col-md-5 text-center">
                    <div class="card shadow text-center">
                        <div class="card-header text-center">
                            <div class="row justify-content-center">
                                <div class="col-sm-12 col-md-6 text-center">
                                    <img src="{{ asset('assets/argon') }}/img/brand/logo-red.png" alt="" class="img-fluid animated fadeInDown">
                                </div>
                            </div>

                        </div>
                        <div class="card-body">
                            <div class="col-sm-12">
                            <p>Name: <strong>{{$queues->name}}</strong></p>
                            <p>student number: <strong>{{$queues->snumber}}</strong></p>
                                <h3>Your Queue number</h3>
                                <h1 class="display-1"><strong>{{$queues->letter}}-{{$queues->number}}</strong></h1>
                                <h3>{{$queues->department}}</h3>
                                    <br>
                                    <br>
                                    <p>Transaction:</p>
                                    <p><strong>{{$queues->transaction}}</strong></p>
                                    <br>
                                    <p>Remarks:</p>
                                    <p><strong>{{$queues->remarks}}</strong></p>
                                    <br>
                                    <p class="text-muted">{{$queues->created_at}}</p>
                            </div>
                        </div>
                    </div>
                <a href="{{('/dqrs')}}" class="btn btn-default mt-5">Close</a>
                </div>



                    {{-- @foreach ($queues as $queue) --}}

                    {{-- @endforeach --}}
                </div>







            </div>
        </div>
        <div class="separator separator-bottom separator-skew zindex-100">
            <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
                <polygon class="fill-light" points="2560 0 2560 100 0 100"></polygon>
            </svg>
        </div>
    </div>

    <div class="container mt--10 pb-5"></div>
@endsection
