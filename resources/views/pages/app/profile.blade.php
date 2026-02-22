@extends('layouts.app')

@section('title', 'Profil Saya')

@section('content')

    <div class="profile-wrapper">

        <div class="row g-4">

            {{-- LEFT SIDE --}}
            <div class="col-lg-6">

                <div class="card profile-card text-center p-4">

                    @auth
                        <div class="d-flex justify-content-center">
                            <img src="{{ asset('storage/' . auth()->user()?->resident?->avatar) }}" class="profile-avatar"
                                alt="avatar">
                        </div>

                        <h5 class="fw-semibold mt-3 mb-4 text-center">
                            {{ auth()->user()->name }}
                        </h5>
                    @endauth

                    <div class="row g-3">
                        <div class="col-6">
                            <div class="profile-stat">
                                <h4 class="mb-1">{{ $terkirim }}</h4>
                                <p class="text-muted small mb-0 text-nowrap">
                                    Laporan Terkirim
                                </p>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="profile-stat">
                                <h4 class="mb-1">{{ $diproses }}</h4>
                                <p class="text-muted small mb-0 text-nowrap">
                                    Laporan Diproses
                                </p>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="profile-stat">
                                <h4 class="mb-1">{{ $selesai }}</h4>
                                <p class="text-muted small mb-0 text-nowrap">
                                    Laporan Selesai
                                </p>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="profile-stat">
                                <h4 class="mb-1">{{ $ditolak }}</h4>
                                <p class="text-muted small mb-0 text-nowrap">
                                    Laporan Ditolak
                                </p>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

            {{-- RIGHT SIDE --}}
            <div class="col-lg-6">

                <div class="card profile-menu-card p-3">

                    <div class="list-group list-group-flush">

                        <a href="#"
                            class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center gap-3">
                                <i class="fa-solid fa-user"></i>
                                <span>Pengaturan Akun</span>
                            </div>
                            <i class="fa-solid fa-chevron-right"></i>
                        </a>

                        <a href="#"
                            class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center gap-3">
                                <i class="fa-solid fa-lock"></i>
                                <span>Kata sandi</span>
                            </div>
                            <i class="fa-solid fa-chevron-right"></i>
                        </a>

                        <a href="#"
                            class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center gap-3">
                                <i class="fa-solid fa-question-circle"></i>
                                <span>Bantuan dan dukungan</span>
                            </div>
                            <i class="fa-solid fa-chevron-right"></i>
                        </a>

                    </div>

                    <div class="mt-4">
                        <button class="btn btn-outline-danger w-100 rounded-pill" data-bs-toggle="modal"
                            data-bs-target="#logoutModal">
                            Keluar
                        </button>
                    </div>

                </div>

            </div>

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
