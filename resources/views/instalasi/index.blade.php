@extends('back.template.index')
@section('title' ,'Instalasi')
@section('content')
<div class="container mt-5">
        <h1 class="mb-4">Daftar Data Instalasi</h1>

        <a href="{{ route('instalasi.create') }}" class="btn btn-primary mb-3">Tambah Data</a>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="card">
            <div class="card-body">
                <table id="instalasiTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Alat</th>
                            <th>Merk Alat</th>
                            <th>Tipe Alat</th>
                            <th>Tanggal Instalasi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

    @push('script')
    <!-- jQuery HARUS di atas DataTables -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <!-- DataTables -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#instalasiTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('instalasi.index') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                    {data: 'nama_alat', name: 'nama_alat'},
                    {data: 'merk_alat', name: 'merk_alat'},
                    {data: 'tipe_alat', name: 'tipe_alat'},
                    {data: 'tanggal_kalibrasi', name: 'tanggal_kalibrasi'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ],
                language: {
                    url: '//cdn.datatables.net/plug-ins/1.13.7/i18n/id.json'
                }
            });
        });
    </script>
    @endpush
@endsection