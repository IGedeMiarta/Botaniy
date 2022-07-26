<nav class="navbar navbar-expand-lg fixed-top sticky" id="navbar">
    <div class="container">
        <a href="layout-1.html" class="navbar-brand me-5">
            <img src="{{ asset('logo-r.png') }}" class="logo-light" alt="" height="52" />
            <img src="{{ asset('logo-r.png') }}" class="logo-dark" alt="" height="52" />
        </a>
        <a href="javascript:void(0)" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggle-icon"><i data-feather="menu"></i></span>
        </a>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav navbar-center me-auto mt-lg-0 mt-2">
                <li class="nav-item">
                    <a class="nav-link" href="#home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#feature">Jenis</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#service">Katalog</a>
                </li>
            </ul>
            <div class="mb-4 mb-lg-0">
                @if (!auth()->user())
                    <a href="#" class="btn btn-sm nav-btn btn-primary mb-4 mb-lg-0 ms-auto" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">Sign In</a>
                @else
                    <a href="{{ url('home') }}"
                        class="btn btn-sm nav-btn btn-primary mb-4 mb-lg-0 ms-auto">Dashboard</a>
                @endif
            </div>
        </div>
    </div>
    <!-- end container -->
</nav>
