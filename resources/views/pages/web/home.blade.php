@extends('layouts.web')

@section('title', 'Go-Lapor')

@section('content')

    {{-- HERO --}}
    <section class="hero text-center">
        <div class="container">
            <h1 class="display-4 fw-bold">
                Laporkan masalah dengan cepat & mudah
            </h1>
            <p class="lead mt-3">
                Go-Lapor membantu masyarakat menyampaikan pengaduan secara transparan dan real-time.
            </p>

            <a href="{{ route('register') }}" class="btn btn-light btn-lg mt-4">
                Mulai Sekarang
            </a>
        </div>
    </section>

    {{-- HOW TO USE --}}
    <section id="how" class="section text-center">
        <div class="container">
            <h2 class="fw-bold mb-5">Cara Menggunakan</h2>

            <div class="row">
                <div class="col-md-4">
                    <h5>1. Ambil Foto</h5>
                    <p>Gunakan kamera untuk mengambil bukti masalah.</p>
                </div>
                <div class="col-md-4">
                    <h5>2. Isi Detail</h5>
                    <p>Lengkapi informasi lokasi dan deskripsi laporan.</p>
                </div>
                <div class="col-md-4">
                    <h5>3. Pantau Progres</h5>
                    <p>Lihat status laporan secara transparan.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- KATEGORI --}}
    <section id="kategori" class="section bg-light text-center">
        <div class="container">
            <h2 class="fw-bold mb-5">Kategori Laporan</h2>

            <div class="row">
                @foreach ($categories as $category)
                    <div class="col-md-3 mb-4">
                        <div class="card shadow-sm p-4">
                            <h6>{{ $category->name }}</h6>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- LAPORAN TERBARU --}}
    <section id="laporan" class="section text-center">
        <div class="container">
            <h2 class="fw-bold mb-5">Laporan Terbaru</h2>

            <div class="row">
                @foreach ($latestReports as $report)
                    <div class="col-md-4 mb-4">
                        <div class="card shadow-sm">
                            <img src="{{ asset('storage/' . $report->image) }}" class="card-img-top">
                            <div class="card-body">
                                <h6>{{ $report->title }}</h6>
                                <p class="text-muted small">
                                    {{ \Illuminate\Support\Str::limit($report->description, 80) }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- WHY CHOOSE US --}}
    <section class="section bg-light text-center">
        <div class="container">
            <h2 class="fw-bold mb-5">Kenapa Go-Lapor?</h2>

            <div class="row">
                <div class="col-md-4">
                    <h6>Transparan</h6>
                    <p>Semua progres laporan dapat dipantau.</p>
                </div>
                <div class="col-md-4">
                    <h6>Cepat</h6>
                    <p>Pengaduan langsung diterima sistem.</p>
                </div>
                <div class="col-md-4">
                    <h6>Mudah</h6>
                    <p>Antarmuka sederhana & user friendly.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- FAQ --}}
    <section id="faq" class="section text-center">
        <div class="container">
            <h2 class="fw-bold mb-5">FAQ</h2>

            <p><strong>Apakah gratis?</strong><br>Ya, gratis untuk semua masyarakat.</p>
            <p><strong>Bagaimana cara melacak laporan?</strong><br>Login dan cek menu laporan.</p>
        </div>
    </section>

@endsection
