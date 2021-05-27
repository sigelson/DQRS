@extends('layouts.app', ['title' => __('Department Management')])

@section('content')
    @include('users.partials.header', ['title' => __('Edit Department')])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Department Management') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ secure_url('departments.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ secure_url('departments.update', $department) }}" autocomplete="off">
                            @csrf
                            @method('put')

                            <h6 class="heading-small text-muted mb-4">{{ __('Department information') }}</h6>
                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Name') }}</label>
                                    <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', $department->name) }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('letter') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-letter">{{ __('Letter') }}</label>
                                    <input type="text" name="letter" id="input-name" class="form-control form-control-alternative{{ $errors->has('letter') ? ' is-invalid' : '' }}" placeholder="{{ __('Letter') }}" value="{{ old('letter', $department->letter) }}" required autofocus>

                                    @if ($errors->has('letter'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('letter') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('number') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-number">{{ __('Number') }}</label>
                                    <input type="text" name="number" id="input-number" class="form-control form-control-alternative{{ $errors->hasnumber ? ' is-invalid' : '' }}" placeholder="{{ __('Number') }}" value="{{ old('number', $department->number) }}" required autofocus>

                                    @if ($errors->has('number'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('number') }}</strong>
                                        </span>
                                    @endif
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
