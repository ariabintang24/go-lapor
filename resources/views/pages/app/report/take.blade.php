@extends('layouts.no-nav')

@section('title', 'Ambil Foto')

@section('content')
    <div class="d-flex flex-column justify-content-center align-items-center">
        <video autoplay playsinline muted id="video-webcam">
            Browsermu tidak mendukung bro, upgrade donk!
        </video>

        <div class="d-flex justify-content-center mt-3 position-absolute bottom-0">
            <button class="btn btn-primary btn-snap mb-3 " onclick="takeSnapshot()">
                <i class="fas fa-camera"></i>
            </button>
        </div>
    </div>

    <style>
        #video-webcam {
            width: 100%;
            height: 350px;
            object-fit: cover;
            border-radius: 20px;
            background: black;
        }
    </style>
@endsection

@push('scripts')
    <script src="{{ asset('assets/app/js/take.js') }}"></script>
@endpush
