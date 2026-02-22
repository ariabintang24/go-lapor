@extends('layouts.no-nav ')

@section('title', 'Daftar')

@section('content')

    <div class="auth-wrapper d-flex align-items-center justify-content-center">

        <div class="auth-card">

            <div class="text-center mb-4">
                <h4 class="fw-bold">Daftar Akun</h4>
                <p class="text-muted small mt-2">
                    Silahkan mengisi form dibawah ini untuk mendaftar
                </p>
            </div>

            <form action="{{ route('register.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                        value="{{ old('email') }}">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                        value="{{ old('name') }}">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Foto Profil</label>
                    <input type="file" class="form-control @error('avatar') is-invalid @enderror" name="avatar">
                    @error('avatar')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password">
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button class="btn btn-primary w-100 rounded-pill mt-2">
                    Daftar
                </button>

                <div class="text-center mt-3">
                    <a href="{{ route('login') }}" class="text-decoration-none text-primary small">
                        Sudah punya akun?
                    </a>
                </div>

            </form>

        </div>

    </div>

    <style>
        .auth-wrapper {
            height: 100vh;
            overflow: hidden;
            padding: 20px;
        }

        .auth-card {
            width: 100%;
            max-width: 420px;
            /* Biar desktop tidak melebar */
            background: #ffffff;
            padding: 30px;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
        }

        .auth-title {
            white-space: nowrap;
            /* cegah enter */
            font-size: 22px;
            margin-bottom: 6px;
            /* jarak kecil ke bawah */
        }
    </style>

@endsection
