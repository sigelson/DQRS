<div class="header bg-gradient-dark pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
        <div class="header-body">
            <!-- Card stats -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">department serving: <span class="text-primary"><strong>{{auth()->user()->department}} </strong><span><a class="btn btn-sm btn-default text-uppercase" href="{{route('profile.edit')}}">change</a></h5>
                                    <span class="h2 font-weight-bold mb-0">{{auth()->user()->name}}</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-gray text-white rounded-circle shadow">
                                        <i class="fas fa-users"></i>
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

