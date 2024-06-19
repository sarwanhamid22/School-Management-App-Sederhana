@extends('layouts.master')

@section('title', 'Edit Siswa')

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
                            <li class="breadcrumb-item active">Edit Siswa</li>
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
                            <!-- form start -->
                            <form action="{{ route('updateStudents', $student->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Nama Siswa <span class="text-danger">*</span></label>
                                        <input type="text" name="name" class="form-control" id="name"
                                            value="{{ $student->name }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="student_id">Nomor Induk Siswa <span class="text-danger">*</span></label>
                                        <input type="text" name="student_id" class="form-control" id="student_id"
                                            value="{{ $student->student_id }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="class">Kelas <span class="text-danger">*</span></label>
                                        <select class="form-control" id="class" name="class" required>
                                            <option selected disabled>Pilih Kelas</option>
                                            @foreach ($classes as $class)
                                                <option value="{{ $class->id }}"
                                                    {{ $student->class_id == $class->id ? 'selected' : '' }}>
                                                    {{ $class->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="birth_date">Tanggal Kelahiran <span class="text-danger">*</span></label>
                                        <input type="date" name="birth_date" class="form-control" id="birth_date"
                                            value="{{ $student->birth_date->format('Y-m-d') }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="address">Alamat <span class="text-danger">*</span></label>
                                        <textarea name="address" class="form-control" id="address" required>{{ $student->address }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="phone_number">Nomor Telepon <span class="text-danger">*</span></label>
                                        <input type="text" name="phone_number" class="form-control" id="phone_number"
                                            value="{{ $student->phone_number }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" class="form-control" id="email"
                                            value="{{ $student->email }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password <span class="text-danger">*</span></label>
                                        <input type="password" name="password" class="form-control" id="password">
                                        <small class="form-text text-muted">Kosongkan jika tidak ingin mengubah</small>
                                    </div>
                                    <div class="form-group">
                                        <label for="photo">Foto</label>
                                        <input type="file" name="photo" class="form-control-file" id="photo">
                                        @if ($student->photo)
                                            <img src="{{ asset('storage/' . $student->photo) }}" alt="{{ $student->name }}"
                                                class="img-thumbnail mt-2" width="100">
                                        @endif
                                        <small class="form-text text-muted">Kosongkan jika tidak ingin mengubah</small>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
