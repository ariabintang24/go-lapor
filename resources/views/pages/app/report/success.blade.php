@extends('layouts.no-nav')

@section('title', 'Laporan Berhasil Dikirim')

@section('content')
    <div class="success-wrapper d-flex flex-column justify-content-center align-items-center text-center">

        <div id="lottie" class="mb-4"></div>

        <h5 class="fw-bold mb-2">
            Yeay! Laporan kamu berhasil dibuat
        </h5>

        <p class="text-muted mb-4 px-3">
            Kamu bisa melihat laporan yang dibuat di halaman laporan
        </p>

        <a href="{{ route('report.myreport', ['status' => 'delivered']) }}" class="btn btn-success rounded-pill px-4 py-2">
            Lihat Laporan
        </a>

    </div>

    <style>
        .success-wrapper {
            min-height: 75vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            overflow: hidden;
        }
    </style>
@endsection

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.12.2/lottie.min.js"></script>
    <script>
        var animation = bodymovin.loadAnimation({
            container: document.getElementById('lottie'),
            renderer: 'svg',
            loop: true,
            autoplay: true,
            path: "{{ asset('assets/app/lottie/success.json') }}"
        })
    </script>
@endpush
