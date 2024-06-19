@extends('layouts.master')

@section('title', 'Daftar Mata Pelajaran')

@section('addCss')
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap4.min.css') }}">
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2 justify-content-between align-items-center">
                    <div class="col-md-6 d-flex align-items-center">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Kelola Mata Pelajaran</li>
                        </ol>
                    </div>
                    <div class="col-md-6 d-flex justify-content-end">
                        <a href="{{ route('subjects.create') }}" class="btn btn-primary">Tambah Mata Pelajaran</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        @if ($subjects->isEmpty())
                            <div class="alert alert-warning">
                                Tidak Ada Data Mata Pelajaran Yang Ditemukan.
                            </div>
                        @else
                            <div class="table-responsive">
                                <table class="table table-hover" id="data-table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Mata Pelajaran</th>
                                            <th>Kelas</th>
                                            <th>Guru</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($subjects as $subject)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $subject->name_subjects }}</td>
                                                <td>{{ $subject->class->name }}</td>
                                                <td>{{ $subject->teacher->name }}</td>
                                                <td>
                                                    <div class="btn-group" role="group" aria-label="Aksi">
                                                        <a href="{{ route('subjects.edit', $subject->id) }}"
                                                            class="btn btn-warning btn-sm mr-1 rounded" title="Edit"><i
                                                                class="fas fa-edit"></i></a>
                                                        <form id="delete-form-{{ $subject->id }}"
                                                            action="{{ route('subjects.destroy', $subject->id) }}"
                                                            method="POST" style="display: inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="button" class="btn btn-danger btn-sm rounded"
                                                                title="Hapus"
                                                                onclick="confirmDelete('{{ route('subjects.destroy', $subject->id) }}')"><i
                                                                    class="fas fa-trash-alt"></i></button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('addJavascript')
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/sweetalert.min.js') }}"></script>
    <script>
        $(function() {
            $('#data-table').DataTable({
                responsive: true,
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Cari...",
                    lengthMenu: "_MENU_",
                    info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                    infoEmpty: "Data tidak ditemukan",
                    zeroRecords: "Tidak ada data yang cocok",
                    paginate: {
                        previous: "<i class='fas fa-chevron-left'></i>",
                        next: "<i class='fas fa-chevron-right'></i>"
                    }
                }
            });
        });

        function confirmDelete(url) {
            swal({
                title: 'Konfirmasi Hapus',
                text: 'Apakah Kamu Yakin Ingin Menghapus Data Ini?',
                icon: 'warning',
                buttons: true,
                dangerMode: true,
            }).then(function(value) {
                if (value) {
                    $('#delete-form-' + url.split('/').pop()).submit();
                }
            });
        }
    </script>
@endsection
