@extends('layouts.app', ['title' => __('Transaction Management')])

@section('content')
    {{-- @include('layouts.headers.cards') --}}


    <div class="header bg-gradient-dark pb-8 pt-5 pt-md-8">
        <div class="container-fluid">
            <div class="header-body">
                <!-- Card stats -->
                <h1 class="text-white display-2">Transaction Management</h1>
            </div>
        </div>
    </div>



    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-sm-12 col-md-8 text-center text-md-left">
                                <h3 class="mb-0">{{ __('Transactions') }}</h3>
                            </div>
                            <div class="col-sm-12 col-md-4 text-center text-md-right">
                                <a href="{{ secure_url('transactions.create') }}" class="btn btn-md btn-success"><i class="fas fa-plus"> </i> {{ __(' Add Transaction') }}</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        @if (session('status'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('status') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                    </div>


                    {{-- NAVPILL --}}
                    <div class="nav-wrapper">
                        <div class="col">
                        <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab" data-toggle="tab" href="#tabs-icons-text-1" role="tab" aria-controls="tabs-icons-text-1" aria-selected="true">Accounting</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-2-tab" data-toggle="tab" href="#tabs-icons-text-2" role="tab" aria-controls="tabs-icons-text-2" aria-selected="false">Cashier</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-3-tab" data-toggle="tab" href="#tabs-icons-text-3" role="tab" aria-controls="tabs-icons-text-3" aria-selected="false">Registrar</a>
                            </li>
                        </ul>
                    </div>
                    </div>

                    <div class="card shadow">
                        <div class="card-body">
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel" aria-labelledby="tabs-icons-text-1-tab">
                                    <div class="table-responsive">
                                        <table class="table align-items-center table-flush">
                                            <thead class="thead-light">
                                            <tr>
                                                <th scope="col">{{ __('Transaction') }}</th>
                                                <th scope="col">{{ __('Department') }}</th>
                                                <th scope="col">{{ __('Created at') }}</th>
                                                <th scope="col"></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($accountings as $accounting)
                                                <tr>
                                                    <td>{{ $accounting->name }}</td>
                                                    <td>
                                                        {{ $accounting->department }}</a>
                                                    </td>
                                                    <td>{{ $accounting->created_at }}</td>
                                                    <td class="text-right">
                                                        <div class="dropdown">
                                                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="fas fa-ellipsis-v"></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">

                                                                    <form action="{{ secure_url('transactions.destroy', $accounting->id) }}" method="post">
                                                                        @csrf
                                                                        @method('delete')

                                                                        <a class="dropdown-item" href="{{ secure_url('transactions.edit', $accounting) }}">{{ __('Edit') }}</a>
                                                                        <button type="button" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to delete this transaction?") }}') ? this.parentElement.submit() : ''">
                                                                            {{ __('Delete') }}
                                                                        </button>
                                                                    </form>

                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tabs-icons-text-2" role="tabpanel" aria-labelledby="tabs-icons-text-2-tab">
                                    <div class="table-responsive">
                                        <table class="table align-items-center table-flush">
                                            <thead class="thead-light">
                                            <tr>
                                                <th scope="col">{{ __('Transaction') }}</th>
                                                <th scope="col">{{ __('Department') }}</th>
                                                <th scope="col">{{ __('Created at') }}</th>
                                                <th scope="col"></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($cashiers as $cashier)
                                                <tr>
                                                    <td>{{ $cashier->name }}</td>
                                                    <td>
                                                        {{ $cashier->department }}</a>
                                                    </td>
                                                    <td>{{ $cashier->created_at }}</td>
                                                    <td class="text-right">
                                                        <div class="dropdown">
                                                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="fas fa-ellipsis-v"></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">

                                                                    <form action="{{ secure_url('transactions.destroy', $cashier->id) }}" method="post">
                                                                        @csrf
                                                                        @method('delete')

                                                                        <a class="dropdown-item" href="{{ secure_url('transactions.edit', $cashier) }}">{{ __('Edit') }}</a>
                                                                        <button type="button" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to delete this transaction?") }}') ? this.parentElement.submit() : ''">
                                                                            {{ __('Delete') }}
                                                                        </button>
                                                                    </form>

                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tabs-icons-text-3" role="tabpanel" aria-labelledby="tabs-icons-text-3-tab">
                                    <div class="table-responsive">
                                        <table class="table align-items-center table-flush">
                                            <thead class="thead-light">
                                            <tr>
                                                <th scope="col">{{ __('Transaction') }}</th>
                                                <th scope="col">{{ __('Department') }}</th>
                                                <th scope="col">{{ __('Created at') }}</th>
                                                <th scope="col"></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($registrars as $registrar)
                                                <tr>
                                                    <td>{{ $registrar->name }}</td>
                                                    <td>
                                                        {{ $registrar->department }}</a>
                                                    </td>
                                                    <td>{{ $registrar->created_at }}</td>
                                                    <td class="text-right">
                                                        <div class="dropdown">
                                                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="fas fa-ellipsis-v"></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">

                                                                    <form action="{{ secure_url('transactions.destroy', $registrar->id) }}" method="post">
                                                                        @csrf
                                                                        @method('delete')

                                                                        <a class="dropdown-item" href="{{ secure_url('transactions.edit', $registrar) }}">{{ __('Edit') }}</a>
                                                                        <button type="button" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to delete this transaction?") }}') ? this.parentElement.submit() : ''">
                                                                            {{ __('Delete') }}
                                                                        </button>
                                                                    </form>

                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- NAVPILL END --}}

                    <div class="card-footer py-4">
                        <nav class="d-flex justify-content-end" aria-label="...">

                        </nav>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection
