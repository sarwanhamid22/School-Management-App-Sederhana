@extends('layouts.master')

@section('title', 'Daftar Laporan')

@section('addCss')
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap4.min.css') }}">
    <style>
        .content-cell {
            max-width: 300px;
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
            cursor: pointer;
        }
    </style>
@endsection

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2 justify-content-between align-items-center">
                    <div class="col-md-6 d-flex align-items-center">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Penilaian Sekolah</li>
                        </ol>
                    </div>
                    <div class="col-md-6 d-flex justify-content-end">
                        @if (!$reports->isEmpty())
                            <button type="button" class="btn btn-danger"
                                onclick="confirmDeleteAll('{{ route('reports.destroyAll') }}')">Hapus Semua</button>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        @if ($reports->isEmpty())
                            <div class="alert alert-warning">
                                Tidak Ada Data Laporan Yang Ditemukan.
                            </div>
                        @else
                            <div class="table-responsive">
                                <table class="table table-bordered" id="data-table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Konten</th>
                                            <th>Waktu Pengiriman</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($reports as $report)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td class="content-cell" data-full-content="{{ $report->content }}">
                                                    {{ \Illuminate\Support\Str::limit($report->content, 100, '...') }}
                                                </td>
                                                <td>{{ $report->created_at }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="contentModal" tabindex="-1" role="dialog" aria-labelledby="contentModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="contentModalLabel">Konten Laporan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="modalContentBody" style="white-space: pre-wrap;">
                        <!-- Content will be dynamically inserted here -->
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

            // Click event to toggle content
            $('.content-cell').click(function() {
                var fullContent = $(this).data('full-content');
                $('#modalContentBody').text(fullContent);
                $('#contentModal').modal('show');
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
                    $('#delete-form-' + url.split('/').pop()).submit();
                }
            });
        }

        function confirmDeleteAll(url) {
            swal({
                title: 'Konfirmasi Hapus Semua',
                text: 'Apakah Kamu Yakin Ingin Menghapus Semua Data?',
                icon: 'warning',
                buttons: true,
                dangerMode: true,
            }).then(function(value) {
                if (value) {
                    $('<form>', {
                        "id": "delete-all-form",
                        "html": '<input type="hidden" name="_token" value="{{ csrf_token() }}"><input type="hidden" name="_method" value="DELETE">',
                        "action": url,
                        "method": 'POST'
                    }).appendTo(document.body).submit();
                }
            });
        }
    </script>
@endsection
