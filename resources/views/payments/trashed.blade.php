@extends('layouts.master')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Daftar Pembayaran Terhapus</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active">Pembayaran Terhapus</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row mb-3">
                <div class="col-md-12 text-right">
                    <a href="{{ route('listPayments') }}" class="btn btn-primary">Kembali ke Daftar Pembayaran</a>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="trashed-table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Siswa</th>
                                    <th>Nomor Induk Siswa</th>
                                    <th>Kelas</th>
                                    <th>Tahun Akademik</th>
                                    <th>Jenis Pembayaran</th>
                                    <th>Jumlah</th>
                                    <th>Tanggal</th>
                                    <th>Status</th>
                                    <th>Deskripsi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($trashedPayments as $payment)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                            <td>{{ $payment->student->name }}</td>
                                            <td>{{ $payment->student->student_id }}</td>
                                            <td>{{ $payment->student->class->name }}</td>
                                            <td>{{ $payment->academic_year }}</td>
                                            <td>{{ implode(', ', array_map('ucfirst', $payment->payment_type)) }}</td>
                                            <td>Rp {{ number_format($payment->amount, 0, ',', '.') }}</td>
                                            <td>{{ $payment->payment_date->format('d-m-Y') }}</td>
                                            <td>{{ $payment->status ? 'Lunas' : 'Belum Lunas' }}</td>
                                            <td>{{ $payment->description }}</td>
                                    <td class="d-flex justify-content-start">
                                        <form action="{{ route('payments.restore', $payment->id) }}" method="POST" class="mr-1">
                                            @csrf
                                            <button type="submit" class="btn btn-success btn-sm">
                                                <i class="fas fa-trash-restore"></i>
                                            </button>
                                        </form>
                                        <form action="{{ route('payments.forceDelete', $payment->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
