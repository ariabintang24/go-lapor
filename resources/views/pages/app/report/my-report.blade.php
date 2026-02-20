@extends('layouts.app')

@section('title', 'Laporanmu')

@section('content')

    @php
        $status = request('status') ?? 'delivered';
        $hasAnyReport = $totalReports > 0;

        $emptyState = [
            // Jika belum pernah buat laporan
            'no_report' => [
                'delivered' => [
                    'title' => 'Kamu belum mengirim laporan',
                    'desc' => 'Kirim laporan pertamamu untuk mulai melaporkan masalah di sekitarmu.',
                ],
                'in_process' => [
                    'title' => 'Belum ada laporan yang diproses',
                    'desc' => 'Laporanmu akan muncul di sini setelah dikirim dan mulai ditindaklanjuti.',
                ],
                'completed' => [
                    'title' => 'Belum ada laporan yang selesai',
                    'desc' => 'Laporan yang telah ditangani akan muncul di sini.',
                ],
                'rejected' => [
                    'title' => 'Belum ada laporan yang ditolak',
                    'desc' => 'Jika ada laporan yang tidak dapat diproses, akan muncul di sini.',
                ],
            ],

            // Jika sudah pernah membuat laporan
            'has_report' => [
                'delivered' => [
                    'title' => 'Belum ada laporan baru',
                    'desc' => 'Laporan yang baru kamu kirim akan muncul di sini.',
                ],
                'in_process' => [
                    'title' => 'Belum ada laporan yang sedang diproses',
                    'desc' => 'Laporanmu akan muncul di sini ketika sedang ditindaklanjuti.',
                ],
                'completed' => [
                    'title' => 'Belum ada laporan yang selesai',
                    'desc' => 'Laporan yang telah ditangani akan muncul di sini.',
                ],
                'rejected' => [
                    'title' => 'Tidak ada laporan yang ditolak',
                    'desc' => 'Semua laporanmu saat ini dalam proses atau telah selesai.',
                ],
            ],
        ];

        $stateKey = $hasAnyReport ? 'has_report' : 'no_report';
    @endphp

    {{-- FILTER TABS --}}
    <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item">
            <a class="nav-link {{ request('status') === 'delivered' ? 'active' : '' }}"
                href="{{ url()->current() }}?status=delivered">
                Terkirim
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ request('status') === 'in_process' ? 'active' : '' }}"
                href="{{ url()->current() }}?status=in_process">
                Diproses
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ request('status') === 'completed' ? 'active' : '' }}"
                href="{{ url()->current() }}?status=completed">
                Selesai
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ request('status') === 'rejected' ? 'active' : '' }}"
                href="{{ url()->current() }}?status=rejected">
                Ditolak
            </a>
        </li>
    </ul>

    {{-- CONTENT --}}
    <div class="mt-3">

        @if ($reports->isEmpty())
            <div class="text-center mt-5">

                <img src="{{ asset('assets/app/images/no-data.png') }}" alt="No Data" width="180" class="mb-3">

                <h6 class="fw-semibold text-dark">
                    {{ $emptyState[$stateKey][$status]['title'] ?? 'Belum ada data' }}
                </h6>

                <p class="text-muted small mb-3">
                    {{ $emptyState[$stateKey][$status]['desc'] ?? '' }}
                </p>

                {{-- Tombol selalu tampil jika status ini kosong --}}
                <a href="{{ route('report.take') }}" class="btn btn-primary px-4 shadow-sm mt-2">
                    <i class="fa-solid fa-plus me-1"></i>
                    Tambah Laporan
                </a>

            </div>
        @else
            @include('pages.app.report.partials.card')
        @endif

    </div>

@endsection
