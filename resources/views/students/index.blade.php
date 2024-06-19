@extends('layouts.master')

@section('title', 'Students List')

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
                            <li class="breadcrumb-item active">Profil Siswa</li>
                        </ol>
                    </div>
                    @role('admin')
                        <div class="col-md-6 d-flex justify-content-end">
                            <a href="{{ route('createStudents') }}" class="btn btn-primary">Tambah Siswa</a>
                        </div>
                    @endrole
                </div>
            </div>
        </div>

        <div class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        @if ($students->isEmpty())
                            <div class="alert alert-warning">
                                Tidak Ada Data Siswa Yang Ditemukan.
                            </div>
                        @else
                            <div class="table-responsive">
                                <table class="table table-hover" id="data-table">
                                    <thead>
                                        <tr>
                                            <th class="text-pretty col-name">No</th>
                                            <th class="text-pretty col-photo">Foto</th>
                                            <th class="text-pretty col-name ">Nama Siswa</th>
                                            <th class="text-pretty col-student-id">Nomor Induk Siswa</th>
                                            <th class="text-pretty col-class">Kelas</th>
                                            <th class="text-pretty col-birth-date">Tanggal Kelahiran</th>
                                            <th class="text-pretty col-address">Alamat</th>
                                            <th class="text-pretty col-phone-number">Nomor Telepon</th>
                                            <th class="text-pretty col-email">Email</th>
                                            <th class="text-pretty col-actions">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($students as $student)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td class="col-photo">
                                                    <div class="photo-container">
                                                        @if ($student->photo)
                                                            <img src="{{ asset('storage/' . $student->photo) }}"
                                                                alt="Foto {{ $student->name }}" width="100">
                                                        @else
                                                            <img src="{{ asset('img/default-avatar.png') }}"
                                                                alt="Default Avatar" width="100">
                                                        @endif
                                                    </div>
                                                </td>
                                                <td class="col-name">{{ $student->name }}</td>
                                                <td class="col-student-id">{{ $student->student_id }}</td>
                                                <td class="col-class">{{ $student->class->name ?? 'No Class' }}</td>
                                                <td class="col-birth-date">{{ $student->birth_date->format('d-m-Y') }}</td>
                                                <td class="col-address">{{ $student->address }}</td>
                                                <td class="col-phone-number">{{ $student->phone_number }}</td>
                                                <td class="col-email">{{ $student->email }}</td>
                                                <td class="col-actions">
                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                        <a href="{{ route('showStudents', $student->id) }}"
                                                            class="btn btn-info btn-sm mr-2 rounded" title="View"><i
                                                                class="fas fa-eye"></i></a>
                                                        @role('admin')
                                                            <a href="{{ route('editStudents', $student->id) }}"
                                                                class="btn btn-warning btn-sm mr-2 rounded" title="Edit"><i
                                                                    class="fas fa-edit"></i></a>
                                                            <button type="button" class="btn btn-danger btn-sm rounded"
                                                                onclick="confirmDelete('{{ $student->id }}')"
                                                                title="Hapus"><i class="fas fa-trash-alt"></i></button>
                                                        @endrole
                                                    </div>
                                                    <form id="delete-form-{{ $student->id }}"
                                                        action="{{ route('deleteStudents', ['student' => $student->id]) }}"
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
                        @endif
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
