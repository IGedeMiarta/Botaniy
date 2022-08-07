    @push('style')
        <style>
            .txtLogo {
                font-weight: bold;
            }
        </style>
    @endpush

    <!-- Top Bar Start -->
    <div class="topbar">

        <div class="topbar-left	d-none d-lg-block">
            <a href="{{ url('/') }}" class="navbar-brand me-5">
                <img src="{{ asset('logo-dark.png') }}" class="logo-light" alt="" height="52" />
            </a>
        </div>

        <nav class="navbar-custom">

            <!-- Search input -->
            <div class="search-wrap" id="search-wrap">
                <div class="search-bar">
                    <input class="search-input" type="search" placeholder="Search" />
                    <a href="#" class="close-search toggle-search" data-target="#search-wrap">
                        <i class="mdi mdi-close-circle"></i>
                    </a>
                </div>
            </div>

            <ul class="list-inline float-right mb-0">



                <li class="list-inline-item dropdown notification-list nav-user">
                    <a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#"
                        role="button" aria-haspopup="false" aria-expanded="false">
                        <img src="{{ asset('') }}assets/images/users/avatar-6.jpg" alt="user"
                            class="rounded-circle">
                        <span class="d-none d-md-inline-block ml-1">{{ auth()->user()->email }} <i
                                class="mdi mdi-chevron-down"></i>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated profile-dropdown">
                        <a class="dropdown-item" href="#"><i class="dripicons-user text-muted"></i>
                            Profile</a>

                        <div class="dropdown-divider"></div>
                        <form action="{{ url('logout') }}" method="POST">
                            @csrf
                            <button class="dropdown-item" type="submit"><i class="dripicons-exit text-muted"></i>
                                Logout</button>
                        </form>
                    </div>
                </li>

            </ul>

            <ul class="list-inline menu-left mb-0">
                <li class="list-inline-item">
                    <button type="button" class="button-menu-mobile open-left waves-effect">
                        <i class="mdi mdi-menu"></i>
                    </button>
                </li>

            </ul>


        </nav>

    </div>
    <!-- Top Bar End -->
