@extends('back.template.index')
@section('title' ,'maintenance')
@section('content')
<div class="container mt-5">
        <h1 class="mb-4">Daftar Data maintenance</h1>

        <a href="{{ route('maintenance.create') }}" class="btn btn-primary mb-3">Tambah Data</a>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Alat</th>
                    <th>Merk Alat</th>
                    <th>Tipe Alat</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($maintenances as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nama_alat }}</td>
                    <td>{{ $item->merk_alat }}</td>
                    <td>{{ $item->tipe_alat }}</td>
                    <td>{{ $item->tanggal_kalibrasi }}</td>
                    <td>
                        <a href="{{ route('maintenance.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <a href="{{ route('maintenance.show', $item->id) }}" class="btn btn-primary btn-sm">detail</a>
                        <form action="{{ route('maintenance.destroy', $item->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center">Belum ada data.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection