@extends('layouts.master')

@section('title', 'Tambah Nilai')

@section('addJavascript')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
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

            var defaultStudentId = document.getElementById('student_name').value;
            var defaultStudent = students.find(student => student.id == defaultStudentId);

            if (defaultStudent) {
                document.getElementById('nis').value = defaultStudent.student_id;
                document.getElementById('student_class').value = defaultStudent.class ? defaultStudent.class.name :
                    'No Class';
            }
        });
    </script>
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
                            <li class="breadcrumb-item"><a href="{{ route('listGrades') }}">Nilai</a></li>
                            <li class="breadcrumb-item active">Tambah Nilai</li>
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
                    <form action="{{ route('storeGrades') }}" method="POST" class="w-100">
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
                            <label for="subject">Mata Pelajaran <span class="text-danger">*</span></label>
                            <select name="subject_id" id="subject" class="form-control" required>
                                <option value="">Pilih Mata Pelajaran</option>
                                @foreach ($subjects as $subject)
                                    <option value="{{ $subject->id }}">{{ $subject->name_subjects }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="grade">Nilai <span class="text-danger">*</span></label>
                            <input type="number" step="0.01" name="grade" id="grade" class="form-control"
                                required>
                        </div>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
