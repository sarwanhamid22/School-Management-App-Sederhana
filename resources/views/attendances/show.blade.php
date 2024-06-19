@extends('layouts.master')

@section('title', 'Detail Kehadiran')

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
                            <li class="breadcrumb-item"><a href="{{ route('listAttendances') }}">Kehadiran</a></li>
                            <li class="breadcrumb-item active">Detail Kehadiran</li>
                        </ol>
                    </div>
                    <div class="col-md-6 d-flex justify-content-end">
                        <a href="{{ route('listAttendances') }}" class="btn btn-secondary">Kembali</a>
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
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tbody>
                                    <tr>
                                        <th>Nama Siswa</th>
                                        <td>{{ $attendance->student->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Nomor Induk Siswa</th>
                                        <td>{{ $attendance->student->student_id }}</td>
                                    </tr>
                                    <tr>
                                        <th>Kelas</th>
                                        <td>{{ $attendance->student->class->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Tanggal</th>
                                        <td>{{ Carbon::parse($attendance->date)->format('d-m-Y') }}</td>
                                    </tr>
                                    <tr>
                                        <th>Status</th>
                                        <td>{{ $attendance->status }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
