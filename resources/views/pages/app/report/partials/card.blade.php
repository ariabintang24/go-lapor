<div class="row g-4">

    @foreach ($reports as $report)
        <div class="col-12 col-md-6 col-xl-4">

            <a href="{{ route('report.show', $report->code) }}" class="text-decoration-none text-dark">

                <div class="modern-report-card h-100">

                    {{-- IMAGE --}}
                    <div class="modern-report-image-wrapper">

                        <img src="{{ asset('storage/' . $report->image) }}" class="modern-report-image" alt="Report Image">

                        {{-- STATUS BADGE --}}
                        @if ($report->latest_status)
                            <span class="modern-report-badge {{ $report->latest_status['class'] }}">
                                {{ $report->latest_status['label'] }}
                            </span>
                        @endif

                    </div>

                    {{-- CONTENT --}}
                    <div class="modern-report-body">

                        <div class="modern-report-meta">

                            <div class="d-flex align-items-center gap-2">
                                <img src="{{ asset('assets/app/images/icons/MapPin.png') }}" style="width:14px;">
                                <span class="text-success small">
                                    {{ \Illuminate\Support\Str::limit($report->address, 25) }}
                                </span>
                            </div>

                            <span class="text-muted small">
                                {{ $report->created_at->format('d M Y') }}
                            </span>

                        </div>

                        <h6 class="modern-report-title">
                            {{ $report->title }}
                        </h6>

                    </div>

                </div>

            </a>

        </div>
    @endforeach

</div>
