@extends('layouts.app')

@section('title', 'Home')

@section('content')


    {{-- ================= HERO SECTION ================= --}}
    <div class="py-5 text-center hero-section">

        <div class="container">

            <h2 class="fw-bold display-6 mb-3">
                Laporkan dan Pantau <br>
                Masalah di Sekitarmu
            </h2>

            <p class="text-muted mb-4 px-md-5">
                Sampaikan laporan dengan mudah, pantau progres secara real-time,
                dan bantu menciptakan lingkungan yang lebih aman dan nyaman.
            </p>

            <a href="{{ route('report.create') }}" class="btn btn-primary px-4 py-2 rounded-pill">
                Mulai Lapor →
            </a>

            <div class="mt-5">
                <img src="{{ asset('assets/app/images/insight.png') }}" alt="Hero Illustration" class="img-fluid hero-image">
            </div>

        </div>

    </div>




    {{-- ================= KATEGORI (GRID) ================= --}}
    <div class="mb-5">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h6 class="fw-semibold">Kategori Laporan</h6>
        </div>

        <div class="row g-3">
            @foreach ($categories as $category)
                <div class="col-6">
                    <a href="{{ route('report.index', ['category' => $category->name]) }}"
                        class="text-decoration-none text-dark">

                        <div class="card border-0 shadow-sm h-100 text-center p-3 rounded-4">

                            <div class="mb-2">
                                <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}"
                                    style="width: 40px; height: 40px; object-fit: contain;">
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

        <div class="d-flex flex-column gap-4 mt-3">

            @foreach ($reports as $report)
                <div class="card border-0 shadow-sm rounded-4 overflow-hidden">

                    <a href="{{ route('report.show', $report->code) }}" class="text-decoration-none text-dark">

                        {{-- IMAGE --}}
                        <div class="position-relative">
                            <img src="{{ asset('storage/' . $report->image) }}" class="w-100"
                                style="height: 200px; object-fit: cover;" alt="">

                            {{-- STATUS BADGE --}}
                            @if ($report->latest_status)
                                <span
                                    class="position-absolute top-0 end-0 m-3 badge rounded-pill {{ $report->latest_status['class'] }}">
                                    {{ $report->latest_status['label'] }}
                                </span>
                            @endif
                        </div>

                        <div class="card-body">

                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <div class="d-flex align-items-center">
                                    <img src="{{ asset('assets/app/images/icons/MapPin.png') }}" alt="map pin"
                                        style="width:16px;" class="me-2">

                                    <small class="text-primary">
                                        {{ \Str::limit($report->address, 25) }}
                                    </small>
                                </div>

                                <small class="text-muted">
                                    {{ \Carbon\Carbon::parse($report->created_at)->format('d M Y | H:i') }}
                                </small>
                            </div>

                            <h6 class="fw-semibold mb-0">
                                {{ $report->title }}
                            </h6>

                        </div>

                    </a>
                </div>
            @endforeach

        </div>
    </div>



    {{-- ================= HOW TO USE (FINAL VERSION) ================= --}}
    <div class="mb-5 py-5" style="background:#ffffff;">

        <h4 class="fw-bold mb-4">Cara Menggunakan</h4>

        <div class="d-flex flex-column gap-4">

            {{-- STEP 1 --}}
            <div class="how-card">

                <div class="image-wrapper">

                    <img src="{{ asset('assets/app/images/insight.png') }}" class="img-fluid rounded-4" alt="Step 1">

                    <div class="step-badge">1</div>

                </div>

                <div class="mt-3">
                    <h5 class="fw-semibold">Pilih Kategori</h5>
                    <p class="text-muted mb-0">
                        Pilih kategori laporan sesuai permasalahan
                        yang ingin Anda laporkan.
                    </p>
                </div>

            </div>


            {{-- STEP 2 --}}
            <div class="how-card">

                <div class="image-wrapper">

                    <img src="{{ asset('assets/app/images/explore.jpg') }}" class="img-fluid rounded-4" alt="Step 2">

                    <div class="step-badge">2</div>

                </div>

                <div class="mt-3">
                    <h5 class="fw-semibold">Isi Detail</h5>
                    <p class="text-muted mb-0">
                        Lengkapi detail laporan agar tim dapat
                        menindaklanjuti dengan cepat.
                    </p>
                </div>

            </div>


            {{-- STEP 3 --}}
            <div class="how-card">

                <div class="image-wrapper">

                    <img src="{{ asset('assets/app/images/insight.png') }}" class="img-fluid rounded-4" alt="Step 3">

                    <div class="step-badge">3</div>

                </div>

                <div class="mt-3">
                    <h5 class="fw-semibold">Pantau Progres</h5>
                    <p class="text-muted mb-0">
                        Pantau status laporan secara real-time
                        hingga selesai.
                    </p>
                </div>

            </div>

        </div>

    </div>

    {{-- ================= CONTACT US ================= --}}
    {{-- ================= CONTACT US ================= --}}
    <div class="mb-5">

        <div class="text-center mb-4">
            <h4 class="fw-bold">Reach out to us</h4>
            <p class="text-muted small">
                Punya pertanyaan atau masukan? Kirim pesan kepada kami.
            </p>
        </div>

        {{-- Success Alert --}}
        @if (request()->query('contact') == 'success')
            <div class="alert alert-success rounded-4">
                Pesan berhasil dikirim! Kami akan segera menghubungi Anda.
            </div>
        @endif

        <div class="card border-0 shadow-sm rounded-4 p-4">

            <form action="https://api.web3forms.com/submit" method="POST">

                {{-- WEB3FORMS ACCESS KEY --}}
                <input type="hidden" name="access_key" value="YOUR_ACCESS_KEY_HERE">

                {{-- Redirect kembali ke halaman ini --}}
                <input type="hidden" name="redirect" value="{{ url('/?contact=success') }}">

                {{-- Honeypot Anti Spam --}}
                <input type="checkbox" name="botcheck" class="d-none" style="display:none;">

                {{-- NAME --}}
                <div class="mb-3 position-relative">
                    <label class="form-label">Your name</label>

                    <i class="bi bi-person position-absolute" style="top: 42px; left: 15px; color:#9ca3af;"></i>

                    <input type="text" name="name" required class="form-control rounded-pill ps-5 py-2"
                        placeholder="Enter your name">
                </div>

                {{-- EMAIL --}}
                <div class="mb-3 position-relative">
                    <label class="form-label">Email id</label>

                    <i class="bi bi-envelope position-absolute" style="top: 42px; left: 15px; color:#9ca3af;"></i>

                    <input type="email" name="email" required class="form-control rounded-pill ps-5 py-2"
                        placeholder="Enter your email">
                </div>

                {{-- MESSAGE --}}
                <div class="mb-4">
                    <label class="form-label">Message</label>

                    <textarea name="message" rows="4" required class="form-control rounded-4 py-2"
                        placeholder="Enter your message"></textarea>
                </div>

                {{-- BUTTON --}}
                <div class="d-grid">
                    <button type="submit" class="btn text-white fw-semibold py-2 rounded-pill"
                        style="background: linear-gradient(90deg, #5f4dee, #6f42c1); border:none;">
                        Submit →
                    </button>
                </div>

            </form>

        </div>

    </div>

    {{-- ================= CENTERED WHITE FOOTER ================= --}}
    <footer class="pt-5 pb-4 text-center" style="background:#ffffff; border-top:1px solid #e5e7eb;">

        <div class="container">

            {{-- BRAND --}}
            <h3 class="fw-bold mb-4" style="color:#111827;">
                Go-<span style="color:#6f42c1;">Lapor</span>
            </h3>

            {{-- MENU --}}
            <ul class="list-inline mb-4 footer-menu small fw-semibold">
                <li class="list-inline-item mx-3">
                    <a href="{{ route('home') }}" class="footer-link">Home</a>
                </li>
                <li class="list-inline-item mx-3">
                    <a href="{{ route('report.index') }}" class="footer-link">Laporan</a>
                </li>
                <li class="list-inline-item mx-3">
                    <a href="#category" class="footer-link">Notifikasi</a>
                </li>
                <li class="list-inline-item mx-3">
                    <a href="#reports" class="footer-link">Profile</a>
                </li>
            </ul>

            {{-- SOCIAL ICONS --}}
            <div class="d-flex justify-content-center gap-3 mb-4">

                <a href="#" class="social-circle">
                    <i class="bi bi-twitter"></i>
                </a>

                <a href="#" class="social-circle">
                    <i class="bi bi-facebook"></i>
                </a>

                <a href="#" class="social-circle">
                    <i class="bi bi-instagram"></i>
                </a>

            </div>

            {{-- COPYRIGHT --}}
            <p class="small text-muted mb-0">
                Copyright ©{{ date('Y') }} All rights reserved
            </p>

        </div>

    </footer>

@endsection
