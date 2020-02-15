@extends('layouts.app', ['title' => __('Transaction Records')])

@section('content')
    {{-- @include('layouts.headers.cards') --}}


    <div class="header bg-gradient-dark pb-8 pt-5 pt-md-8">
        <div class="container-fluid">
            <div class="header-body">
                <!-- Card stats -->
                <h1 class="text-white display-2">Transaction Records</h1>
            </div>
        </div>
    </div>



    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Queue Records') }}</h3>
                            </div>
                            {{-- <div class="col-4 text-right">
                                <a href="{{ route('departments.create') }}" class="btn btn-md btn-success"><i class="fas fa-plus"> </i> {{ __(' Add Department') }}</a>
                            </div> --}}
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

                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Student number</th>
                                <th scope="col">Transaction</th>
                                <th scope="col">Remarks</th>
                                <th scope="col">Queue number</th>
                                <th scope="col">Created at</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach ($reports as $report)
                                <tr>
                                    <td>{{ $report->name}}</td>
                                    <td>{{ $report->snumber}}</td>
                                    <td>{{ $report->transaction}}</td>
                                    <td>{{ $report->remarks}}</td>
                                    <td>{{ $report->letter}}-{{ $report->number}}</td>
                                    <td>{{ $report->created_at }}</td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer py-4">
                        <nav class="d-flex justify-content-end" aria-label="...">
                            {{ $reports->links() }}
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection
