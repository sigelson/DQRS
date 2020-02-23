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

                        <div class="card-body">
                            <div class="col-sm-12">

                                <h3>Your Queue number</h3>
                                <h1 class="display-1 text-dark"><strong>{{$queues->letter}}-{{$queues->number}}</strong></h1>
                                <h3>{{$queues->department}}</h3>
                                    <br>
                                    <p class="small">Name: <br><strong>{{$queues->name}}</strong></p>
                                    <p class="small">student number: <br><strong>{{$queues->snumber}}</strong></p>
                                    <p class="small">Transaction: <br><strong>{{$queues->transaction}}</strong></p>


                                    <p class="small">Remarks: <br><strong>{{$queues->remarks}}</strong></p>

                                    <br>
                                    <p class="text-muted small">{{$queues->created_at}}</p>
                                    <hr>
                                    <p class="text-sm">You will receive an <strong class="font-weight-bold">SMS</strong> and/or an <strong class="font-weight-bold">email</strong> to confirm your transaction.</p>
                                    <p class=" text-sm text-danger"><strong>In case you don't have access to your mobile and email, please remember your <strong>Queue number</strong> and present your ID for confirmation.</strong></p>
                            </div>
                        </div>
                        <div class="card-footer text-center">
                            <div class="row justify-content-center">
                                <div class="col-sm-12 col-md-4 text-center">
                                    <img src="{{ asset('assets/argon') }}/img/brand/logo-dark.png" alt="" class="img-fluid animated fadeInDown">
                                </div>
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
