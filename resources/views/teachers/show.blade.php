@extends('layouts.master')

@section('title', 'Teacher Details')

@section('addCss')
    <style>
        .content-area {
            max-width: 800px;
            /* Set the maximum width of the content area */
            margin: auto;
            /* Center the content area */
        }

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

        .detail-table {
            width: 100%;
            /* Ensure the table uses the full width */
            margin: 0;
            /* Remove default margin */
            table-layout: fixed;
            /* Helps to manage text overflow in cells */
        }

        .detail-table th,
        .detail-table td {
            text-align: left;
            /* Left-align text in cells */
            padding: 8px;
            /* Maintain padding for aesthetics */
        }
    </style>
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2 justify-content-between align-items-center">
                    <div class="col-md-6 d-flex align-items-center">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('listTeachers') }}">Guru</a></li>
                            <li class="breadcrumb-item active">Detail Guru</li>
                        </ol>
                    </div>
                    <div class="col-md-6 d-flex justify-content-end">
                        <a href="{{ route('listTeachers') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <div class="photo-container">
                            @if ($teacher->photo)
                                <img src="{{ asset('storage/' . $teacher->photo) }}" alt="Foto Guru" class="img-fluid">
                            @endif
                        </div>
                        <div class="content-area">
                            <table class="table detail-table table-striped">
                                <tbody>
                                    <tr>
                                        <th>Nama Guru</th>
                                        <td>{{ $teacher->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Nomor Unik Guru</th>
                                        <td>{{ $teacher->teacher_id }}</td>
                                    </tr>
                                    <tr>
                                        <th>Spesialisasi</th>
                                        <td>{{ $teacher->specialization }}</td>
                                    </tr>
                                    <tr>
                                        <th>Nomor Telefon</th>
                                        <td>{{ $teacher->phone_number }}</td>
                                    </tr>
                                    <tr>
                                        <th>Alamat</th>
                                        <td>{{ $teacher->address }}</td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td>{{ $teacher->email }}</td>
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
