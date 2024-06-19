@extends('layouts.master')

@section('title', 'Payments')

@section('addCss')
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap4.min.css') }}">
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2 justify-content-between align-items-center">
                    <div class="col-md-6 d-flex align-items-center">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Pembayaran</li>
                        </ol>
                    </div>
                    <div class="col-md-6 d-flex justify-content-end">
                        <a href="{{ route('createPayments') }}" class="btn btn-primary mr-2">Tambah Pembayaran</a>
                        <a href="{{ route('payments.trashed') }}" class="btn btn-success mr-2">Data Terhapus</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover" id="data-table">
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
                                    @foreach ($payments as $payment)
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
                                            <td>
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <a href="{{ route('showPayments', $payment->id) }}"
                                                        class="btn btn-info btn-sm mr-2 rounded" title="Lihat"><i
                                                            class="fas fa-eye"></i></a>
                                                    <a href="{{ route('editPayments', $payment) }}"
                                                        class="btn btn-warning btn-sm mr-2 rounded" title="Edit"><i
                                                            class="fas fa-edit"></i></a>
                                                            <form onsubmit="confirmDelete(event, this)" data-student-name="{{ $payment->student->name }}" method="POST" action="{{ route('deletePayments', $payment->id) }}" class="mx-1">
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
    @endsection

    @section('addJavascript')
        <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('js/sweetalert.min.js') }}"></script>
        <script>
            $(function() {
                $('#data-table').DataTable({
                    responsive: true,
                    language: {
                        search: "_INPUT_",
                        searchPlaceholder: "Cari...",
                        lengthMenu: "_MENU_",
                        info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                        infoEmpty: "Data tidak ditemukan",
                        zeroRecords: "Tidak ada data yang cocok",
                        paginate: {
                            previous: "<i class='fas fa-chevron-left'></i>",
                            next: "<i class='fas fa-chevron-right'></i>"
                        }
                    }
                });
            });

            function confirmDelete(url) {
                swal({
                    title: 'Konfirmasi Hapus',
                    text: 'Apakah Kamu Yakin Ingin Menghapus Data Ini?',
                    icon: 'warning',
                    buttons: true,
                    dangerMode: true,
                }).then(function(value) {
                    if (value) {
                        $('#delete-form-' + url.split('/')[url.split('/').length - 1]).submit();
                    }
                });
            }
        </script>
    @endsection
