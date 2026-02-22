@extends('layouts.app')

@section('title', $report->code)

@section('content')

    <div class="container py-4">

        {{-- BACK + TITLE --}}
        <div class="d-flex align-items-center gap-3 mb-4">
            <a href="{{ route('report.index') }}" class="text-decoration-none">
                <i class="fa-solid fa-arrow-left"></i>
            </a>
            <h4 class="mb-0 fw-semibold">Detail Laporan {{ $report->code }}</h4>
        </div>

        {{-- HERO IMAGE --}}
        <div class="report-hero mb-4">
            <img src="{{ asset('storage/' . $report->image) }}" class="img-fluid w-100">
        </div>

        {{-- TITLE --}}
        <h3 class="fw-bold mb-4">{{ $report->title }}</h3>

        {{-- GRID LAYOUT --}}
        <div class="row g-4">

            {{-- LEFT: DETAIL --}}
            <div class="col-12 col-lg-7">
                <div class="card modern-card h-100">
                    <div class="card-body">

                        <h6 class="fw-bold mb-4">Detail Informasi</h6>

                        <div class="info-row">
                            <div class="info-label">Kode</div>
                            <div class="info-separator">:</div>
                            <div class="info-value">{{ $report->code }}</div>
                        </div>

                        <div class="info-row">
                            <div class="info-label">Tanggal</div>
                            <div class="info-separator">:</div>
                            <div class="info-value">
                                {{ \Carbon\Carbon::parse($report->created_at)->format('d M Y | H:i') }}
                            </div>
                        </div>

                        <div class="info-row">
                            <div class="info-label">Kategori</div>
                            <div class="info-separator">:</div>
                            <div class="info-value">
                                {{ $report->reportCategory->name }}
                            </div>
                        </div>

                        <div class="info-row">
                            <div class="info-label">Lokasi</div>
                            <div class="info-separator">:</div>
                            <div class="info-value">
                                {{ $report->address }}
                            </div>
                        </div>

                        {{-- STATUS --}}
                        <div class="info-row">
                            <div class="info-label">Status</div>
                            <div class="info-separator">:</div>
                            <div class="info-value">

                                @php
                                    $lastStatus = $report->reportStatuses->last()?->status;
                                @endphp

                                @if ($lastStatus)
                                    @switch($lastStatus)
                                        @case('delivered')
                                            <div class="badge-status badge-blue">
                                                <span>Terkirim</span>
                                            </div>
                                        @break

                                        @case('in_process')
                                            <div class="badge-status badge-yellow">
                                                <span>Diproses</span>
                                            </div>
                                        @break

                                        @case('completed')
                                            <div class="badge-status badge-green">
                                                <span>Selesai</span>
                                            </div>
                                        @break

                                        @case('rejected')
                                            <div class="badge-status badge-red">
                                                <span>Ditolak</span>
                                            </div>
                                        @break
                                    @endswitch
                                @endif

                            </div>
                        </div>

                        <div class="info-row">
                            <div class="info-label">Deskripsi</div>
                            <div class="info-separator">:</div>
                            <div class="info-value">
                                {{ $report->description }}
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            {{-- RIGHT: TIMELINE --}}
            <div class="col-12 col-lg-5">
                <div class="card modern-card h-100">
                    <div class="card-body">

                        <h6 class="fw-bold mb-4">Riwayat Perkembangan</h6>

                        <ul class="modern-timeline">

                            @foreach ($report->reportStatuses as $status)
                                <li>
                                    <div class="timeline-dot"></div>
                                    <div class="timeline-content">

                                        <small class="text-muted d-block mb-1">
                                            {{ \Carbon\Carbon::parse($status->created_at)->format('d M Y | H:i') }}
                                        </small>

                                        <div class="fw-medium mb-2">
                                            {{ $status->description }}
                                        </div>

                                        @if ($status->image)
                                            <img src="{{ asset('storage/' . $status->image) }}"
                                                class="img-fluid rounded-3 mt-2">
                                        @endif

                                    </div>
                                </li>
                            @endforeach

                        </ul>

                    </div>
                </div>
            </div>

        </div>

    </div>

@endsection
