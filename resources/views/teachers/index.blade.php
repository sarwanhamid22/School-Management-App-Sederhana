@extends('layouts.master')

@section('title', 'Teachers')

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
                            <li class="breadcrumb-item active">{{ $title }}</li>
                        </ol>
                    </div>
                    @role('admin')
                        <div class="col-md-6 d-flex justify-content-end">
                            <a href="{{ route('createTeachers') }}" class="btn btn-primary">Tambah Guru</a>
                        </div>
                    @endrole
                </div>
            </div>
        </div>
        <div class="content">
            <div class="container-fluid">
                <!-- Import Modal -->
                <div class="modal fade" id="importModal" tabindex="-1" role="dialog" aria-labelledby="importModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="importModalLabel">Import Guru Excel File</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{ route('importTeachers') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="excel_file">Pilih Excel File</label>
                                        <input type="file" name="excel_file" id="excel_file" accept=".xlsx, .xls"
                                            class="form-control" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-primary">Import</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover" id="data-table">
                                <thead>
                                    <tr>
                                        <th class="text-pretty">No</th>
                                        <th class="text-pretty col-photo">Foto</th>
                                        <th class="text-pretty col-name">Nama Guru</th>
                                        <th class="text-pretty col-teacher-id">Nomor Unik Guru</th>
                                        <th class="text-pretty col-specialization">Spesialisasi</th>
                                        <th class="text-pretty col-phone-number">Nomor Telepon</th>
                                        <th class="text-pretty col-address">Alamat</th>
                                        <th class="text-pretty">Email</th>
                                        <th class="text-pretty col-actions">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($teachers as $teacher)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td class="col-photo">
                                                <div class="photo-container">
                                                    @if ($teacher->photo)
                                                        <img src="{{ asset('storage/' . $teacher->photo) }}"
                                                            alt="Foto {{ $teacher->name }}" width="100">
                                                    @else
                                                        <img src="{{ asset('img/default-avatar.png') }}"
                                                            alt="Default Avatar" width="100">
                                                    @endif
                                                </div>
                                            </td>
                                            <td class="col-name">{{ $teacher->name }}</td>
                                            <td class="col-teacher-id">{{ $teacher->teacher_id }}</td>
                                            <td class="col-specialization">{{ $teacher->specialization }}</td>
                                            <td class="col-phone-number">{{ $teacher->phone_number }}</td>
                                            <td class="col-address">{{ $teacher->address }}</td>
                                            <td>{{ $teacher->email }}</td>
                                            <td class="col-actions">
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <a href="{{ route('showTeachers', $teacher) }}"
                                                        class="btn btn-info btn-sm mr-2 rounded" title="Lihat"><i
                                                            class="fas fa-eye"></i></a>
                                                    @role('admin')
                                                        <a href="{{ route('editTeachers', $teacher) }}"
                                                            class="btn btn-warning btn-sm mr-2 rounded" title="Edit"><i
                                                                class="fas fa-edit"></i></a>
                                                        <button type="button" class="btn btn-danger btn-sm rounded"
                                                            onclick="confirmDelete('{{ $teacher->id }}')" title="Hapus"><i
                                                                class="fas fa-trash-alt"></i></button>
                                                    @endrole
                                                </div>
                                                <form id="delete-form-{{ $teacher->id }}"
                                                    action="{{ route('deleteTeachers', ['teacher' => $teacher->id]) }}"
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

                    function confirmDelete(teacherId) {
                        swal({
                            title: 'Konfirmasi Hapus',
                            text: 'Apakah Kamu Yakin Ingin Menghapus Data Ini?',
                            icon: 'warning',
                            buttons: true,
                            dangerMode: true,
                        }).then(function(value) {
                            if (value) {
                                $('#delete-form-' + teacherId).submit();
                            }
                        });
                    }
                </script>
                <style>
                    .photo-container {
                        text-align: center;
                        /* Center the photo container within the content area */
                        margin-bottom: 20px;
                        /* Space between photo and table */
                    }

                    .photo-container img {
                        width: 100px;
                        /* Fixed width for the photo */
                        height: 100px;
                        /* Fixed height for the photo */
                        border-radius: 50%;
                        /* Circle shape */
                    }
                </style>
            @endsection
