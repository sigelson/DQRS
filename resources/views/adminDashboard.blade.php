@extends('layouts.app')

@section('content')
        <div class="header bg-gradient-dark pb-8 pt-5 pt-md-8">
            <div class="container-fluid">
                <div class="header-body">
                    <!-- Card stats -->
                    <div class="row">
                        <div class="col-sm-12 col-md-4">
                            <div class="card card-stats mb-4 mb-xl-0">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">Today's Queue</h5>
                                        <span class="h2 font-weight-bold mb-0">{{ \DB::table('queues')->whereDate('created_at', Carbon::today())->count()}}</span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                                                <i class="fas fa-chart-bar"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4">
                            <div class="card card-stats mb-4 mb-xl-0">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">Today's Served</h5>
                                            <span class="h2 font-weight-bold mb-0">{{ \DB::table('queues')->whereDate('created_at', Carbon::today())->where('called', '=', 'yes')->count()}}</span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                                                <i class="fas fa-chart-pie"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4">
                            <div class="card card-stats mb-4 mb-xl-0">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            <h5 class="card-title text-uppercase text-muted mb-0">All-time Queue</h5>
                                            <span class="h2 font-weight-bold mb-0">{{ \DB::table('queues')->count()}}</span>
                                        </div>
                                        <div class="col-auto">
                                            <div class="icon icon-shape bg-success text-white rounded-circle shadow">
                                                <i class="fas fa-chart-line"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <form action="{{ secure_url('dashboard') }}" method="get" id="filter">
        <div class="container-fluid mt--7">
            <div class="col-sm-12">
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label style="color: white;">Get Data By (Week, Month or Year): {{request('filter_by')}}</label>
                            <select class="form-control" name="filter_by" onchange="changeDayFilter()">
                                <option value="week" {{ request('filter_by') == 'week' ? 'selected' : '' }}>Week</option>
                                <option value="month" {{ request('filter_by') == 'month' ? 'selected' : '' }}>Month</option>
                                <option value="year" {{ request('filter_by') == 'year' ? 'selected' : '' }}>Year</option>
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label style="color: white;">Get Data By Status:</label>
                            <select class="form-control" name="by_status" onchange="changeDayFilter()">
                                <option value="" {{ request('by_status') == '' ? 'selected' : '' }}>All</option>
                                <option value="No Show" {{ request('by_status') == 'No Show' ? 'selected' : '' }}>No Show</option>
                                <option value="Completed" {{ request('by_status') == 'Completed' ? 'selected' : '' }}>Completed</option>
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label style="color: white;">Get Data By Priority:</label>
                            <select class="form-control" name="by_priority" onchange="changeDayFilter()">
                                <option value="" {{ request('by_priority') == '' ? 'selected' : '' }}>All</option>
                                <option value="Non Priority" {{ request('by_priority') == 'Non Priority' ? 'selected' : '' }}>Non Priority</option>
                                <option value="Priority" {{ request('by_priority') == 'Priority' ? 'selected' : '' }}>Priority</option>
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label style="color: white;">Get Data By Department:</label>
                            <select class="form-control" name="by_department" onchange="changeDayFilter()">
                                <option value="" {{ request('by_department') == '' ? 'selected' : '' }}>All</option>
                                @foreach($departments as $department)
                                <option value="{{ $department->name }}" {{ request('by_department') == $department->name ? 'selected' : '' }}>{{ $department->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="card shadow">
                    <div class="card-body">
                        <!-- <h2 class="mb-2">Notification message</h2> -->
                        <div>
                          <canvas id="myChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <br><br><br><br><br><br>

    <div class="container-fluid mt--7">
        <div class="col-sm-12">
            <div class="card shadow">
                <div class="card-body">
                    <h2 class="mb-2">Notification message</h2>
                    <form method="post" action="{{ secure_url('home.updatenotif') }}" autocomplete="off">
                        @csrf
                    @method('put')
                        <textarea class="form-control" name="text" id="notif" rows="1" placeholder="Notification text">{{$notification}}</textarea>
                        <div class="row mt-3 align-items-center">
                            <div class="col-sm-12 col-md-6">
                                <p class="text-muted"><small>This message will be displayed at the bottom of the <a href="{{secure_url('display.index')}}" class="text-info" target="_blank">Queue Display</a>.</small></p>
                            </div>
                            <div class="col-sm-12 col-md-6 text-right">
                                <button type="submit" class="btn btn-success">Apply</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

        <!-- @include('layouts.footers.auth') -->
    </div>
@endsection


@push('js')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var ctx = document.getElementById('myChart');
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels:  @json($labels),
            datasets: [{
                label: '# of Queue',
                data: @json($chartData),
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            },
        }
    });

    function changeDayFilter() {
        document.getElementById('filter').submit();
    }
</script>
<script>
    $(document).ready(
 function() {
 setInterval(function() {
    $('#queuelist').load('admin #queuelist');
    console.log('refresh');
 }, 5000);  //Delay here = 5 seconds
});
</script>
@endpush



