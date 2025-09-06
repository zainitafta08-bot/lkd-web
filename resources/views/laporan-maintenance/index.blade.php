@extends('back.template.index')

@section('title', 'Daftar Laporan Maintenance')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Daftar Laporan Maintenance</h2>
        <a href="{{ route('laporan-maintenance.create') }}" class="btn btn-primary">Tambah Laporan</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <table id="laporanMaintenanceTable" class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama Alat</th>
                        <th>Merk</th>
                        <th>No. Seri</th>
                        <th>Tgl. Maintenance</th>
                        <th>Tindakan</th>
                        <th>Hasil</th>
                        <th>Teknisi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>

@push('scripts')
<script>
    $(document).ready(function() {
        $('#laporanMaintenanceTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('laporan-maintenance.index') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
                {data: 'nama_alat', name: 'nama_alat'},
                {data: 'merk', name: 'merk'},
                {data: 'no_seri', name: 'no_seri'},
                {data: 'tgl_maintenance', name: 'tgl_maintenance'},
                {data: 'tindakan', name: 'tindakan'},
                {data: 'hasil', name: 'hasil'},
                {data: 'teknisi', name: 'teknisi'},
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