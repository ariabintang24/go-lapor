<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm fixed-top">
    <div class="container position-relative">

        {{-- Logo --}}
        <a class="navbar-brand fw-bold" href="{{ route('home') }}">
            Go-<span class="text-primary">Lapor</span>
        </a>

        {{-- Hamburger --}}
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

        {{-- MENU --}}
        <div class="collapse navbar-collapse" id="mainNavbar">
            <ul class="navbar-nav nav-center mb-2 mb-lg-0">

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home') ? 'fw-bold active' : '' }}"
                        href="{{ route('home') }}">
                        Home
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('report.*') ? 'fw-bold active' : '' }}"
                        href="{{ route('report.myreport', ['status' => 'delivered']) }}">
                        Laporan
                    </a>
                </li>

                {{-- <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('notification.*') ? 'fw-bold active' : '' }}"
                        href="#">
                        Notifikasi
                    </a>
                </li> --}}

                @auth
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('profile') ? 'fw-bold active' : '' }}"
                            href="{{ route('profile') }}">
                            Profil
                        </a>
                    </li>
                @endauth

            </ul>
        </div>

    </div>
</nav>
