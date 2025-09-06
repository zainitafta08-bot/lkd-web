@extends('back.template.index')
@section('title', 'Detail Data Instalasi')
@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Detail Data Instalasi</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Nama Alat: {{ $instalasi->nama_alat }}</h5>
            <p class="card-text"><strong>Merk Alat:</strong> {{ $instalasi->merk_alat }}</p>
            <p class="card-text"><strong>Tipe Alat:</strong> {{ $instalasi->tipe_alat }}</p>
            <p class="card-text"><strong>Tanggal Instalasi:</strong> {{ $instalasi->tanggal_kalibrasi }}</p>
        </div>
    </div>
    <a href="{{ route('instalasi.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</div>
@endsection