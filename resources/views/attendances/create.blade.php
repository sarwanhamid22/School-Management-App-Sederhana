@extends('layouts.master')

@section('title', 'Tambah Kehadiran')

@section('addJavascript')
    <script src="{{ asset('js/sweetalert.min.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var today = new Date().toISOString().split('T')[0];
            document.getElementById('date').value = today;

            var students = @json($students);

            document.getElementById('student_name').addEventListener('change', function() {
                var selectedStudentId = this.value;
                var selectedStudent = students.find(student => student.id == selectedStudentId);

                if (selectedStudent) {
                    document.getElementById('nis').value = selectedStudent.student_id;
                    document.getElementById('student_class').value = selectedStudent.class ? selectedStudent
                        .class.name : 'No Class';
                }
            });
        });
    </script>
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2 justify-content-between align-items-center">
                    <div class="col-md-6 d-flex align-items-center">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('listAttendances') }}">Kehadiran</a></li>
                            <li class="breadcrumb-item active">Tambah Kehadiran</li>
                        </ol>
                    </div>
                    <div class="col-md-6 d-flex justify-content-end">
                        <a href="{{ route('listAttendances') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('storeAttendances') }}" method="POST" class="w-100">
                        @csrf
                        <div class="form-group">
                            <label for="student_name">Nama Siswa <span class="text-danger">*</span></label>
                            <select name="student_id" id="student_name" class="form-control" required>
                                <option selected disabled>Pilih Nama Siswa</option>
                                @foreach ($students as $student)
                                    <option value="{{ $student->id }}">{{ $student->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nis">Nomor Induk Siswa <span class="text-danger">*</span></label>
                            <input type="text" id="nis" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="student_class">Kelas <span class="text-danger">*</span></label>
                            <input type="text" id="student_class" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <label for="date">Tanggal <span class="text-danger">*</span></label>
                            <input type="date" name="date" id="date" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="status">Status <span class="text-danger">*</span></label>
                            <select name="status" id="status" class="form-control" required>
                                <option value="Present">Present</option>
                                <option value="Absent">Absent</option>
                                <option value="Late">Late</option>
                                <option value="Excused">Excused</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
