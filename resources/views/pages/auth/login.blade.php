@extends('layouts.no-nav')

@section('title', 'Masuk')

@section('content')

    <div class="auth-wrapper d-flex align-items-center justify-content-center">

        <div class="auth-card">

            <div class="text-center mb-4">
                <h4 class="fw-bold mb-1">Selamat datang di Go-Lapor</h4>
                <p class="text-muted small mb-0 mt-2">
                    Silahkan masuk untuk melanjutkan
                </p>
            </div>

            {{-- <button class="btn btn-success w-100 py-2 rounded-pill mb-3">
                <i class="fa-brands fa-google me-2"></i>
                Masuk dengan Google
            </button>

            <div class="d-flex align-items-center mb-3">
                <hr class="grow">
                <span class="mx-2 small text-muted">atau</span>
                <hr class="grow">
            </div> --}}

            @if (session()->has('success'))
                <div class="alert alert-success small">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('login.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label small">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email">
                    @error('email')
                        <div class="invalid-feedback small">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label small">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password">
                    @error('password')
                        <div class="invalid-feedback small">{{ $message }}</div>
                    @enderror
                </div>

                <button class="btn btn-success w-100 rounded-pill mt-2">
                    Masuk
                </button>

                <div class="d-flex justify-content-between mt-3 small">
                    <a href="{{ route('register') }}" class="text-decoration-none text-primary small">
                        Belum punya akun?
                    </a>
                    <a href="#" class="text-decoration-none text-primary small">
                        Lupa Password
                    </a>
                </div>

            </form>

        </div>

    </div>

    <style>
        .auth-wrapper {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .auth-card {
            width: 100%;
            max-width: 420px;
            /* Ini yang bikin desktop tidak melebar */
            background: #ffffff;
            padding: 32px 28px;
            border-radius: 18px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
        }
    </style>
@endsection
