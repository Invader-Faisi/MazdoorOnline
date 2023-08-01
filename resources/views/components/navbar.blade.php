<!-- Container wrapper -->
<div class="container-fluid">
    <!-- Toggle button -->
    <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars"></i>
    </button>

    <!-- Collapsible wrapper -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">

        @if (session()->get('user_type') != 'admin')
            <!-- Navbar brand -->
            <a class="navbar-brand mt-2 mt-lg-0" href="{{ url('/') }}">
                <img src="{{ asset('/images/logo.jpg') }}" height="40" alt="Mazdoor Online" loading="lazy" />
            </a>
        @endif

        <!-- Left links -->
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            @if (session()->has('user_type'))
                @if (session()->get('user_type') == 'employer')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/employer/jobs') }}">Jobs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/employer/bids') }}">Bids</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/employer/assigned/jobs') }}">Assigned Jobs</a>
                    </li>
                @endif
                @if (session()->get('user_type') == 'labour')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/labour/jobs') }}">Jobs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/labour/portfolios') }}">Portfolio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/labour/assigned/jobs') }}">My Jobs</a>
                    </li>
                @endif
            @endif
            @if (session()->get('user_type') == 'admin')
                <li class="nav-item">
                    <a class="nav-link" href="#">Mazdoor Online&nbsp;<strong class="text-primary">Admin
                            Panel</strong></a>
                </li>
            @endif
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/about-us') }}">About Us</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/contact-us') }}">Contact Us</a>
            </li>
        </ul>
        <!-- Left links -->
    </div>
    <!-- Collapsible wrapper -->

    <!-- Right elements -->

    @if (session()->has('user_type'))
        <div class="d-flex align-items-center">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <h6 class="nav-link mt-2">
                        Welcome &nbsp;
                        <span class="text-success">
                            @if (session()->get('user_type') != 'admin')
                                {{ session()->get('user_name') }}
                            @else
                                Admin
                            @endif
                        </span>
                    </h6>
                </li>
            </ul>

            <!-- Avatar -->
            <div class="dropdown">
                <a class="dropdown-toggle d-flex align-items-center hidden-arrow mx-3" href="#"
                    id="navbarDropdownMenuAvatar" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-user fa-2x"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuAvatar">
                    @if (session()->get('user_type') != 'admin')
                        <li>
                            <a class="dropdown-item"
                                href="{{ url('/') }}/{{ session()->get('user_type') }}/profile">Profile</a>
                        </li>
                    @endif
                    <li>
                        <a class="dropdown-item" href="{{ url('/logout') }}">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Right elements -->
    @else
        <a class="mx-3" href="{{ url('/login') }}">
            Login&nbsp;
            <i class="fa fa-sign-in-alt"></i>
        </a>
    @endif
</div>
<!-- Container wrapper -->
