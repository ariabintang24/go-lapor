@extends('layouts.no-nav')

@section('title', 'Ambil Foto')

@section('content')

    <div class="camera-wrapper d-flex flex-column align-items-center justify-content-start">

        {{-- HEADER --}}
        <div class="text-center mb-3">
            <h5 class="fw-semibold mb-1">Ambil Foto Laporan</h5>
        </div>

        {{-- CAMERA BOX --}}
        <div class="camera-box position-relative">

            <video autoplay playsinline muted id="video-webcam">
                Browsermu tidak mendukung bro, upgrade donk!
            </video>

        </div>

        {{-- TIP --}}
        <div class="camera-tips mt-3">

            <div class="tip-item">
                <p class="fw-bold">Tips tambahan:</p>
            </div>

            <div class="tip-item">
                📱 Gunakan smartphone untuk pengalaman terbaik
            </div>

            <div class="tip-item">
                📍 Ambil dari jarak ±1 meter untuk hasil terbaik
            </div>

            <div class="tip-item">
                💡 Pastikan objek terlihat jelas dan tidak blur
            </div>

            <div class="tip-item">
                🧭 Pastikan lokasi sesuai dengan kejadian sebenarnya
            </div>

        </div>

        {{-- SNAP BUTTON --}}
        <div class="snap-wrapper">
            <button class="btn btn-primary btn-snap" onclick="takeSnapshot()">
                <i class="fas fa-camera"></i>
            </button>
        </div>

    </div>

    <style>
        /* Wrapper */
        .camera-wrapper {
            min-height: 100vh;
            padding: 20px;
        }

        /* Video tetap tidak diubah logic nya */
        #video-webcam {
            width: 100%;
            height: 350px;
            object-fit: cover;
            border-radius: 20px;
            background: black;
        }

        /* Camera box */
        .camera-box {
            width: 100%;
            max-width: 500px;
            position: relative;
        }

        /* Overlay frame (tidak ganggu video) */


        /* Snap button wrapper */
        .snap-wrapper {
            position: fixed;
            bottom: 30px;
            left: 50%;
            transform: translateX(-50%);
        }

        /* Snap button style */
        .btn-snap {
            width: 65px;
            height: 65px;
            border-radius: 50%;
            font-size: 20px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2);
            transition: 0.2s ease;
        }

        .btn-snap:active {
            transform: scale(0.95);
        }

        .camera-tips {
            max-width: 420px;
            margin: 15px auto 0 auto;
            font-size: 13px;
            color: #6c757d;
        }

        .tip-item {
            margin-bottom: 6px;
        }
    </style>

@endsection

@push('scripts')
    <script src="{{ asset('assets/app/js/take.js') }}"></script>
@endpush
