@extends('layouts.app')

@section('title', 'Home')

@section('content')


    {{-- ================= HERO SECTION ================= --}}
    <div class="py-5 hero-section">
        <div class="container">

            <div class="row align-items-center">

                {{-- TEXT --}}
                <div class="col-lg-6 text-center text-lg-start mb-4 mb-lg-0">

                    <h2 class="fw-bold display-6 mb-3">
                        Laporkan dan Pantau <br>
                        Masalah di Sekitarmu
                    </h2>

                    <p class="text-muted mb-4">
                        Sampaikan laporan dengan mudah, pantau progres secara real-time,
                        dan bantu menciptakan lingkungan yang lebih aman dan nyaman.
                    </p>

                    <a href="{{ route('report.take') }}" class="btn btn-primary px-4 py-2 rounded-pill">
                        Mulai Lapor →
                    </a>

                </div>

                {{-- IMAGE --}}
                <div class="col-lg-6 text-center">
                    <img src="{{ asset('assets/app/images/insight.png') }}" alt="Hero Illustration"
                        class="img-fluid hero-image">
                </div>

            </div>

        </div>
    </div>




    {{-- ================= KATEGORI (GRID) ================= --}}
    <div class="mb-5 p-4 p-lg-5">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h6 class="fw-bold">Kategori Laporan</h6>
        </div>

        <div class="row g-4">
            @foreach ($categories as $category)
                <div class="col-6 col-md-4 col-lg-2">
                    <a href="{{ route('report.index', ['category' => $category->name]) }}"
                        class="text-decoration-none text-dark">

                        <div class="card border-0 shadow-sm h-100 text-center p-3 rounded-full">

                            <div class="mb-2 icon-hover">
                                <img src="{{ asset('storage/' . $category->image) }}" class="kategori-icon"
                                    alt="{{ $category->name }}" style="width: 40px; height: 40px; object-fit: contain;">
                            </div>

                            <p class="mb-0 small fw-medium">
                                {{ $category->name }}
                            </p>

                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>



    {{-- ================= LAPORAN TERBARU ================= --}}
    <div class="mb-5" id="reports">

        <div class="d-flex justify-content-between align-items-center">
            <h6 class="fw-semibold">Pengaduan Terbaru</h6>
            <a href="{{ route('report.index') }}" class="text-primary text-decoration-none small">
                Lihat semua
            </a>
        </div>

        <div class="row g-4 mt-3">

            @foreach ($reports as $report)
                <div class="col-12 col-md-6 col-xl-4">

                    <a href="{{ route('report.show', $report->code) }}" class="text-decoration-none text-dark">

                        <div class="modern-report-card h-100">

                            {{-- IMAGE --}}
                            <div class="modern-report-image-wrapper">
                                <img src="{{ asset('storage/' . $report->image) }}" class="modern-report-image"
                                    alt="">

                                @if ($report->latest_status)
                                    <span class="modern-report-badge {{ $report->latest_status['class'] }}">
                                        {{ $report->latest_status['label'] }}
                                    </span>
                                @endif
                            </div>

                            {{-- CONTENT --}}
                            <div class="modern-report-body">

                                <div class="modern-report-meta">
                                    <div class="d-flex align-items-center gap-2">
                                        <img src="{{ asset('assets/app/images/icons/MapPin.png') }}" style="width:14px;">
                                        <span class="text-success small">
                                            {{ \Str::limit($report->address, 25) }}
                                        </span>
                                    </div>

                                    <span class="text-muted small">
                                        {{ \Carbon\Carbon::parse($report->created_at)->format('d M Y') }}
                                    </span>
                                </div>

                                <h6 class="modern-report-title">
                                    {{ $report->title }}
                                </h6>

                            </div>

                        </div>

                    </a>
                </div>
            @endforeach

        </div>
    </div>



    {{-- ================= HOW TO USE (FINAL VERSION) ================= --}}
    <div class="mb-5 py-5">

        <div class="container">

            <h4 class="fw-bold mb-5 text-center">Cara Menggunakan</h4>

            <div class="row g-4">

                {{-- STEP 1 --}}
                <div class="col-md-4">
                    <div class="how-card text-center">

                        <div class="image-wrapper">
                            <img src="{{ asset('assets/app/images/step-1.jpeg') }}" class="how-image" alt="Step 1">
                            <div class="step-badge">1</div>
                        </div>

                        <div class="text-center px-3">
                            <h6 class="fw-semibold step-title">
                                Pilih Kategori
                            </h6>

                            <p class="text-muted step-desc mb-0">
                                Lengkapi detail laporan agar tim dapat
                                menindaklanjuti dengan cepat.
                            </p>
                        </div>

                    </div>
                </div>

                {{-- STEP 2 --}}
                <div class="col-md-4">
                    <div class="how-card text-center">

                        <div class="image-wrapper">
                            <img src="{{ asset('assets/app/images/step-2.jpeg') }}" class="how-image" alt="Step 2">
                            <div class="step-badge">2</div>
                        </div>

                        <div class="text-center px-3">
                            <h6 class="fw-semibold step-title">
                                Isi Detail
                            </h6>

                            <p class="text-muted step-desc mb-0">
                                Lengkapi detail laporan agar tim dapat
                                menindaklanjuti dengan cepat.
                            </p>
                        </div>

                    </div>
                </div>

                {{-- STEP 3 --}}
                <div class="col-md-4">
                    <div class="how-card text-center">

                        <div class="image-wrapper">
                            <img src="{{ asset('assets/app/images/step-3.jpeg') }}" class="how-image" alt="Step 3">
                            <div class="step-badge">3</div>
                        </div>

                        <div class="text-center px-3">
                            <h6 class="fw-semibold step-title">
                                Pantau Progres
                            </h6>

                            <p class="text-muted step-desc mb-0">
                                Pantau progres laporan secara real-time hingga selesai
                            </p>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    {{-- ================= CONTACT US ================= --}}
    <div class="contact-section py-5">

        <div class="text-center mb-5">
            <h3 class="fw-bold mb-2">Hubungi Kami</h3>
            <p class="text-muted">
                Punya pertanyaan atau masukan? Kirim pesan kepada kami.
            </p>
        </div>

        <div class="contact-wrapper mx-auto">

            <form action="https://api.web3forms.com/submit" method="POST">

                <input type="hidden" name="access_key" value="YOUR_ACCESS_KEY_HERE">
                <input type="hidden" name="redirect" value="{{ url('/?contact=success') }}">
                <input type="checkbox" name="botcheck" class="d-none">

                <div class="row g-4">

                    {{-- NAME --}}
                    <div class="col-12 col-md-6">
                        <label class="form-label">Nama</label>
                        <input type="text" name="name" required class="form-control custom-input"
                            placeholder="Masukkan nama Anda">
                    </div>

                    {{-- EMAIL --}}
                    <div class="col-12 col-md-6">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" required class="form-control custom-input"
                            placeholder="Masukkan email Anda">
                    </div>

                    {{-- MESSAGE --}}
                    <div class="col-12">
                        <label class="form-label">Pesan</label>
                        <textarea name="message" rows="6" required class="form-control custom-textarea"
                            placeholder="Tulis pesan Anda..."></textarea>
                    </div>

                </div>

                <div class="mt-4">
                    <button type="submit" class="btn contact-btn">
                        Kirim →
                    </button>
                </div>

            </form>

        </div>

    </div>

    {{-- ================= CENTERED WHITE FOOTER ================= --}}
    

@endsection
