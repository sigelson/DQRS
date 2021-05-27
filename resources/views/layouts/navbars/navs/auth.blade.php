<!-- Top navbar -->
<nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
    <div class="container-fluid">
        <!-- Brand -->
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="{{ secure_url('home') }}">{{ __('Dashboard') }}</a>
        <!-- Form -->
        {{-- <form class="navbar-search navbar-search-dark form-inline mr-3 d-none d-md-flex ml-lg-auto">
            <div class="form-group mb-0">
                <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-search"></i></span>
                    </div>
                    <input class="form-control" placeholder="Search" type="text">
                </div>
            </div>
        </form> --}}
        <!-- User -->
        <ul class="navbar-nav align-items-center d-none d-md-flex">
            <li class="nav-item dropdown">
                <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="media align-items-center">
                        <span class="avatar avatar-sm rounded-circle">
                            <img alt="Image placeholder" src="{{ secure_asset('assets/argon') }}/img/brand/logo_in_white.jpg">
                        </span>
                        <div class="media-body ml-2 d-none d-lg-block">
                            <span class="mb-0 text-sm  font-weight-bold">{{ auth()->user()->name }}</span>
                        </div>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right text-center">
                    <div class=" dropdown-header noti-title">
                        <h6 class="text-overflow m-0">{{ __('Welcome!') }}</h6>
                    </div>
                    <a href="{{ secure_url('profile.edit') }}" class="dropdown-item">
                        <span>{{ __('My profile') }}</span>
                    </a>
                    {{-- <a href="#" class="dropdown-item">

                        <span>{{ __('Settings') }}</span>
                    </a>
                    <a href="#" class="dropdown-item">
                        <span>{{ __('Activity') }}</span>
                    </a>
                    <a href="#" class="dropdown-item">
                        <span>{{ __('Support') }}</span>
                    </a> --}}
                    <div class="dropdown-divider"></div>


                    <button type="button" class="dropdown-item" data-toggle="modal" data-target="#logoutModal">
                        <span>{{ __('Logout') }}</span>
                      </button>
                    <!-- Button trigger modal -->





                </div>
            </li>
        </ul>
    </div>
</nav>
<div class="modal fade bd-example-modal-sm" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Log Out</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
         Are you sure you want to log out?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <a href="{{ secure_url('new.logout') }}" class="btn btn-danger" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">

                        <span>{{ __('Logout') }}</span>
                    </a>
        </div>
      </div>
    </div>
  </div>



