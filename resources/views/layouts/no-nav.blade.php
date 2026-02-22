<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>

    <link rel="stylesheet" href="{{ asset('assets/app/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/app/css/style.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />

</head>

<body class="bg-light">
    {{-- Responsive Wrapper --}}
    <div class="no-nav-wrapper">
        @yield('content')
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

    {{-- <script src="{{ asset('assets/app/js/take.js') }}"></script> --}}

    <script src="{{ asset('assets/app/js/report.js') }}"></script>


    @stack('scripts')

    <style>
        .no-nav-wrapper {
            width: 100%;
            min-height: 100vh;
            padding: 30px 20px;
        }

        /* Desktop */
        @media (min-width: 992px) {
            .no-nav-wrapper {
                max-width: 1200px;
                margin: 0 auto;
                padding: 60px 40px;
            }
        }
    </style>
</body>

</html>
