@extends('back.template.index')
@section('title', 'Detail Data kalibrasi')
@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Detail Data kalibrasi</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Nama Alat: {{ $kalibrasi->nama_alat }}</h5>
            <p class="card-text"><strong>Merk Alat:</strong> {{ $kalibrasi->merk_alat }}</p>
            <p class="card-text"><strong>Tipe Alat:</strong> {{ $kalibrasi->tipe_alat }}</p>
            <p class="card-text"><strong>Tanggal kalibrasi:</strong> {{ $kalibrasi->tanggal_kalibrasi }}</p>
        </div>
    </div>
    <a href="{{ route('kalibrasi.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</div>
@endsection