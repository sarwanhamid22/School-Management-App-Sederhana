@extends('layouts.master')

@section('title', 'Tambah Siswa')

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
                            <li class="breadcrumb-item active">Tambah Siswa</li>
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
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <!-- Tampilkan pesan kesalahan -->
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <form action="{{ route('storeStudents') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">Nama Siswa <span class="text-danger">*</span></label>
                                        <input type="text" name="name" class="form-control" id="name" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="student_id">Nomor Induk Siswa <span class="text-danger">*</span></label>
                                        <input type="text" name="student_id" class="form-control" id="student_id"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <label for="class">Kelas <span class="text-danger">*</span></label>
                                        <select class="form-control" id="class" name="class" required>
                                            <option selected disabled>Pilih Kelas</option>
                                            @foreach ($classes as $class)
                                                <option value="{{ $class->id }}">{{ $class->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="birth_date">Tanggal Kelahiran <span class="text-danger">*</span></label>
                                        <input type="date" name="birth_date" class="form-control" id="birth_date"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <label for="address">Alamat <span class="text-danger">*</span></label>
                                        <textarea name="address" class="form-control" id="address" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="phone_number">Nomor Telepon <span class="text-danger">*</span></label>
                                        <input type="text" name="phone_number" class="form-control" id="phone_number"
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" class="form-control" id="email">
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" name="password" class="form-control" id="password">
                                    </div>
                                    <div class="form-group">
                                        <label for="photo">Foto</label>
                                        <input type="file" name="photo" class="form-control-file" id="photo">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Tambah</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
