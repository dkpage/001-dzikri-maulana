<nav id="user-home-nav">
    <ul>
        <li class="menu-item">
            <a href="{{ route('user.report_form') }}" class="menu-link">
                <i class="fi fi-rr-document"></i>
                <span>Buat Laporan</span>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{ route('user.report_data') }}" class="menu-link">
                <i class="fi fi-rr-folder-open"></i>
                <span>Data Laporan</span>
            </a>
        </li>
        <li class="menu-item">
            <a href="#" class="menu-link text-dark">
                <i class="fi fi-rr-map-marker-check"></i>
                <span>Absen</span>
            </a>
        </li>

        <li class="menu-item">
            <a href="#" class="menu-link text-dark">
                <i class="fi fi-rr-business-time"></i>
                <span>Lembur</span>
            </a>
        </li>
        <li class="menu-item">
            <a href="#" class="menu-link  text-dark">
                <i class="fi fi-rr-calendar-day"></i>
                <span>Cuti</span>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{ route('user.profile') }}" class="menu-link">
                <i class="fi fi-rr-user"></i>
                <span>Profil</span>
            </a>
        </li>
    </ul>
</nav>
