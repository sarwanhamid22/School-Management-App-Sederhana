@extends('layouts.master')

@section('title', 'Edit Teacher')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2 justify-content-between align-items-center">
                    <div class="col-md-6 d-flex align-items-center">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('listTeachers') }}">Guru</a></li>
                            <li class="breadcrumb-item active">Edit Guru</li>
                        </ol>
                    </div>
                    <div class="col-md-6 d-flex justify-content-end">
                        <a href="{{ route('listTeachers') }}" class="btn btn-secondary">Kembali</a>
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
                        <form action="{{ route('updateTeachers', $teacher->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="name">Nama Guru <span class="text-danger">*</span></label>
                                    <input type="text" name="name" id="name" class="form-control"
                                        value="{{ $teacher->name }}" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="teacher_id">Nomor Unik Guru <span class="text-danger">*</span></label>
                                    <input type="text" name="teacher_id" id="teacher_id" class="form-control"
                                        value="{{ $teacher->teacher_id }}" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="specialization">Spesialisasi <span class="text-danger">*</span></label>
                                    <input type="text" name="specialization" id="specialization" class="form-control"
                                        value="{{ $teacher->specialization }}" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="phone_number">Nomor Telepon <span class="text-danger">*</span></label>
                                    <input type="text" name="phone_number" id="phone_number" class="form-control"
                                        value="{{ $teacher->phone_number }}" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="address">Alamat <span class="text-danger">*</span></label>
                                    <input type="text" name="address" id="address" class="form-control"
                                        value="{{ $teacher->address }}" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="email">Email <span class="text-danger">*</span></label>
                                    <input type="email" name="email" id="email" class="form-control"
                                        value="{{ $teacher->email }}" required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="password">Password (kosongkan jika tidak ingin mengubah)</label>
                                    <input type="password" name="password" id="password" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="photo">Foto (kosongkan jika tidak ingin mengubah)</label>
                                <input type="file" name="photo" class="form-control-file" id="photo">
                                @if ($teacher->photo)
                                    <img src="{{ asset('storage/photos/' . $teacher->photo) }}" alt="Current Photo"
                                        width="100" class="mt-2">
                                @endif
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
