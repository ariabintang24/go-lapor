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

            {{-- MENU CENTER --}}
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0 text-center">

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home') ? 'fw-bold active' : '' }}"
                        href="{{ route('home') }}">
                        Home
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('report.index') ? 'fw-bold active' : '' }}"
                        href="{{ route('report.index') }}">
                        Pengaduan
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('report.myreport') ? 'fw-bold active' : '' }}"
                        href="{{ auth()->check() ? route('report.myreport', ['status' => 'delivered']) : route('login') }}">
                        Laporanmu
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('profile') ? 'fw-bold active' : '' }}"
                        href="{{ auth()->check() ? route('profile') : route('login') }}">
                        Profil
                    </a>
                </li>

            </ul>

            {{-- RIGHT SIDE AUTH BUTTONS --}}
            <div class="d-flex flex-column flex-lg-row align-items-stretch align-items-lg-center gap-3 mt-3 mt-lg-0">

                @guest
                    <a href="{{ route('login') }}" class="btn btn-outline-primary px-3 py-1 rounded-pill w-100 w-lg-auto">
                        Login
                    </a>

                    <a href="{{ route('register') }}" class="btn btn-primary px-3 py-1 rounded-pill w-100 w-lg-auto">
                        Register
                    </a>
                @endguest

            </div>

        </div>

    </div>
</nav>
