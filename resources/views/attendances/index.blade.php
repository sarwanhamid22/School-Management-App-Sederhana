@extends('layouts.master')

@section('title', 'Attendances')

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
                            <li class="breadcrumb-item active">Kehadiran</li>
                        </ol>
                    </div>
                    @role('admin')
                        <div class="col-md-6 d-flex justify-content-end">
                            <a href="{{ route('createAttendances') }}" class="btn btn-primary">Tambah Kehadiran</a>
                        </div>
                    @endrole
                </div>
            </div>
        </div>

        <div class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover" id="data-table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Siswa</th>
                                        <th>Nomor Induk Siswa</th>
                                        <th>Kelas</th>
                                        <th>Tanggal</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($attendances as $attendance)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $attendance->student->name }}</td>
                                            <td>{{ $attendance->student->student_id }}</td>
                                            <td>{{ optional($attendance->student->class)->name ?? 'No Class' }}</td>
                                            <td>{{ \Carbon\Carbon::parse($attendance->date)->format('d-m-Y') }}</td>
                                            <td>{{ $attendance->status }}</td>
                                            <td>
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <a href="{{ route('showAttendances', $attendance) }}"
                                                        class="btn btn-info btn-sm mr-2 rounded" title="Lihat"><i
                                                            class="fas fa-eye"></i></a>
                                                    <a href="{{ route('editAttendances', $attendance) }}"
                                                        class="btn btn-warning btn-sm mr-2 rounded" title="Edit"><i
                                                            class="fas fa-edit"></i></a>
                                                    @role('admin')
                                                        <button type="button" class="btn btn-danger btn-sm rounded"
                                                            onclick="confirmDelete('{{ route('deleteAttendances', ['attendance' => $attendance->id]) }}')"
                                                            title="Hapus"><i class="fas fa-trash-alt"></i></button>
                                                    @endrole
                                                </div>
                                                <form id="delete-form-{{ $attendance->id }}"
                                                    action="{{ route('deleteAttendances', ['attendance' => $attendance->id]) }}"
                                                    method="POST" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
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
                    $('#delete-form-' + url.split('/')[url.split('/').length - 1]).submit();
                }
            });
        }
    </script>
@endsection
