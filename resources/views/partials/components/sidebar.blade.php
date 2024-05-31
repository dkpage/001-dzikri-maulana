<aside class="left-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar" data-sidebarbg="skin6">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li id="dashboard-link" class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('admin.dashboard') }}" aria-expanded="false">
                        {{-- <i data-feather="home" class="feather-icon"></i> --}}
                        <i class="fi fi-rr-home"></i>
                        <span class="hide-menu">Dashboard</span></a>
                </li>
                <li class="list-divider"></li>
                <li class="nav-small-cap">
                    <span class="hide-menu">Manajemen Data</span>
                </li>
                {{-- <li class="sidebar-item">
                    <a class="sidebar-link" href="#" aria-expanded="false">
                        <i data-feather="user" class="feather-icon"></i>
                <i class="fi fi-rr-building"></i>
                <span class="hide-menu">Data Perusahaan</span>
                </a>
                </li> --}}
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('admin.users_data') }}" aria-expanded="false">
                        {{-- <i data-feather="user" class="feather-icon"></i> --}}
                        <i class="fi fi-rr-users"></i>
                        <span class="hide-menu">Data Pengguna</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('admin.reports_data') }}" aria-expanded="false">
                        {{-- <i data-feather="folder" class="feather-icon"></i> --}}
                        <i class="fi fi-rr-folder-open"></i>
                        <span class="hide-menu">Data Laporan</span>
                    </a>
                </li>
                {{-- <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('admin.outlets_data') }}" aria-expanded="false">
                        <i class="fi fi-rr-apps"></i>
                        <span class="hide-menu">Data Cabang</span>
                    </a>
                </li> --}}


                {{-- <li class="list-divider"></li>
                <li class="nav-small-cap">
                    <span class="hide-menu">Aplikasi</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="#" aria-expanded="false">
                        <i class="fi fi-rr-settings"></i>
                        <span class="hide-menu">Pengaturan</span>
                    </a>
                </li> --}}
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
