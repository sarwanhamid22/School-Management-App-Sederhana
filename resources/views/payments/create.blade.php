@extends('layouts.master')

@section('title', 'Tambah Pembayaran')

@section('addJavascript')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var students = @json($students);

            document.getElementById('student_id').addEventListener('change', function() {
                var selectedStudentId = this.value;
                var selectedStudent = students.find(student => student.id == selectedStudentId);

                if (selectedStudent) {
                    document.getElementById('student_name').value = selectedStudent.student_id; // Ganti dengan student_id
                    document.getElementById('class_id').value = selectedStudent.class ? selectedStudent.class.id : ''; // Set class_id
                }
            });

            // Initial load to set default student
            var defaultStudentId = document.getElementById('student_id').value;
            var defaultStudent = students.find(student => student.id == defaultStudentId);

            if (defaultStudent) {
                document.getElementById('student_name').value = defaultStudent.student_id; // Ganti dengan student_id
                document.getElementById('class_id').value = defaultStudent.class ? defaultStudent.class.id : ''; // Set class_id
            }
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
                            <li class="breadcrumb-item"><a href="{{ route('listPayments') }}">Pembayaran</a></li>
                            <li class="breadcrumb-item active">Tambah Pembayaran</li>
                        </ol>
                    </div>
                    <div class="col-md-6 d-flex justify-content-end">
                        <a href="{{ route('listPayments') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('storePayments') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="student_id">Nama Siswa <span class="text-danger">*</span></label>
                                        <select class="form-control" id="student_id" name="student_id" required>
                                            <option selected disabled>Pilih Nama Siswa</option>
                                            @foreach ($students as $student)
                                                <option value="{{ $student->id }}">{{ $student->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="student_name">Nomor Induk Siswa <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="student_name" name="student_name" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="class_id">Kelas <span class="text-danger">*</span></label>
                                        <select class="form-control" id="class_id" name="class_id" required>
                                            <option selected disabled>Pilih Kelas</option>
                                            @foreach ($classes as $class)
                                                <option value="{{ $class->id }}">{{ $class->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="academic_year">Tahun Ajaran <span class="text-danger">*</span></label>
                                        <select class="form-control" id="academic_year" name="academic_year" required>
                                            <option selected disabled>Pilih Tahun Ajaran</option>
                                            <option value="2022-2023">2022-2023</option>
                                            <option value="2023-2024">2023-2024</option>
                                            <option value="2024-2025">2024-2025</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Jenis Pembayaran <span class="text-danger">*</span></label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="payment_type[]" value="SPP" id="SPP" required>
                                            <label class="form-check-label" for="SPP">SPP</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="payment_type[]" value="Gedung" id="Gedung">
                                            <label class="form-check-label" for="Gedung">Gedung</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="payment_type[]" value="Buku" id="Buku">
                                            <label class="form-check-label" for="Buku">Buku</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="payment_type[]" value="Seragam" id="Seragam">
                                            <label class="form-check-label" for="Seragam">Seragam</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="amount">Jumlah Pembayaran <span class="text-danger">*</span></label>
                                        <input type="number" class="form-control" id="amount" name="amount" placeholder="Masukkan Jumlah Pembayaran" required min="0" step="1000">
                                    </div>
                                    <div class="form-group">
                                        <label for="payment_date">Tanggal Pembayaran <span class="text-danger">*</span></label>
                                        <input type="date" class="form-control" id="payment_date" name="payment_date" value="{{ date('Y-m-d') }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="status">Status Pembayaran <span class="text-danger">*</span></label>
                                        <select class="form-control" id="status" name="status" required>
                                            <option value="1">Lunas</option>
                                            <option value="0">Belum Lunas</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Deskripsi</label>
                                        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
