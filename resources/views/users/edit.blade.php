@extends('layouts.app', ['title' => __('User Management')])

@section('content')
    @include('users.partials.header', ['title' => __('Edit User')])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('User Management') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ secure_url('user.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ secure_url('user.update', $user) }}" autocomplete="off">
                            @csrf
                            @method('put')

                            <h6 class="heading-small text-muted mb-4">{{ __('User information') }}</h6>
                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Name') }}</label>
                                    <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', $user->name) }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-email">{{ __('Email') }}</label>
                                    <input type="email" name="email" id="input-email" class="form-control form-control-alternative{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" value="{{ old('email', $user->email) }}" required>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('department') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-department">{{ __('Department') }}</label>
                                    <select class="form-control form-control-md" name="department">
                                        <option hidden value="">Choose Department...</option>
                                        @foreach ($departments as $department)
                                        <option name="department" value="{{ $department->name}}">{{$department->name}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('department'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('department') }}</strong>
                                        </span>
                                    @endif
                                </div>


                                <label class="form-control-label" for="input-role">{{ __('Account Role') }}</label>
                                <div class="form-group">


                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="role" id="userradio" value="user" class="sr-only" required>
                                            <label class="form-check-label" for="userradio1">
                                              User Account
                                            </label>
                                          </div>
                                          <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="role" id="adminradio" value="admin" class="sr-only" required>
                                            <label class="form-check-label" for="adminradio2">
                                             Admin Account
                                            </label>
                                          </div>
                                </div>


                                <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-password">{{ __('Password') }}</label>
                                    <input type="password" name="password" id="input-password" class="form-control form-control-alternative{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('Password') }}" value="">

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label" for="input-password-confirmation">{{ __('Confirm Password') }}</label>
                                    <input type="password" name="password_confirmation" id="input-password-confirmation" class="form-control form-control-alternative" placeholder="{{ __('Confirm Password') }}" value="">
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection
