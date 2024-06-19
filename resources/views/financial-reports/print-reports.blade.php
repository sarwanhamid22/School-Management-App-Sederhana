@extends('layouts.master')

@section('title', 'Cetak Laporan Keuangan')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2 justify-content-between align-items-center">
                <div class="col-md-6 d-flex align-items-center">
                    <h2 class="m-0">Laporan Keuangan Bulan {{ date('F', mktime(0, 0, 0, $month, 1)) }} Tahun {{ $year }}</h2>
                </div>
                <div class="col-md-6 d-flex justify-content-end">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('financial-reports.print') }}">Pilih Laporan Keuangan</a></li>
                        <li class="breadcrumb-item active">Cetak Laporan Keuangan</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <form id="printForm" method="POST" action="{{ route('financial-reports.printPdf') }}" target="_blank">
                        @csrf
                        <input type="hidden" name="month" value="{{ $month }}">
                        <input type="hidden" name="year" value="{{ $year }}">
                        <button type="button" class="btn btn-primary mb-3" onclick="submitForm()">Cetak Laporan Keuangan</button>
                    </form>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Keterangan</th>
                                <th>Pengeluaran</th>
                                <th>Pendapatan</th>
                                <th>Deskripsi</th>
                                <th>Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $totalExpense = 0;
                                $totalIncome = 0;
                            @endphp
                            @foreach ($reports as $index => $report)
                            @php
                                $totalExpense += $report->expense;
                                $totalIncome += $report->income;
                            @endphp
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $report->title }}</td>
                                <td>Rp {{ number_format($report->expense, 0, ',', '.') }}</td>
                                <td>Rp {{ number_format($report->income, 0, ',', '.') }}</td>
                                <td>{{ $report->description ?? '' }}</td>
                                <td>{{ $report->report_date->format('d-m-Y') }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="2">Total</th>
                                <th>Rp {{ number_format($totalExpense, 0, ',', '.') }}</th>
                                <th>Rp {{ number_format($totalIncome, 0, ',', '.') }}</th>
                                <th colspan="2"></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function submitForm() {
        document.getElementById('printForm').submit();
    }
</script>
@endsection
