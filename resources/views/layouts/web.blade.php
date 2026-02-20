<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        .navbar {
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.8);
        }

        .hero {
            background: linear-gradient(135deg, #16a34a, #22c55e);
            color: white;
            padding: 120px 0;
        }

        .section {
            padding: 80px 0;
        }

        .floating-report {
            position: fixed;
            bottom: 24px;
            right: 24px;
            width: 60px;
            height: 60px;
            background: #16a34a;
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
            z-index: 999;
            transition: 0.3s;
        }

        .floating-report:hover {
            transform: translateY(-4px);
        }
    </style>
</head>

<body>

    {{-- NAVBAR --}}
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand fw-bold text-success" href="/">
                Go-Lapor
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
                ☰
            </button>

            <div class="collapse navbar-collapse" id="navMenu">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#how">How To Use</a></li>
                    <li class="nav-item"><a class="nav-link" href="#kategori">Kategori</a></li>
                    <li class="nav-item"><a class="nav-link" href="#laporan">Laporan</a></li>
                    <li class="nav-item"><a class="nav-link" href="#faq">FAQ</a></li>

                    @auth
                        <li class="nav-item">
                            <a class="btn btn-success ms-3" href="{{ route('home') }}">
                                Dashboard
                            </a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="btn btn-success ms-3" href="{{ route('login') }}">
                                Login
                            </a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    {{-- FOOTER --}}
    <footer class="bg-light text-center py-4">
        <div class="container">
            <p class="mb-0">© {{ date('Y') }} Go-Lapor. All rights reserved.</p>
        </div>
    </footer>

    {{-- FLOATING BUTTON --}}
    <a href="{{ route('report.take') }}" class="floating-report">
        📷
    </a>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')

</body>

</html>
