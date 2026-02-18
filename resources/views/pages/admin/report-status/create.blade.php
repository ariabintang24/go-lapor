@extends('layouts.admin')

@section('title', 'Tambah Data Progress Laporan')

@section('content')
    <a href="{{ route('admin.report.show', $report->id) }}" class="btn btn-primary mb-3">Kembali</a>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Data Progress Laporan {{ $report->code }}</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.report-status.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="report_id" value="{{ $report->id }}">

                {{-- Bukti --}}
                <div class="form-group">
                    <label for="image">Bukti Laporan</label>
                    <input type="file" class="form-control @error('image') is-invalid @enderror" id="image"
                        name="image">
                    @error('image')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- Status --}}
                <div class="form-group">
                    <label for="status">Status</label>
                    <select name="status" class="form-control @error('status') is-invalid @enderror">
                        <option value="">-- Pilih Status --</option>
                        <option value="delivered" {{ old('status') == 'delivered' ? 'selected' : '' }}>Delivered</option>
                        <option value="in_process" {{ old('status') == 'in_process' ? 'selected' : '' }}>In Process</option>
                        <option value="completed" {{ old('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                        <option value="rejected" {{ old('status') == 'rejected' ? 'selected' : '' }}>Rejected</option>
                    </select>

                    @error('status')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- Deskripsi --}}
                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                    rows="5">{{ old('description') }}</textarea>
                @error('description')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

@endsection
