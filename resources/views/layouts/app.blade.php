<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>

    <link rel="stylesheet" href="{{ asset('assets/app/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/app/css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css" rel="stylesheet">
</head>

<body class="d-flex flex-column min-vh-100 pt-5">
    <div class="container-fluid flex-fill">

        <div class="container py-4 mb-5">
            @yield('content')
        </div>

    </div>

    {{-- FOOTER FULL WIDTH --}}
    @include('includes.footer')

    <a href="{{ route('report.take') }}" class="floating-report-btn">
        <i class="fa-solid fa-camera"></i>
    </a>

    @include('includes.nav-mobile')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/glightbox/dist/js/glightbox.min.js"></script>

    <script>
        window.addEventListener('load', function() {

            const lightbox = GLightbox({
                selector: null
            });

            document.addEventListener('click', function(e) {

                const target = e.target.closest('.preview-lightbox');
                if (!target) return;

                e.preventDefault();
                e.stopPropagation();

                lightbox.setElements([{
                    href: target.dataset.src,
                    type: 'image'
                }]);

                lightbox.open();

            });

        });
    </script>

    @stack('scripts')

</body>

</html>
