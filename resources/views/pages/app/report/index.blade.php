@extends('layouts.app')

@section('title', 'Daftar Pengaduan')

@section('content')
    <div class="py-3" id="reports">
        <div class="dropdown">
            <button class="btn btn-filter dropdown-toggle" type="button" data-bs-toggle="dropdown">
                {{ request('sort', 'newest') === 'oldest' ? 'Terlama' : 'Terbaru' }}
            </button>

            <ul class="dropdown-menu dropdown-menu-end">
                <li>
                    <a class="dropdown-item {{ request('sort', 'newest') === 'newest' ? 'active' : '' }}"
                        href="{{ request()->fullUrlWithQuery(['sort' => 'newest']) }}">
                        Terbaru
                    </a>
                </li>

                <li>
                    <a class="dropdown-item {{ request('sort') === 'oldest' ? 'active' : '' }}"
                        href="{{ request()->fullUrlWithQuery(['sort' => 'oldest']) }}">
                        Terlama
                    </a>
                </li>
            </ul>
        </div>

        @if (request()->category)
            <p>Kategori {{ request()->category }}</p>
        @endif

        <div class="row g-4 mt-3">

            @forelse ($reports as $report)
                <div class="col-12 col-md-6 col-xl-4">

                    <a href="{{ route('report.show', $report->code) }}" class="text-decoration-none text-dark">

                        <div class="report-card-modern">

                            {{-- IMAGE --}}
                            <div class="report-image-wrapper">
                                <img src="{{ asset('storage/' . $report->image) }}" class="report-image">

                                {{-- @if ($report->latest_status)
                                    <span
                                        class="report-badge 
                                @if ($report->latest_status['label'] == 'Terkirim') badge-blue
                                @elseif($report->latest_status['label'] == 'Diproses') badge-yellow
                                @elseif($report->latest_status['label'] == 'Selesai') badge-green
                                @elseif($report->latest_status['label'] == 'Ditolak') badge-red @endif">
                                        {{ $report->latest_status['label'] }}
                                    </span>
                                @endif --}}
                            </div>

                            {{-- CONTENT --}}
                            <div class="report-body">

                                <div class="report-meta">
                                    <div class="d-flex align-items-center gap-2">
                                        <img src="{{ asset('assets/app/images/icons/MapPin.png') }}" width="14">
                                        <span class="text-success small">
                                            {{ \Str::limit($report->address, 20) }}
                                        </span>
                                    </div>

                                    <span class="text-muted small">
                                        {{ \Carbon\Carbon::parse($report->created_at)->format('d M Y') }}
                                    </span>
                                </div>

                                <h6 class="report-title">
                                    {{ $report->title }}
                                </h6>

                            </div>

                        </div>
                    </a>

                </div>
            @empty

                <div class="text-center py-5">
                    <img src="{{ asset('assets/app/images/no-data.png') }}" style="width:150px; opacity:.6;">
                    <p class="text-muted mt-3">
                        Tidak ada pengaduan ditemukan
                    </p>
                </div>
            @endforelse

        </div>

        @if ($reports->hasPages())
            <div class="d-flex justify-content-center mt-5">
                {{ $reports->onEachSide(1)->links('pagination::bootstrap-5') }}
            </div>
        @endif

    </div>
@endsection
