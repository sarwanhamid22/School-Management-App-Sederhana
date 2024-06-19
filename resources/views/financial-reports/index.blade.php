@extends('layouts.master')

@section('title', 'Laporan Keuangan')

@section('addCss')
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap4.min.css') }}">
@endsection

@section('addJavascript')
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('js/sweetalert.min.js') }}"></script>
    <script>
        $(function() {
            $("#data-table").DataTable({
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

        function confirmDelete(event, form) {
            event.preventDefault();
            swal({
                title: 'Konfirmasi Hapus',
                text: 'Apakah kamu yakin ingin menghapus data laporan keuangan?',
                icon: 'warning',
                buttons: true,
                dangerMode: true,
            }).then(function(value) {
                if (value) {
                    form.submit();
                }
            });
        }
    </script>
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2 justify-content-between align-items-center">
                    <div class="col-md-6 d-flex align-items-center">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Laporan Keuangan</li>
                        </ol>
                    </div>
                    <div class="col-md-6 d-flex justify-content-end">
                        <a href="{{ route('financial-reports.create') }}" class="btn btn-primary mr-2 rounded">Tambah Laporan</a>
                        <a href="{{ route('financial-reports.print') }}" class="btn btn-success mr-2 rounded">Cetak</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered table-striped" id="data-table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Keterangan</th>
                                        <th>Pengeluaran</th>
                                        <th>Pendapatan</th>
                                        <th>Deskripsi</th>
                                        <th>Tanggal</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($reports as $index => $report)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $report->title }}</td>
                                            <td>Rp {{ number_format($report->expense, 0, ',', '.') }}</td>
                                            <td>Rp {{ number_format($report->income, 0, ',', '.') }}</td>
                                            <td>{{ $report->description ?? '' }}</td>
                                            <td>{{ $report->report_date->format('d-m-Y') }}</td>
                                            <td>
                                                <a href="{{ route('financial-reports.edit', $report->id) }}" class="btn btn-warning btn-sm mr-1 rounded" title="Edit"><i class="fas fa-edit"></i></a>
                                                <a href="{{ route('financial-reports.show', $report->id) }}" class="btn btn-info btn-sm mr-1 rounded" title="Lihat"><i class="fas fa-eye"></i></a>
                                                <form onsubmit="confirmDelete(event, this)" method="POST" action="{{ route('financial-reports.destroy', $report->id) }}" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm rounded" title="Hapus">
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
