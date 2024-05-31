<div class="bg-white container shadow" id="mobile-nav">
    <nav class="mobile-nav-menu">
        <ul>
            <li>
                <a href="{{ route('user.home') }}" class="m-nav-link">
                    <i class="fi fi-rr-home"></i>
                    <span>Home</span>
                </a>
            </li>
            <li>
                <a href="{{ route('user.report_form') }}" class="m-nav-link">
                    <i class="fi fi-rr-document"></i>
                    <span>Laporan</span>
                </a>
            </li>
            <li>
                <a href="{{ route('user.report_data') }}" class="m-nav-link">
                    <i class="fi fi-rr-folder-open"></i>
                    <span>Data</span>
                </a>
            </li>
            {{-- <li>
                <a href="{{ route('user.profile') }}" class="m-nav-link">
                    <i class="fi fi-rr-user"></i>
                    <span>Profil</span>
                </a>
            </li> --}}
            <li class="nav-item dropdown">
                <a class="m-nav-link dropdown-toggle" href="javascript:void(0)" data-bs-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    @if ($user->photo !== null)
                        <img src="/assets/images/users/{{ $user->photo }}" alt="user"
                            class="rounded-circle img-fluid">
                    @else
                        <img src="/assets/images/users/default.png" alt="user" class="rounded-circle img-fluid">
                    @endif
                    <span class="ms-2 d-none d-lg-inline-block">
                        {{-- <span class="text-dark">{{ $user->name }}</span> --}}
                        {{-- <i data-feather="chevron-down" class="svg-icon"></i> --}}
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

        </ul>
    </nav>
</div>
