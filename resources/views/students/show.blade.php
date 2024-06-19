@extends('layouts.master')

@section('title', 'Detail Siswa')

@section('addCss')
    <style>
        .content-area {
            max-width: 800px;
            /* Set the maximum width of the content area */
            margin: auto;
            /* Center the content area */
            padding: 0;
            /* Remove padding if any */
        }

        .centered-photo {
            display: flex;
            justify-content: center;
            /* Center the photo horizontally */
            margin-top: 20px;
            margin-bottom: 20px;
        }

        .detail-table {
            width: 100%;
            /* Ensure the table uses the full width */
            margin: 0;
            /* Remove default margin */
        }

        .detail-table th,
        .detail-table td {
            text-align: left;
            /* Left-align text in cells */
            padding: 8px;
            /* Maintain padding for aesthetics */
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
                            <li class="breadcrumb-item"><a href="{{ route('listStudents') }}">Siswa</a></li>
                            <li class="breadcrumb-item active">Detail Siswa</li>
                        </ol>
                    </div>
                    <div class="col-md-6 d-flex justify-content-end">
                        <a href="{{ route('listStudents') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <div class="photo-container">
                        @if ($student->photo)
                            <img src="{{ asset('storage/' . $student->photo) }}" alt="Foto Siswa" class="img-fluid">
                        @else
                            <div>No Photo</div>
                        @endif
                    </div>

                    <div class="content-area">
                        <table class="table table-striped detail-table">
                            <tbody>
                                <tr>
                                    <th>Nama Siswa</th>
                                    <td>{{ $student->name }}</td>
                                </tr>
                                <tr>
                                    <th>Nomor Induk Siswa</th>
                                    <td>{{ $student->student_id }}</td>
                                </tr>
                                <tr>
                                    <th>Kelas</th>
                                    <td>{{ $student->class->name ?? 'No Class' }}</td>
                                </tr>
                                <tr>
                                    <th>Tanggal Lahir</th>
                                    <td>{{ \Carbon\Carbon::parse($student->birth_date)->format('d-m-Y') }}</td>
                                </tr>
                                <tr>
                                    <th>Alamat</th>
                                    <td>{{ $student->address }}</td>
                                </tr>
                                <tr>
                                    <th>Nomor Telepon</th>
                                    <td>{{ $student->phone_number }}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>{{ $student->email }}</td>
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
