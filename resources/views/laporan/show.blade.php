@extends('back.template.index')

@section('title', 'Detail Laporan Kalibrasi')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4>Detail Laporan Kalibrasi</h4>
            <a href="{{ route('laporan.index') }}" class="btn btn-secondary">Kembali ke Daftar</a>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <p><strong>Nama Alat:</strong> {{ $laporan->nama_alat }}</p>
                    <p><strong>Merk:</strong> {{ $laporan->merk }}</p>
                    <p><strong>No. Seri:</strong> {{ $laporan->no_seri }}</p>
                    <p><strong>Tanggal Kalibrasi:</strong> {{ \Carbon\Carbon::parse($laporan->tgl_kalibrasi)->format('d-m-Y') }}</p>
                    <p><strong>Tgl. Next Kalibrasi:</strong> {{ \Carbon\Carbon::parse($laporan->tgl_next_kalibrasi)->format('d-m-Y') }}</p>
                    <p><strong>Teknisi:</strong> {{ $laporan->teknisi }}</p>
                </div>
                <div class="col-md-6">
                    <h5>Hasil Perhitungan</h5>
                    <p><strong>Nilai Setting:</strong> {{ $laporan->nilai_setting }}</p>
                    <p><strong>Nilai Pengukuran:</strong>
                        @if($laporan->nilai_pengukuran)
                            @foreach(json_decode($laporan->nilai_pengukuran) as $nilai)
                                <span class="badge bg-primary text-white">{{ $nilai }}</span>
                            @endforeach
                        @else
                            -
                        @endif
                    </p>
                    <p><strong>Rata-rata:</strong> {{ number_format($laporan->rata_rata, 10) }}</p>
                    <p><strong>Standar Deviasi:</strong> {{ number_format($laporan->standar_deviasi, 10) }}</p>
                    <p><strong>Nilai Koreksi:</strong> {{ number_format($laporan->nilai_koreksi, 10) }}</p>
                    <p><strong>Ketidakpastian Tipe A (Ua):</strong> {{ number_format($laporan->u_a_value, 10) }}</p>
                </div>
            </div>
            <hr>
            <h5>Hasil Kalibrasi</h5>
            <p>{{ $laporan->hasil }}</p>

            <hr>

            @if ($laporan->file_path)
                <div class="mb-3">
                    <p><strong>File Laporan:</strong></p>
                    <a href="{{ asset($laporan->file_path) }}" target="_blank" class="btn btn-primary">Lihat File Laporan</a>
                    <a href="{{ route('laporan.download', $laporan->id) }}" class="btn btn-success">Unduh File Laporan</a>
                </div>
            @else
                <div class="alert alert-info">
                    Tidak ada file laporan yang diunggah.
                </div>
            @endif
        </div>
        <div class="card-footer text-end">
            <a href="{{ route('laporan.edit', $laporan->id) }}" class="btn btn-warning">Edit Laporan</a>
        </div>
    </div>
</div>
@endsection