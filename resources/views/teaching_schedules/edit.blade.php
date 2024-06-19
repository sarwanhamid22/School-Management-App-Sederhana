@extends('layouts.master')

@section('title', 'Edit Teaching Schedule')

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
                            <li class="breadcrumb-item"><a href="{{ route('listTeachingschedules') }}">Jadwal Mengajar</a>
                            </li>
                            <li class="breadcrumb-item active">Edit Jadwal Mengajar</li>
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
                        <form action="{{ route('updateTeachingschedules', $teachingSchedule->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="teacher_name">Nama Guru <span class="text-danger">*</span></label>
                                <input type="text" name="teacher_name" id="teacher_name" class="form-control"
                                    value="{{ $teachingSchedule->teacher->name }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="class_id">Kelas <span class="text-danger">*</span></label>
                                <select name="class_id" id="class_id" class="form-control">
                                    <option selected disabled>Pilih Kelas</option>
                                    @foreach ($classes as $class)
                                        <option value="{{ $class->id }}"
                                            {{ $teachingSchedule->class_id == $class->id ? 'selected' : '' }}>
                                            {{ $class->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="subject_id">Mata Pelajaran <span class="text-danger">*</span></label>
                                <select name="subject_id" id="subject_id" class="form-control">
                                    <option selected disabled>Mata Pelajaran</option>
                                    @foreach ($subjects as $subject)
                                        <option value="{{ $subject->id }}"
                                            {{ $teachingSchedule->subject_id == $subject->id ? 'selected' : '' }}>
                                            {{ $subject->name_subjects }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="teaching_day">Hari Mengajar <span class="text-danger">*</span></label>
                                <select name="teaching_day" id="teaching_day" class="form-control">
                                    <option value="Monday"
                                        {{ $teachingSchedule->teaching_day == 'Monday' ? 'selected' : '' }}>Monday</option>
                                    <option value="Tuesday"
                                        {{ $teachingSchedule->teaching_day == 'Tuesday' ? 'selected' : '' }}>Tuesday
                                    </option>
                                    <option value="Wednesday"
                                        {{ $teachingSchedule->teaching_day == 'Wednesday' ? 'selected' : '' }}>Wednesday
                                    </option>
                                    <option value="Thursday"
                                        {{ $teachingSchedule->teaching_day == 'Thursday' ? 'selected' : '' }}>Thursday
                                    </option>
                                    <option value="Friday"
                                        {{ $teachingSchedule->teaching_day == 'Friday' ? 'selected' : '' }}>Friday</option>
                                    <option value="Saturday"
                                        {{ $teachingSchedule->teaching_day == 'Saturday' ? 'selected' : '' }}>Saturday
                                    </option>
                                    <option value="Sunday"
                                        {{ $teachingSchedule->teaching_day == 'Sunday' ? 'selected' : '' }}>Sunday</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="start_time">Waktu Mulai <span class="text-danger">*</span></label>
                                <input type="time" name="start_time" id="start_time" class="form-control"
                                    value="{{ old('start_time', date('H:i', strtotime($teachingSchedule->start_time))) }}"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="end_time">Waktu Selesai <span class="text-danger">*</span></label>
                                <input type="time" name="end_time" id="end_time" class="form-control"
                                    value="{{ old('end_time', date('H:i', strtotime($teachingSchedule->end_time))) }}"
                                    required>
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
