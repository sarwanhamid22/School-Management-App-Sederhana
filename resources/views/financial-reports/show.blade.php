@extends('layouts.master')

@section('title', 'Detail Laporan Keuangan')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2 justify-content-between align-items-center">
                <div class="col-md-6 d-flex align-items-center">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('financial-reports.index') }}">Laporan Keuangan</a></li>
                        <li class="breadcrumb-item active">Detail</li>
                    </ol>
                </div>
                <div class="col-md-6 d-flex justify-content-end">
                    <a href="{{ url()->previous() }}" class="btn btn-secondary rounded">Kembali</a>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <h1 class="m-0 mb-4">Detail Laporan Keuangan</h1>
                    <table class="table table-bordered">
                        <tr>
                            <th>Keterangan</th>
                            <td>{{ $financialReport->title }}</td>
                        </tr>
                        <tr>
                            <th>Pengeluaran</th>
                            <td>Rp {{ number_format($financialReport->expense, 0, ',', '.') }}</td>
                        </tr>
                        <tr>
                            <th>Pendapatan</th>
                            <td>Rp {{ number_format($financialReport->income, 0, ',', '.') }}</td>
                        </tr>
                        <tr>
                            <th>Deskripsi</th>
                            <td>{{ $financialReport->description ?? 'Tidak ada deskripsi' }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal</th>
                            <td>{{ $financialReport->report_date->format('d-m-Y') }}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
