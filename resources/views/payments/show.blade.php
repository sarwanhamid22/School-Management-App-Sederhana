@extends('layouts.master')

@section('title', 'Detail Pembayaran')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2 justify-content-between align-items-center">
                    <div class="col-md-6 d-flex align-items-center">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('listPayments') }}">Pembayaran</a></li>
                            <li class="breadcrumb-item active">Detail Pembayaran</li>
                        </ol>
                    </div>
                    <div class="col-md-6 d-flex justify-content-end">
                        <a href="{{ route('listPayments') }}" class="btn btn-secondary">Kembali</a>
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
                        <div class="d-flex justify-content-end mb-3">
                            <a href="{{ route('payments.print', $payment->id) }}" class="btn btn-primary" target="_blank">
                                <i class="fas fa-print"></i> Cetak 
                            </a>
                        </div>
                   
              
                        <table class="table table-striped">
                            <tbody>
                                <tr>
                                    <th>Nama Siswa</th>
                                    <td>{{ $payment->student->name }}</td>
                                </tr>
                                <tr>
                                    <th>Nomor Induk Siswa</th>
                                    <td>{{ $payment->student->student_id }}</td>
                                </tr>
                                <tr>
                                    <th>Kelas</th>
                                    <td>{{ $payment->student->class ? $payment->student->class->name : 'Tidak ada kelas' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Tahun Akademik</th>
                                    <td>{{ $payment->academic_year }}</td>
                                </tr>
                                <tr>
                                    <th>Jenis Pembayaran</th>
                                    <td>{{ implode(', ', $payment->payment_type) }}</td>
                                </tr>
                                <tr>
                                    <th>Jumlah Pembayaran</th>
                                    <td>Rp {{ number_format($payment->amount, 0, ',', '.') }}</td>
                                </tr>
                                <tr>
                                    <th>Tanggal Pembayaran</th>
                                    <td>{{ $payment->payment_date->format('d-m-Y') }}</td>
                                </tr>
                                <tr>
                                    <th>Status Pembayaran</th>
                                    <td>{{ $payment->status ? 'Lunas' : 'Belum Lunas' }}</td>
                                </tr>
                                <tr>
                                    <th>Deskripsi</th>
                                    <td>{{ $payment->description }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
