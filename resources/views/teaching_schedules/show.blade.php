@extends('layouts.master')

@section('title', 'Lihat Jadwal Mengajar')

@php
    use Carbon\Carbon;
@endphp

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2 justify-content-between align-items-center">
                    <div class="col-md-6 d-flex align-items-center">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('listTeachingschedules') }}">Jadwal Mengajar
                                    Guru</a></li>
                            <li class="breadcrumb-item active">Detail Jadwal Mengajar</li>
                        </ol>
                    </div>
                    <div class="col-md-6 d-flex justify-content-end">
                        <a href="{{ route('listTeachingschedules') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                    <th>Nama Guru</th>
                                    <td>{{ $teachingSchedule->teacher->name }}</td>
                                </tr>
                                <tr>
                                    <th>Nomor Unik Guru</th>
                                    <td>{{ $teachingSchedule->teacher->teacher_id }}</td>
                                </tr>
                                <tr>
                                    <th>Mata Pelajaran</th>
                                    <td>{{ $teachingSchedule->subject->name_subjects }}</td>
                                </tr>
                                <tr>
                                    <th>Hari Mengajar</th>
                                    <td>{{ $teachingSchedule->teaching_day }}</td>
                                </tr>
                                <tr>
                                    <th>Waktu Mulai</th>
                                    <td>{{ Carbon::parse($teachingSchedule->start_time)->format('H:i') }}</td>
                                </tr>
                                <tr>
                                    <th>Waktu Selesai</th>
                                    <td>{{ Carbon::parse($teachingSchedule->end_time)->format('H:i') }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
