@extends('back.template.index')
@section('title', 'Tambah Data Instalasi')
@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Tambah Data Instalasi</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('instalasi.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="nama_alat" class="form-label">Nama Alat</label>
            <input type="text" class="form-control" id="nama_alat" name="nama_alat" value="{{ old('nama_alat') }}" required>
        </div>

        <div class="mb-3">
            <label for="merk_alat" class="form-label">Merk Alat</label>
            <input type="text" class="form-control" id="merk_alat" name="merk_alat" value="{{ old('merk_alat') }}" required>
        </div>

        <div class="mb-3">
            <label for="tipe_alat" class="form-label">Tipe Alat</label>
            <input type="text" class="form-control" id="tipe_alat" name="tipe_alat" value="{{ old('tipe_alat') }}" required>
        </div>

        <div class="mb-3">
            <label for="tanggal_kalibrasi" class="form-label">Tanggal Instalasi</label>
            <input type="date" class="form-control" id="tanggal_kalibrasi" name="tanggal_kalibrasi" value="{{ old('tanggal_kalibrasi') }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('instalasi.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection