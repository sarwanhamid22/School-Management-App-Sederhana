@extends('layouts.master')

@section('title', 'Edit Laporan Keuangan')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2 justify-content-between align-items-center">
                <div class="col-md-6 d-flex align-items-center">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('financial-reports.index') }}">Laporan Keuangan</a></li>
                        <li class="breadcrumb-item active">Edit Laporan Keuangan</li>
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
                    <form method="POST" action="{{ route('financial-reports.update', $financialReport->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="title">Keterangan <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ $financialReport->title }}" required>
                        </div>
                        <div class="form-group">
                            <label for="expense">Pengeluaran <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" id="expense" name="expense" value="{{ $financialReport->expense }}" step="0.01" required>
                        </div>
                        <div class="form-group">
                            <label for="income">Pendapatan <span class="text-danger">*</span></label>
                            <input type="number" class="form-control" id="income" name="income" value="{{ $financialReport->income }}" step="0.01" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Deskripsi</label>
                            <textarea class="form-control" id="description" name="description">{{ $financialReport->description }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="report_date">Tanggal <span class="text-danger">*</span></label>
                            <input type="date" class="form-control" id="report_date" name="report_date" value="{{ $financialReport->report_date->format('Y-m-d') }}" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Perbarui</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
