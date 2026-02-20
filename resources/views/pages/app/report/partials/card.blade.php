<div class="d-flex flex-column gap-3">

    @foreach ($reports as $report)
        <div class="card card-report border-0 shadow-none">

            <a href="{{ route('report.show', $report->code) }}" class="text-decoration-none text-dark">

                <div class="card-body p-0">

                    {{-- IMAGE --}}
                    <div class="card-report-image position-relative mb-2">

                        <img src="{{ asset('storage/' . $report->image) }}" alt="Report Image" class="w-100 rounded-3">

                        {{-- STATUS BADGE --}}
                        @if ($report->latest_status)
                            <div class="badge-status {{ $report->latest_status['class'] }}">
                                {{ $report->latest_status['label'] }}
                            </div>
                        @endif

                    </div>

                    {{-- ADDRESS + DATE --}}
                    <div class="d-flex justify-content-between align-items-end mb-2">

                        <div class="d-flex align-items-center">
                            <img src="{{ asset('assets/app/images/icons/MapPin.png') }}" alt="map pin"
                                class="icon me-2">

                            <p class="text-primary city mb-0">
                                {{ \Illuminate\Support\Str::limit($report->address, 20) }}
                            </p>
                        </div>

                        <p class="text-secondary date mb-0">
                            {{ $report->created_at->format('d M Y | H:i') }}
                        </p>

                    </div>

                    {{-- TITLE --}}
                    <h6 class="card-title fw-bold">
                        {{ $report->title }}
                    </h6>

                </div>

            </a>

        </div>
    @endforeach

</div>
