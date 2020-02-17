@extends('layouts.appd', ['class' => 'bg-white'])

@section('content')
    <div class="header bg-white">
        <div class="container-fluid">
           <div class="row">

                <div class="col-sm-12 col-md-8 d-none d-md-block align-self-center">
                    <img src="{{ asset('assets/argon') }}/img/brand/logo-red.png" class="img-fluid" width="25%"  alt="...">
                </div>
                <div class="col-sm-12 col-md-4 d-none d-md-block text-right">
                    <p id="time" class="display-1 text-red text-right"></p>
                </div>


               <div class="col-sm-12 d-sm-block d-md-none text-center mb-3">
                <img src="{{ asset('assets/argon') }}/img/brand/logo-red.png" class="img-fluid w-50" alt="...">

               </div>
               <div class="col-sm-12 col-md-8  d-none d-md-block text-center">
                {{-- <iframe width="100%" height="100%" src="{{ asset('assets') }}/vid/sdca-vid.mp4" frameborder="0" controls=0 onloadstart="this.volume=0.05" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> --}}
                <video onloadstart="this.volume=0.05" width="100%" height="100%" loop="true" autoplay="autoplay">
                    <source src="{{ asset('assets') }}/vid/sdca-vid.mp4" type="video/mp4" >
                  </video>
            </div>
               <div class="col-sm-12 col-md-4 text-center">
                   <div class="card shadow bg-gradient-red shadow">
                    <h1 class="display 1 font-weight-bold text-white"><strong>NOW SERVING</strong></h1>
                    </div>
                  <div class="row">

                      <div class="col-sm-6">
                        <div class="card bg-gradient-lighter mt-3 shadow">
                            <div class="card-header-lg">
                            <h3 class="text-default text-uppercase">{{$cashier1->department ?? 'cashier'}}</h3>
                            </div>
                            <div class="card-body-sm">
                                <h1 class="display-1 font-weight-bold"><strong>{{$cashier1->letter ?? ''}}-{{$cashier1->number ?? ''}}</strong></h1>
                            </div>
                            <div class="card-footer-sm">
                              <p class="text-warning font-weight-bold">COUNTER 1</p>
                            </div>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="card bg-gradient-lighter shadow mt-3">
                            <div class="card-header-lg">
                                <h3 class="text-default text-uppercase">{{$cashier2->department ?? 'cashier'}}</h3>
                            </div>
                            <div class="card-body-sm">
                                <h1 class="display-1 font-weight-bold"><strong>{{$cashier2->letter ?? ''}}-{{$cashier2->number ?? ''}}</strong></h1>
                            </div>
                            <div class="card-footer-sm">
                                <p class="text-warning font-weight-bold">COUNTER 2</p>
                            </div>
                        </div>
                      </div>
                  </div>



                        <div class="row">
                            <div class="col-sm-6">
                                <div class="card bg-gradient-lighter shadow mt-3">
                                    <div class="card-header-lg">
                                        <h3 class="text-default text-uppercase">{{$accounting1->department ?? 'accounting'}}</h3>
                                    </div>
                                    <div class="card-body-sm">
                                        <h1 class="display-1 font-weight-bold"><strong>{{$accounting1->letter ?? ''}}-{{$accounting1->number ?? ''}}</strong></h1>
                                    </div>
                                    <div class="card-footer-sm">
                                        <p class="text-warning font-weight-bold">COUNTER 1</p>
                                    </div>
                                </div>
                            </div>


                      <div class="col-sm-6">
                        <div class="card bg-gradient-lighter mt-3 shadow">
                            <div class="card-header-lg">
                            <h3 class="text-default text-uppercase">{{$accounting2->department ?? 'accounting'}}</h3>
                            </div>
                            <div class="card-body-sm">
                                <h1 class="display-1 font-weight-bold"><strong>{{$accounting2->letter ?? ''}}-{{$accounting2->number ?? ''}}</strong></h1>
                            </div>
                            <div class="card-footer-sm">
                              <p class="text-warning font-weight-bold">COUNTER 2</p>
                            </div>
                        </div>
                      </div>
                      </div>

                      <div class="row">
                        <div class="col-sm-6">
                            <div class="card bg-gradient-lighter shadow mt-3">
                                <div class="card-header-lg">
                                    <h3 class="text-default text-uppercase">{{$registrar1->department ?? 'registrar'}}</h3>
                                </div>
                                <div class="card-body-sm">
                                    <h1 class="display-1 font-weight-bold"><strong>{{$registrar1->letter ?? ''}}-{{$registrar1->number ?? ''}}</strong></h1>
                                </div>
                                <div class="card-footer-sm">
                                    <p class="text-warning font-weight-bold">COUNTER 1</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="card bg-gradient-lighter mt-3">
                                <div class="card-header-lg">
                                    <h3 class="text-default text-uppercase">{{$registrar2->department ?? 'registrar'}}</h3>
                                </div>
                                <div class="card-body-sm">
                                    <h1 class="display-1 font-weight-bold"><strong>{{$registrar2->letter ?? ''}}-{{$registrar2->number ?? ''}}</strong></h1>
                                </div>
                                <div class="card-footer-sm">
                                    <p class="text-warning font-weight-bold">COUNTER 2</p>
                                </div>
                            </div>
                        </div>

                      </div>

                  </div>

               </div>

           </div>

           <div class="py-2"></div>

           <div class="d-none d-md-block bg-dark p-0">
            {{-- <marquee behavior="" direction="left"><h1 class="display-1 text-white">TESTING NOTIFICATION DQRS TESTING</h1></marquee> --}}

            <nav class="navbar-lg bg-white">
                <div class="p-0">
             <marquee behavior="" direction="left"><h1 class=" display-1 text-dark">{{$notification}}</h1></marquee>
                 </div>
          </nav>

            </div>

        <div class="d-sm-block d-md-none p-0">
           <nav class="navbar-sm fixed-bottom bg-lighter">
               <div>
            <marquee behavior="" direction="left"><h1 class="display-md-1 text-red">{{$notification}}</h1></marquee>
                </div>
         </nav>
        </div>

        </div>
        {{-- <div class="separator separator-bottom separator-skew zindex-100">
            <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
                <polygon class="fill-light" points="2560 0 2560 100 0 100"></polygon>
            </svg>
        </div> --}}
    </div>

<script type="text/javascript">
setInterval(function updateclock() {

function pad(n) {
     return (n < 10) ? '0' + n : n;
}

var time = new Date();
var hours = time.getHours();
var minutes = time.getMinutes();
var ampm = "";
if (hours > 12) {
    hours -= 12;
    ampm = "PM";
} else if (hours === 0) {
    hours = 12;
    ampm = "AM";

}

var todisplay = pad(hours) + ':' + pad(minutes)+" "+ampm;
document.getElementById("time").innerHTML = todisplay;
},1000);
</script>


@endsection
