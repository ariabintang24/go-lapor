@extends('layouts.app')

@section('title', 'Daftar Pengaduan')

@section('content')
    <div class="py-3" id="reports">
        <div class="d-flex justify-content-between align-items-center">
            <p class="text-muted">{{ $reports->count() }} List Pengaduan</p>

            <button class="btn btn-filter" type="button">
                <i class="fa-solid fa-filter me-2"></i>
                Filter
            </button>

        </div>

        @if (request()->category)
            <p>Kategori {{ request()->category }}</p>
        @endif

        <div class="d-flex flex-column gap-3 mt-3">

            @forelse ($reports as $report)
                <div class="card card-report border-0 shadow-none">
                    <a href="{{ route('report.show', $report->code) }}" class="text-decoration-none text-dark">
                        <div class="card-body p-0">
                            <div class="card-report-image position-relative mb-2">
                                <img src="{{ asset('storage/' . $report->image) }}" alt="">

                                @if ($report->latest_status)
                                    <div class="badge-status {{ $report->latest_status['class'] }}">
                                        {{ $report->latest_status['label'] }}
                                    </div>
                                @endif
                            </div>

                            <div class="d-flex justify-content-between align-items-end mb-2">
                                <div class="d-flex align-items-center ">
                                    <img src="{{ asset('assets/app/images/icons/MapPin.png') }}" alt="map pin"
                                        class="icon me-2">

                                    <p class="text-primary city">
                                        {{ $report->address }}
                                    </p>
                                </div>

                                <p class="text-secondary date">
                                    {{ \Carbon\Carbon::parse($report->created_at)->format('d M Y | H:i') }}
                                </p>
                            </div>

                            <h1 class="card-title">
                                {{ $report->title }}
                            </h1>
                        </div>
                    </a>
                </div>

            @empty

                {{-- 🔥 Tampilan No Result --}}
                <div class="text-center py-5">
                    <img src="{{ asset('assets/app/images/no-data.png') }}" alt="No Data"
                        style="width:150px; opacity:0.7;">

                    {{-- <h5 class="mt-3 text-muted">Tidak ada pengaduan ditemukan</h5> --}}

                    @if (request()->category)
                        <p class="text-secondary">
                            Oops! <br>Tidak ada pengaduan untuk kategori
                            <strong>{{ request()->category }}</strong>
                        </p>
                    @endif
                </div>
            @endforelse
        </div>

    </div>
@endsection
