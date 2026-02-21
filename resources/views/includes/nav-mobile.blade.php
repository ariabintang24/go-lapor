<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm fixed-top">
    <div class="container">

        {{-- Logo --}}
        <a class="navbar-brand fw-bold" href="{{ route('home') }}">
            Go-<span class="text-primary">Lapor</span>
        </a>

        {{-- Hamburger Button (Mobile) --}}
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar"
            aria-controls="mainNavbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        {{-- Menu --}}
        <div class="collapse navbar-collapse" id="mainNavbar">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

                <li class="nav-item">
                    <a class="nav-link {{ request()->is('/') ? 'active fw-bold' : '' }}" href="{{ route('home') }}">
                        Home
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('report.myreport', ['status' => 'delivered']) }}">
                        Laporan
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">
                        Notifikasi
                    </a>
                </li>

                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('profile') }}">
                            Profil
                        </a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">
                            Daftar
                        </a>
                    </li>
                @endauth

            </ul>
        </div>
    </div>
</nav>
