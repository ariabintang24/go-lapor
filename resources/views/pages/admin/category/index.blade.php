@extends('layouts.admin')

@section('title', 'Data Kategori laporan')

@section('content')
    <a href="{{ route('admin.report-category.create') }}" class="btn btn-primary mb-3">Tambah Data</a>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Kategori</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Icon</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- $categorys dari public function index di categoryController.php --}}
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $category->name }}</td>
                                <td>
                                    <img src="{{ asset('storage/' . $category->image) }}" width="100"
                                        alt="{{ $category->name }}">
                                </td>
                                <td>
                                    <a href="{{ route('admin.report-category.edit', $category->id) }}"
                                        class="btn btn-warning">Edit</a>

                                    <a href="{{ route('admin.report-category.show', $category->id) }}"
                                        class="btn btn-info">Show</a>

                                    <form action="{{ route('admin.report-category.destroy', $category->id) }}"
                                        method="POST" class="d-inline delete-form">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-danger btn-delete">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>


@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const deleteForms = document.querySelectorAll('.delete-form');

            deleteForms.forEach(form => {

                form.addEventListener('submit', function(e) {

                    e.preventDefault(); // ❗ hentikan submit langsung

                    Swal.fire({
                        title: 'Apakah Anda yakin?',
                        text: "Data tidak bisa dikembalikan!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Ya, hapus',
                        cancelButtonText: 'Batal'
                    }).then((result) => {

                        if (result.isConfirmed) {
                            form.submit(); // submit manual
                        }

                    });

                });

            });

        });
    </script>
@endpush
