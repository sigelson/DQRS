@extends('layouts.app', ['title' => __('Transaction Management')])

@section('content')
    @include('users.partials.header', ['title' => __('Add Transaction')])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h2 class="mb-0">{{ __('Transaction Management') }}</h2>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ secure_url('transactions.index') }}" class="btn btn-md btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ secure_url('transactions.store') }}" autocomplete="off">
                            @csrf

                            <h6 class="heading-small text-muted mb-4">{{ __('Transaction information') }}</h6>
                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Transaction name') }}</label>
                                    <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name') }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('department') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-department">{{ __('Department') }}</label>
                                    <select class="form-control form-control-md" name="department" required>
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
