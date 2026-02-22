@extends('layouts.no-nav')

@section('title', 'Tambah Laporan')

@section('content')

    <div class="container py-5">

        <div class="report-header text-center mb-5">
            <h2 class="fw-bold mb-3">
                Laporkan Masalahmu
            </h2>

            <p class="text-muted mx-auto">
                Isi form dengan lengkap agar kami dapat memproses laporan
                dengan lebih cepat dan akurat.
            </p>
        </div>

        <form action="{{ route('report.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" id="lat" name="latitude">
            <input type="hidden" id="lng" name="longitude">

            <div class="row g-5 align-items-start">

                {{-- LEFT SIDE --}}
                <div class="col-12 col-lg-7 d-flex flex-column">

                    <div class="mb-4">
                        <label class="form-label">Judul Laporan</label>
                        <input type="text" class="form-control" name="title">
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Kategori Laporan</label>
                        <select class="form-select" name="report_category_id">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Ceritakan Laporan Kamu</label>
                        <textarea class="form-control" rows="5" name="description"></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Alamat Lengkap</label>
                        <textarea id="address" class="form-control" rows="5" name="address"></textarea>
                    </div>

                    {{-- BUTTON --}}
                    <button class="btn btn-success w-100 py-2 rounded-pill mt-2 order-3 order-lg-0">
                        Laporkan
                    </button>

                </div>

                {{-- RIGHT SIDE --}}
                <div class="col-12 col-lg-5">

                    <div class="mb-4">
                        <label class="form-label">Bukti Laporan</label>
                        <input type="file" class="d-none" id="image" name="image">
                        <img id="image-preview" class="img-fluid border shadow-sm" alt="Preview">
                    </div>

                    <div>
                        <label class="form-label">Lokasi Laporan</label>
                        <div id="map" class="rounded-4 shadow-sm"></div>
                    </div>

                </div>

            </div>

            

        </form>

    </div>

@endsection

@push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {

            const imageData = sessionStorage.getItem("imageBlob");
            const imageInput = document.getElementById("image");
            const imagePreview = document.getElementById("image-preview");

            if (imageData) {

                // tampilkan preview
                imagePreview.src = imageData;

                // ubah base64 jadi file
                fetch(imageData)
                    .then(res => res.blob())
                    .then(blob => {

                        const file = new File([blob], "report.png", {
                            type: "image/png"
                        });

                        const dataTransfer = new DataTransfer();
                        dataTransfer.items.add(file);

                        imageInput.files = dataTransfer.files;

                    });

                // hapus setelah dipakai
                // sessionStorage.removeItem("imageBlob");
            }
        });
    </script>
@endpush

{{-- script dari tutorial --}}
{{-- <script>
        // Ambil base64 dari localStorage
        var imageBase64 = localStorage.getItem('image');

        // Mengubah base64 menjadi binary Blob
        function base64ToBlob(base64, mime) {
            var byteString = atob(base64.split(',')[1]);
            var ab = new ArrayBuffer(byteString.length);
            var ia = new Uint8Array(ab);
            for (var i = 0; i < byteString.length; i++) {
                ia[i] = byteString.charCodeAt(i);
            }
            return new Blob([ab], {
                type: mime
            });
        }

        // Fungsi untuk membuat objek file dan set ke input file
        function setFileInputFromBase64(base64) {
            // Mengubah base64 menjadi Blob
            var blob = base64ToBlob(base64, 'image/jpeg'); // Ganti dengan tipe mime sesuai gambar Anda
            var file = new File([blob], 'image.jpg', {
                type: 'image/jpeg'
            }); // Nama file dan tipe MIME

            // Set file ke input file
            var imageInput = document.getElementById('image');
            var dataTransfer = new DataTransfer();
            dataTransfer.items.add(file);
            imageInput.files = dataTransfer.files;

            // Menampilkan preview gambar
            var imagePreview = document.getElementById('image-preview');
            imagePreview.src = URL.createObjectURL(file);
        }

        // Set nilai input file dan preview gambar
        setFileInputFromBase64(imageBase64);
    </script> --}}
