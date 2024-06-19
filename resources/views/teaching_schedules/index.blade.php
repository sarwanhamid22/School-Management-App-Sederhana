@extends('layouts.master')

@section('title', 'Teaching Schedules')
@php
    use Carbon\Carbon;
@endphp

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
                            <li class="breadcrumb-item active">Jadwal Mengajar Guru</li>
                        </ol>
                    </div>
                    @role('admin')
                        <div class="col-md-6 d-flex justify-content-end">
                            <a href="{{ route('createTeachingschedules') }}" class="btn btn-primary">Tambah Jadwal Mengajar
                                Guru</a>
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
                                        <th class="text-center">No</th>
                                        <th class="text-center">Guru</th>
                                        <th class="text-center">Nomor Unik Guru</th>
                                        <th class="text-center">Kelas</th>
                                        <th class="text-center">Mata Pelajaran</th>
                                        <th class="text-center">Hari Mengajar</th>
                                        <th class="text-center">Waktu Mulai</th>
                                        <th class="text-center">Waktu Selesai</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($teachingSchedules as $schedule)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td class="text-center">{{ $schedule->teacher->name }}</td>
                                            <td class="text-center">{{ $schedule->teacher->teacher_id }}</td>
                                            <td class="text-center">{{ $schedule->class->name }}</td>
                                            <td class="text-center">{{ $schedule->subject->name_subjects }}</td>
                                            <td class="text-center">{{ $schedule->teaching_day }}</td>
                                            <td class="text-center">
                                                {{ Carbon::parse($schedule->start_time)->format('H:i') }}</td>
                                            <td class="text-center">{{ Carbon::parse($schedule->end_time)->format('H:i') }}
                                            </td>
                                            <td class="text-center">
                                                @hasanyrole('admin|teacher')
                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                        <a href="{{ route('showTeachingschedules', $schedule) }}"
                                                            class="btn btn-info btn-sm mr-2 rounded" title="Lihat"><i
                                                                class="fas fa-eye"></i></a>
                                                        <a href="{{ route('editTeachingschedules', $schedule) }}"
                                                            class="btn btn-warning btn-sm mr-2 rounded" title="Edit"><i
                                                                class="fas fa-edit"></i></a>
                                                    @endhasanyrole
                                                    @role('admin')
                                                        <button type="button" class="btn btn-danger btn-sm rounded"
                                                            onclick="confirmDelete('{{ $schedule->id }}')" title="Hapus"><i
                                                                class="fas fa-trash-alt"></i></button>
                                                    @endrole
                                                </div>
                                                <form id="delete-form-{{ $schedule->id }}"
                                                    action="{{ route('deleteTeachingschedules', ['teaching_schedule' => $schedule->id]) }}"
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

            function confirmDelete(scheduleId) {
                swal({
                    title: 'Konfirmasi Hapus',
                    text: 'Apakah Kamu Yakin Ingin Menghapus Data Ini?',
                    icon: 'warning',
                    buttons: true,
                    dangerMode: true,
                }).then(function(value) {
                    if (value) {
                        $('#delete-form-' + scheduleId).submit();
                    }
                });
            }
        </script>
    @endsection
