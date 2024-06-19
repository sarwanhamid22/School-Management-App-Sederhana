@extends('layouts.master')

@section('title', 'Edit Kehadiran')

@section('addJavascript')
    <script src="{{ asset('js/sweetalert.min.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var students = @json($students);
            var selectedStudentId = '{{ $attendance->student_id }}';

            var selectedStudent = students.find(student => student.id == selectedStudentId);
            if (selectedStudent) {
                document.getElementById('nis').value = selectedStudent.student_id;
                document.getElementById('student_class').value = selectedStudent.class ? selectedStudent.class
                    .name : 'No Class';
            }
        });

        function confirmDelete(button) {
            var url = $(button).data('url');
            swal({
                title: 'Konfirmasi Hapus',
                text: 'Apakah Kamu Yakin Ingin Menghapus Data Ini?',
                icon: 'warning',
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    window.location.href = url;
                }
            });
        }
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
                            <li class="breadcrumb-item"><a href="{{ route('listAttendances') }}">Kehadiran</a></li>
                            <li class="breadcrumb-item active">Edit Kehadiran</li>
                        </ol>
                    </div>
                    <div class="col-md-6 d-flex justify-content-end">
                        <a href="{{ route('listAttendances') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main content -->
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('updateAttendances', $attendance->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="student_name">Nama Siswa <span class="text-danger">*</span></label>
                            <input type="text" id="student_name" class="form-control"
                                value="{{ $attendance->student->name }}" readonly>
                            <input type="hidden" name="student_id" value="{{ $attendance->student_id }}">
                        </div>
                        <div class="form-group">
                            <label for="nis">Nomor Induk Siswa <span class="text-danger">*</span></label>
                            <input type="text" id="nis" class="form-control" value="{{ $attendance->student_id }}"
                                readonly>
                        </div>
                        <div class="form-group">
                            <label for="student_class">Kelas <span class="text-danger">*</span></label>
                            <input type="text" id="student_class" class="form-control"
                                value="{{ $attendance->student->class->name }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="date">Tanggal <span class="text-danger">*</span></label>
                            @php
                                $attendanceDate =
                                    $attendance->date instanceof \DateTime
                                        ? $attendance->date
                                        : new \DateTime($attendance->date);
                            @endphp
                            <input type="date" name="date" id="date"
                                value="{{ $attendanceDate->format('Y-m-d') }}" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="status">Status <span class="text-danger">*</span></label>
                            <select name="status" id="status" class="form-control">
                                <option value="Present" {{ $attendance->status == 'Present' ? 'selected' : '' }}>Present
                                </option>
                                <option value="Absent" {{ $attendance->status == 'Absent' ? 'selected' : '' }}>Absent
                                </option>
                                <option value="Late" {{ $attendance->status == 'Late' ? 'selected' : '' }}>Late</option>
                                <option value="Excused" {{ $attendance->status == 'Excused' ? 'selected' : '' }}>Excused
                                </option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
