<header class="topbar" data-navbarbg="skin6">
    <nav class="navbar top-navbar navbar-expand-lg">
        <div class="navbar-header" data-logobg="skin6">
            <!-- This is for the sidebar toggle which is visible on mobile only -->
            @if ($title != 'Beranda')
                <a class="back-btn nav-toggler waves-effect waves-light d-block d-lg-none" href="javascript:void(0)">
                    {{-- <i class="ti-menu ti-close"></i> --}}
                    <i data-feather="arrow-left" class="feather-icon"></i>
                </a>
            @endif
            <!-- Logo -->
            <div class="navbar-brand">
                <!-- Logo icon -->
                <a href="{{ route('user.home') }}">
                    <img src="/assets/files/img/reisy-logo.png" alt="" class="">
                </a>
            </div>
            <!-- End Logo -->
            <!-- Toggle which is visible on mobile only -->

            <a class="topbartoggler d-block d-lg-none waves-effect waves-light" href="javascript:void(0)"
                data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i
                    class="ti-more"></i></a>
        </div>
        <!-- End Logo -->
        <div class="navbar-collapse collapse" id="navbarSupportedContent">
            <!-- toggle and nav items -->
            <ul class="navbar-nav float-left me-auto ms-3 ps-1">
                <!-- Notification -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle pl-md-3 position-relative" href="javascript:void(0)"
                        id="bell" role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <span><i data-feather="bell" class="svg-icon"></i></span>
                        <span class="badge text-bg-primary notify-no rounded-circle">0</span>
                    </a>

                </li>
                <!-- End Notification -->

                <!-- create new -->
            </ul>

            <!-- Right side toggle and nav items -->

            <ul class="navbar-nav float-end">

                <!-- Search -->

                <!-- User profile and search -->

                <li class="nav-item dropdown">
                    <a class="m-nav-link dropdown-toggle" href="javascript:void(0)" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        @if ($user->photo !== null)
                            <img src="/assets/images/users/{{ $user->photo }}" alt="user"
                                class="rounded-circle img-fluid" style="height:30px;width:30px;object-fit:cover">
                        @else
                            <img src="/assets/images/users/default.png" alt="user" class="rounded-circle img-fluid"
                                style="height:30px;width:30px;object-fit:cover">
                        @endif
                        <span class="ms-2 d-none d-lg-inline-block">
                            <span class="text-dark">{{ $user->name }}</span>
                            <i data-feather="chevron-down" class="svg-icon"></i>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-right user-dd animated flipInY">
                        <a class="dropdown-item" href="{{ route('user.profile') }}"><i data-feather="user"
                                class="svg-icon me-2 ms-1"></i>
                            Profile</a>

                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('auth.logout') }}">
                            <i data-feather="power" class="svg-icon me-2 ms-1"></i>
                            Logout</a>
                    </div>
                </li>

                <!-- User profile and search -->

            </ul>
        </div>
    </nav>
</header>
