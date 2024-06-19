<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Keuangan</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        .page-break {
            page-break-after: always;
        }
    </style>
</head>
<body>
    <h2>Laporan Keuangan Bulan {{ date('F', mktime(0, 0, 0, $month, 1)) }} Tahun {{ $year }}</h2>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Keterangan</th>
                <th>Pengeluaran</th>
                <th>Pendapatan</th>
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
                    <td>{{ $report->report_date->format('d-m-Y') }}</td>
                </tr>
            @endforeach
            <tr>
                <th colspan="2">Total</th>
                <th>Rp {{ number_format($totalExpense, 0, ',', '.') }}</th>
                <th>Rp {{ number_format($totalIncome, 0, ',', '.') }}</th>
                <th></th>
            </tr>
        </tbody>
    </table>
</body>
</html>
