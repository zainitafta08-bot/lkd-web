@extends('back.template.index')

@section('title', 'Detail Laporan Maintenance')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4>Detail Laporan Maintenance</h4>
            <a href="{{ route('laporan-maintenance.index') }}" class="btn btn-secondary">Kembali ke Daftar</a>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <p><strong>Nama Alat:</strong> {{ $laporanMaintenance->nama_alat }}</p>
                    <p><strong>Merk:</strong> {{ $laporanMaintenance->merk }}</p>
                    <p><strong>No. Seri:</strong> {{ $laporanMaintenance->no_seri }}</p>
                    <p><strong>Teknisi:</strong> {{ $laporanMaintenance->teknisi }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong>Tanggal Maintenance:</strong> {{ \Carbon\Carbon::parse($laporanMaintenance->tgl_maintenance)->format('d-m-Y') }}</p>
                    <p><strong>Tindakan:</strong> {{ $laporanMaintenance->tindakan }}</p>
                    <p><strong>Hasil:</strong> {{ $laporanMaintenance->hasil }}</p>
                </div>
            </div>
        </div>
        <div class="card-footer text-end">
            <a href="{{ route('laporan-maintenance.edit', $laporanMaintenance->id) }}" class="btn btn-warning">Edit Laporan</a>
        </div>
    </div>
</div>
@endsection