@extends('layouts.master')

@section('title', 'Edit Nilai')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2 justify-content-between align-items-center">
                    <div class="col-md-6 d-flex align-items-center">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('listGrades') }}">Nilai</a></li>
                            <li class="breadcrumb-item active">Edit Nilai</li>
                        </ol>
                    </div>
                    <div class="col-md-6 d-flex justify-content-end">
                        <a href="{{ route('listGrades') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('updateGrades', $grade->id) }}" method="POST" class="w-100">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="student_name">Nama Siswa <span class="text-danger">*</span></label>
                            <input type="text" id="student_name" class="form-control" value="{{ $grade->student->name }}"
                                readonly>
                        </div>
                        <div class="form-group">
                            <label for="student_id">Nomor Induk Siswa <span class="text-danger">*</span></label>
                            <input type="hidden" name="student_id" value="{{ $grade->student_id }}">
                            <input type="text" id="nis" name="nis" class="form-control"
                                value="{{ $grade->student->student_id }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="student_class">Kelas <span class="text-danger">*</span></label>
                            <input type="text" id="student_class" name="student_class" class="form-control"
                                value="{{ optional($grade->student->class)->name }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="subject_id">Mata Pelajaran <span class="text-danger">*</span></label>
                            <select name="subject_id" id="subject_id" class="form-control" required>
                                <option value="">Pilih Mata Pelajaran</option>
                                @foreach ($subjects as $subject)
                                    <option value="{{ $subject->id }}"
                                        {{ $grade->subject_id == $subject->id ? 'selected' : '' }}>
                                        {{ $subject->name_subjects }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="grade">Nilai <span class="text-danger">*</span></label>
                            <input type="number" name="grade" id="grade" min="0" max="100"
                                class="form-control" value="{{ $grade->grade }}" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('listGrades') }}" class="btn btn-secondary">Kembali</a>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
