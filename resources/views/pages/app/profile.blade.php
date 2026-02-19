@extends('layouts.app')

@section('title', 'Profil Saya')

@section('content')
    <div class="d-flex flex-column justify-content-center align-items-center gap-2">
        @auth
            <img src="{{ asset('storage/' . auth()->user()?->resident?->avatar) }}" alt="avatar" class="avatar">
            <h5>{{ auth()->user()->name }}</h5>
        @endauth
    </div>

    <div class="row mt-4">
        <div class="col-6">
            <div class="card profile-stats">
                <div class="card-body">
                    <h5 class="card-title">2</h5>
                    <p class="card-text">Laporan Aktif</p>
                </div>
            </div>
        </div>

        <div class="col-6">
            <div class="card profile-stats">
                <div class="card-body">
                    <h5 class="card-title">3</h5>
                    <p class="card-text">Laporan Selesai</p>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-4">
        <div class="list-group list-group-flush">
            <a href="#"
                class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center gap-3">
                    <i class="fa-solid fa-user"></i>
                    <p class="fw-light">Pengaturan Akun</p>
                </div>
                <i class="fa-solid fa-chevron-right"></i>
            </a>
            <a href="#"
                class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center gap-3">
                    <i class="fa-solid fa-lock"></i>
                    <p class="fw-light"> Kata sandi</p>
                </div>
                <i class="fa-solid fa-chevron-right"></i>
            </a>
            <a href="#"
                class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center gap-3">
                    <i class="fa-solid fa-question-circle"></i>
                    <p class="fw-light">Bantuan dan dukungan</p>
                </div>
                <i class="fa-solid fa-chevron-right"></i>
            </a>
        </div>

        <div class="mt-4">
            <button class="btn btn-outline-danger w-100 rounded-pill" data-bs-toggle="modal" data-bs-target="#logoutModal">
                Keluar
            </button>
        </div>
    </div>

    <!-- Logout Confirmation Modal -->
    <div class="modal fade" id="logoutModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg rounded-4 p-3">

                <div class="text-center p-3">
                    <div class="mb-3">
                        <i class="fa-solid fa-right-from-bracket text-danger" style="font-size: 40px;"></i>
                    </div>

                    <h5 class="fw-semibold">Konfirmasi Logout</h5>
                    <p class="text-muted small">
                        Apakah kamu yakin ingin keluar dari akun ini?
                    </p>
                </div>

                <div class="d-flex gap-2 px-3 pb-3">
                    <button type="button" class="btn btn-light w-100 rounded-pill" data-bs-dismiss="modal">
                        Batal
                    </button>

                    <form method="POST" action="{{ route('logout') }}" class="w-100">
                        @csrf
                        <button type="submit" class="btn btn-danger w-100 rounded-pill">
                            Ya, Keluar
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <style>
        .modal-content {
            backdrop-filter: blur(10px);
            background: #ffffff;
            border-radius: 20px;
        }

        .modal.fade .modal-dialog {
            transition: transform 0.2s ease-out;
        }
    </style>

@endsection
