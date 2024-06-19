@extends('layouts.master')

@section('title', 'Edit Pembayaran')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2 justify-content-between align-items-center">
                    <div class="col-md-6">
                        <!-- Adjusted breadcrumb placement for consistency -->
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('listPayments') }}">Pembayaran</a></li>
                            <li class="breadcrumb-item active">Edit Pembayaran</li>
                        </ol>
                    </div><!-- /.col -->
                    <div class="col-md-6 d-flex justify-content-end">
                        <a href="{{ route('listPayments') }}" class="btn btn-secondary">Kembali</a>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('updatePayments', $payment->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="student_name">Nama Siswa <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="student_name" name="student_name"
                                            value="{{ $payment->student->name }}" readonly>
                                        <input type="hidden" name="student_id" value="{{ $payment->student_id }}">
                                    </div>

                                    <div class="form-group d-none">
                                        <label for="student_id">Nomor Induk Siswa <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="student_id" name="student_id"
                                            value="{{ $payment->student_id }}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="class">Kelas <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="class" name="class"
                                            value="{{ $payment->student->class ? $payment->student->class->name : 'No Class' }}"
                                            readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="academic_year">Tahun Ajaran <span class="text-danger">*</span></label>
                                        <select class="form-control" id="academic_year" name="academic_year" required>
                                            <option selected disabled>Pilih Tahun Ajaran</option>
                                            <option value="2022-2023"
                                                {{ $payment->academic_year == '2022-2023' ? 'selected' : '' }}>2022-2023
                                            </option>
                                            <option value="2023-2024"
                                                {{ $payment->academic_year == '2023-2024' ? 'selected' : '' }}>2023-2024
                                            </option>
                                            <option value="2024-2025"
                                                {{ $payment->academic_year == '2024-2025' ? 'selected' : '' }}>2024-2025
                                            </option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Jenis Pembayaran <span class="text-danger">*</span></label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="payment_type[]"
                                                value="SPP" id="SPP"
                                                {{ in_array('SPP', $payment->payment_type) ? 'checked' : '' }} required>
                                            <label class="form-check-label" for="SPP">SPP</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="payment_type[]"
                                                value="Gedung" id="Gedung"
                                                {{ in_array('Gedung', $payment->payment_type) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="Gedung">Gedung</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="payment_type[]"
                                                value="Buku" id="Buku"
                                                {{ in_array('Buku', $payment->payment_type) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="Buku">Buku</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="payment_type[]"
                                                value="Seragam" id="Seragam"
                                                {{ in_array('Seragam', $payment->payment_type) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="Seragam">Seragam</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="amount">Jumlah Pembayaran <span class="text-danger">*</span></label>
                                        <input type="number" class="form-control" id="amount" name="amount"
                                            placeholder="Masukkan Jumlah Pembayaran" value="{{ $payment->amount }}"
                                            required min="0" step="1000">
                                    </div>
                                    <div class="form-group">
                                        <label for="payment_date">Tanggal Pembayaran <span
                                                class="text-danger">*</span></label>
                                        <input type="date" class="form-control" id="payment_date" name="payment_date"
                                            value="{{ $payment->payment_date->format('Y-m-d') }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="status">Status Pembayaran <span class="text-danger">*</span></label>
                                        <select class="form-control" id="status" name="status" required>
                                            <option value="1" {{ $payment->status == 1 ? 'selected' : '' }}>Lunas
                                            </option>
                                            <option value="0" {{ $payment->status == 0 ? 'selected' : '' }}>Belum
                                                Lunas</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="description">Deskripsi <span class="text-danger">*</span></label>
                                        <textarea class="form-control" id="description" name="description" placeholder="Masukkan deskripsi" required>{{ $payment->description }}</textarea>
                                    </div>
                                    <form action="{{ route('updatePayments', $payment->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <!-- Unchanged form fields, ensuring all inputs are as initially defined -->
                                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
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
