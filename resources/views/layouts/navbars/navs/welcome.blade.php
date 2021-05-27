<nav class="navbar navbar-top navbar-horizontal navbar-expand-md navbar-dark">
    <div class="container px-4">
        @auth
        <a class="navbar-brand" href="{{ secure_url('home') }}">
            <img src="{{ secure_asset('assets/argon') }}/img/brand/logo-dark.png" />
        </a>
        @endauth
        @guest
        <a class="navbar-brand">
            <img src="{{ secure_asset('assets/argon') }}/img/brand/logo-dark.png" />
        </a>
        @endguest
        @guest
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse-main" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        @endguest
        <div class="collapse navbar-collapse" id="navbar-collapse-main">
            <!-- Collapse header -->
            <div class="navbar-collapse-header d-md-none">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a href="{{ secure_url('home') }}">
                            <img src="{{ secure_asset('assets/argon') }}/img/brand/logo-red.png">
                        </a>
                    </div>
                    <div class="col-6 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Navbar items -->

            @guest
            {{-- <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="btn btn-lg btn-secondary" href="{{ secure_url('register') }}">
                        {{ __('Register') }}
                    </a>
                    <br>
                </li>
                <li class="nav-item">
                    <a class="btn btn-lg btn-primary" href="{{ secure_url('login') }}">
                        {{ __('Login') }}
                    </a>
                </li>
                </ul> --}}
                @endguest
                @auth
                <div class="d-none d-sm-block ml-auto"><ul class="navbar-nav ml-auto d-none d-sm-block">
                    <li class="nav-item dropdown">
                        <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <div class="media align-items-center">
                                <span class="avatar avatar-sm rounded-circle">
                                    <img alt="Image placeholder" src="{{ secure_asset('assets/argon') }}/img/brand/logo_in_white.jpg">
                                </span>
                                <div class="media-body ml-2 d-none d-lg-block">
                                    <span class="mb-0 text-sm  font-weight-bold text-dark">{{ auth()->user()->name }}</span>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                            <div class=" dropdown-header noti-title">
                                <h6 class="text-overflow m-0">{{ __('Welcome!') }}</h6>
                            </div>
                            <a href="{{ secure_url('profile.edit') }}" class="dropdown-item">
                                <i class="ni ni-single-02"></i>
                                <span>{{ __('My profile') }}</span>
                            </a>
                            <a href="#" class="dropdown-item">
                                <i class="ni ni-settings-gear-65"></i>
                                <span>{{ __('Settings') }}</span>
                            </a>
                            <a href="#" class="dropdown-item">
                                <i class="ni ni-calendar-grid-58"></i>
                                <span>{{ __('Activity') }}</span>
                            </a>
                            <a href="#" class="dropdown-item">
                                <i class="ni ni-support-16"></i>
                                <span>{{ __('Support') }}</span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <button type="button" class="dropdown-item" data-toggle="modal" data-target="#logoutModal">
                                <span>{{ __('Logout') }}</span>
                              </button>
                        </div>
                    </li>
                </ul>
            </div>

                    @endauth



        </div>
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
          <a href="{{ secure_url('logout') }}" class="btn btn-danger" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">

                        <span>{{ __('Logout') }}</span>
                    </a>
        </div>
      </div>
    </div>
  </div>
