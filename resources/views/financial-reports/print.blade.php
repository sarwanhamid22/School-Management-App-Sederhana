@extends('layouts.master')

@section('title', 'Cetak Laporan Keuangan')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2 justify-content-between align-items-center">
                <div class="col-md-6 d-flex align-items-center">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('financial-reports.index') }}">Laporan Keuangan</a></li>
                        <li class="breadcrumb-item active">Pilih Laporan Keuangan</li>
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
                    <h1 class="m-0 mb-4">Cetak Laporan Keuangan</h1>
                    <form method="POST" action="{{ route('financial-reports.printReports') }}">
                        @csrf
                        <div class="form-group">
                            <label for="month">Bulan <span class="text-danger">*</span></label>
                            <select name="month" id="month" class="form-control">
                                @for ($m = 1; $m <= 12; $m++)
                                    <option value="{{ $m }}">{{ strftime('%B', mktime(0, 0, 0, $m, 1)) }}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="year">Tahun <span class="text-danger">*</span></label>
                            <select name="year" id="year" class="form-control">
                                @for ($y = 2020; $y <= date('Y'); $y++)
                                    <option value="{{ $y }}">{{ $y }}</option>
                                @endfor
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Pilih</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
