@extends('layouts.appw', ['class' => 'bg-dark'])

@section('content')
    <div class="header bg-gradient-lighter py-7 py-lg-8">
        <div class="container">
            @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}
    </div><br />
  @endif
            <div class="header-body text-center mt-7 mb-7">
                <div class="row justify-content-center mb-5">
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

                <div class="row justify-content-center mb-5">
                    @guest
                    <div class="col-sm-12 col-md-6 text-center mt-5">
                    <a href="{{ route('queues.create') }}" class="btn btn-success btn-lg w-100 animated pulse infinite slower delay-1s" {{-- data-toggle="modal" data-target="#startModal" --}} >Get Started</a>
                    </div>

                    <!--choose modal-->
                    {{-- <div class="modal fade bd-example-modal-sm" id="startModal" tabindex="-1" role="dialog" aria-labelledby="startModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-sm" role="document">
                          <div class="modal-content">
                            <div class="modal-header">

                              <button type="button" class="close btn-lg" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <h1 style="font-size:48px; font-weight:lighter;" class="mb-5">Queue as:</h1>
                              <div>
                                <button type="button" class="btn btn-primary btn-lg w-75" style="font-size:28px; font-weight:lighter;" data-toggle="modal"  data-target="#studentModal" data-dismiss="modal">Student</button>
                              </div>
                              <div class="mt-5"><button type="button" class="btn btn-secondary btn-lg w-75" style="font-size:28px; font-weight:lighter;" data-toggle="modal"  data-target="#guestModal" data-dismiss="modal">Guest</button></div>

                            </div>
                            <div class="modal-footer text-center">
                                <div class="text-center">
                                    <img src="{{ asset('assets/argon') }}/img/brand/logo-red.png" alt="" class="img-red w-25">
                                </div>

                            </div>
                          </div>
                        </div>
                      </div> --}}
                      <!--end modal-->

                      {{-- student modal --}}
                      {{-- <div class="modal fade bd-example-modal-sm" id="studentModal" tabindex="-1" role="dialog" aria-labelledby="studentModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-sm" role="document">
                          <div class="modal-content">
                            <div class="modal-header">


                              <button type="button" class="close btn-lg" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <h1 style="font-size:32px; font-weight:lighter;" class="mb-5">Where do you want to queue:</h1>
                              <div>
                                <button type="button" class="btn btn-primary btn-md w-75 mt-5" style="font-size:28px; font-weight:lighter;">Registrar</button>
                              </div>
                              <div>
                                <button type="button" class="btn btn-primary btn-md w-75 mt-5" style="font-size:28px; font-weight:lighter;">Accounting</button>
                              </div>
                              <div>
                                <button type="button" class="btn btn-primary btn-md w-75 mt-5" style="font-size:28px; font-weight:lighter;">Cashier</button>
                              </div>

                            </div>
                            <div class="modal-footer text-center">
                                <div class="text-center">
                                    <img src="{{ asset('assets/argon') }}/img/brand/logo-red.png" alt="" class="img-red w-25">
                                </div>

                            </div>
                          </div>
                        </div>
                      </div> --}}
                      {{-- end student modal --}}


                      {{-- guest modal --}}
                      {{-- <div class="modal fade bd-example-modal-sm" id="guestModal" tabindex="-1" role="dialog" aria-labelledby="guestModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-sm" role="document">
                          <div class="modal-content">
                            <div class="modal-header">


                              <button type="button" class="close btn-lg" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <h1 style="font-size:32px; font-weight:lighter;" class="mb-5">Where do you want to queue:</h1>
                              <div>
                                <button type="button" class="btn btn-primary btn-md w-75 mt-5" style="font-size:28px; font-weight:lighter;">Registrar</button>
                              </div>
                              <div>
                                <button type="button" class="btn btn-primary btn-md w-75 mt-5" style="font-size:28px; font-weight:lighter;">Accounting</button>
                              </div>
                              <div>
                                <button type="button" class="btn btn-primary btn-md w-75 mt-5" style="font-size:28px; font-weight:lighter;">Cashier</button>
                              </div>

                            </div>
                            <div class="modal-footer text-center">
                                <div class="text-center">
                                    <img src="{{ asset('assets/argon') }}/img/brand/logo-red.png" alt="" class="img-red w-25">
                                </div>

                            </div>
                          </div>
                        </div>
                      </div> --}}
                      {{-- end guest modal --}}
                      @endguest

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
