@extends('layouts.no-nav')

@section('title', 'Preview Foto')

@section('content')
    <div class="d-flex flex-column justify-content-center align-items-center">
        <img alt="image" id="image-preview" class="img-fluid rounded-2">

        <div class="d-flex justify-content-center mt-3 gap-3">

            <a href="{{ route('report.take') }}" class="btn btn-outline-primary">
                Ulangi Foto
            </a>
            <a href="{{ route('report.create') }}" class="btn btn-primary">
                Gunakan Foto
            </a>
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

@section('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {

            const imageData = sessionStorage.getItem("imageBlob");
            const imagePreview = document.getElementById("image-preview");

            if (imageData) {
                imagePreview.src = imageData;
            } else {
                console.log("Tidak ada gambar di sessionStorage");
            }

        });
    </script>
@endsection
