@extends('layouts.master')

@section('title', 'Create Teaching Schedule')

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
                            <li class="breadcrumb-item"><a href="{{ route('listTeachingschedules') }}">Jadwal Guru</a></li>
                            <li class="breadcrumb-item active">Tambah Jadwal Guru</li>
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
                        <form action="{{ route('storeTeachingschedules') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="teacher_id">Nama Guru <span class="text-danger">*</span></label>
                                <select name="teacher_id" id="teacher_id" class="form-control">
                                    <option selected disabled>Pilih Nama Guru</option>
                                    @foreach ($teachers as $teacher)
                                        <option value="{{ $teacher->id }}" data-classid="{{ $teacher->class_id }}"
                                            data-subjectid="{{ $teacher->subject_id }}">{{ $teacher->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="subject_id">Mata Pelajaran <span class="text-danger">*</span></label>
                                <select name="subject_id" id="subject_id" class="form-control">
                                    <option selected disabled>Mata Pelajaran</option>
                                    @foreach ($subjects as $subject)
                                        <option value="{{ $subject->id }}">{{ $subject->name_subjects }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="class_id">Kelas <span class="text-danger">*</span></label>
                                <select name="class_id" id="class_id" class="form-control">
                                    <option selected disabled>Pilih Kelas</option>
                                    @foreach ($classes as $class)
                                        <option value="{{ $class->id }}">{{ $class->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="teaching_day">Hari Mengajar <span class="text-danger">*</span></label>
                                <select name="teaching_day" id="teaching_day" class="form-control">
                                    <option selected disabled>Pilih Hari Mengajar</option>
                                    <option value="Monday">Monday</option>
                                    <option value="Tuesday">Tuesday</option>
                                    <option value="Wednesday">Wednesday</option>
                                    <option value="Thursday">Thursday</option>
                                    <option value="Friday">Friday</option>
                                    <option value="Saturday">Saturday</option>
                                    <option value="Sunday">Sunday</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="start_time">Waktu Mulai <span class="text-danger">*</span></label>
                                <input type="time" name="start_time" id="start_time" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="end_time">Waktu Selesai <span class="text-danger">*</span></label>
                                <input type="time" name="end_time" id="end_time" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
