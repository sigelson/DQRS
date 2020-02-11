@extends('layouts.appw', ['class' => 'bg-dark'])
@section('content')
    <div class="header bg-gradient-lighter py-7 py-lg-8">
        <div class="container">

            <div class="row">
                <div class="col-sm-12">
                    <div class="card bg-secondary shadow">
                        <div class="card-header bg-white border-0">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h2 class="mb-0">{{ __('Queue Management') }}</h2>
                                </div>
                                <div class="col-4 text-right">
                                    <a href="{{('/dqrs')}}" class="btn btn-md btn-dark">{{ __('Go Back') }}</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form method="post" action="{{ route('queues.store') }}" autocomplete="off">
                                @csrf

                                <h6 class="heading-small text-muted mb-4">{{ __('Queue information') }}</h6>
                                <div class="pl-lg-4">

                                    <div class="form-group{{ $errors->has('department') ? ' has-danger' : '' }} text-center">
                                        <div class="col">
                                        <label class="form-control-label text-lg" for="input-department">{{ __('Department') }}</label>
                                        {{-- <select class="form-control form-control-lg" name="department" required>
                                            <option class="text-lg" hidden>Choose Department...</option>
                                            @foreach ($departments as $department)
                                            <option name="department" value="{{ $department->name}}">{{$department->name}}</option>
                                            @endforeach
                                        </select> --}}
                                    </div>

                                            <div class="col text-center" data-toggle="buttons">
                                                <div class="row text-center">
                                                    @foreach ($departments as $department)
                                                    <div class=" btn-group-toggle col-sm-12 col-md-4 text-center mt-2">
                                                        <label class="btn btn-secondary btn-lg w-100" onclick="getdept({{$department}})">
                                                            <input type="radio" name="department" value="{{ $department->name}}" sr-only required> {{ $department->name}}
                                                        </label>
                                                    </div>
                                                    @endforeach
                                                </div>

                                        @if ($errors->has('department'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('department') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>


                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ __('Name') }}</label>
                                        <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name') }}" required autofocus>

                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group{{ $errors->has('snumber') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-snumber">{{ __('Student number') }}</label>
                                        <input type="number" name="snumber" id="input-snumber" class="form-control form-control-alternative{{ $errors->has('snumber') ? ' is-invalid' : '' }}" placeholder="{{ __('Student number') }}" value="{{ old('snumber') }}" required autofocus>

                                        @if ($errors->has('snumber'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('snumber') }}</strong>
                                            </span>
                                        @endif
                                    </div>


                                    <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-email">{{ __('Email') }}</label>
                                        <input type="email" name="email" id="input-email" class="form-control form-control-alternative{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" value="{{ old('email') }}" required>

                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group{{ $errors->has('mobile') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-mobile">{{ __('Mobile number') }}</label>
                                        <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                              <div class="input-group-text">+63</div>
                                            </div>
                                            <input type="number" name="mobile" class="form-control" id="inlineFormInputGroup" placeholder="Ex. 9151234567">
                                          </div>


                                        @if ($errors->has('mobile'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('mobile') }}</strong>
                                            </span>
                                        @endif
                                    </div>



                                    <div class="form-group{{ $errors->has('transaction') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-transaction">{{ __('Transaction') }}</label>
                                        <select class="form-control form-control-md" name="transaction" required>
                                            <option hidden value="">Choose Transaction...</option>
                                            @foreach ($transactions as $transaction)
                                        <option>{{$transaction->name}}</option>
                                        @endforeach
                                        <option>Other</option>
                                        </select>
                                        @if ($errors->has('transaction'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('transaction') }}test</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group{{ $errors->has('remarks') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-name">{{ __('Notes / Remarks') }}</label>
                                        <textarea type="textarea" rows="5" name="remarks" id="input-name" class="form-control form-control-alternative{{ $errors->has('remarks') ? ' is-invalid' : '' }}" placeholder="{{ __('Notes / Remarks for the transaction...') }}" value="{{ old('remarks') }}" autofocus></textarea>

                                        @if ($errors->has('remarks'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('remarks') }}</strong>
                                            </span>
                                        @endif
                                    </div>





                                    <input type="hidden" name="letter" id="letter" value="">
                                    <input type="hidden" name="number" id="number" value="">

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                                    </div>


                                </div>
                            </form>
                        </div>
                    </div>
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

    <script>
        function getdept(dept) {
            document.getElementById('letter').value = dept.letter;
            document.getElementById('number').value = dept.number;
        }
    </script>
@endsection

