<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Detail Pembayaran</title>
    <!-- Masukkan stylesheet atau gaya khusus pencetakan di sini -->
    <style>
        /* Tambahkan gaya khusus untuk tampilan pencetakan di sini */
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        h2 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 50px;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        .signature {
            margin-top: 50px;
            text-align: right;
        }
        .signature div {
            margin-bottom: 60px; /* Adjust the space for signature */
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Detail Pembayaran</h2>
        <table>
            <tr>
                <th>Nama Siswa:</th>
                <td>{{ $payment->student->name }}</td>
            </tr>
            <tr>
                <th>Kelas</th>
                <td>{{ $payment->student->class ? $payment->student->class->name : 'Tidak ada kelas' }}
                </td>
            </tr>
            <tr>
                <th>Tahun Akademik:</th>
                <td>{{ $payment->academic_year }}</td>
            </tr>
            <tr>
                <th>Jenis Pembayaran:</th>
                <td>{{ implode(', ', $payment->payment_type) }}</td>
            </tr>
            <tr>
                <th>Jumlah:</th>
                <td>Rp {{ number_format($payment->amount, 0, ',', '.') }}</td>
            </tr>
            <tr>
                <th>Tanggal Bayar:</th>
                <td>{{ $payment->payment_date->format('d-m-Y') }}</td>
            </tr>
            <tr>
                <th>Status Pembayaran:</th>
                <td>{{ $payment->status ? 'Lunas' : 'Belum Lunas' }}</td>
            </tr>
            <tr>
                <th>Deskripsi:</th>
                <td>{{ $payment->description }}</td>
            </tr>
        </table>

        <div class="signature">
            <div>Bendahara</div>
            <div>__________________________</div>
        </div>
    </div>
</body>
</html>
