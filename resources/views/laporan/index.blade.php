@extends('back.template.index')

@section('title', 'Daftar Laporan Kalibrasi')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Daftar Laporan Kalibrasi</h2>
        <a href="{{ route('laporan.create') }}" class="btn btn-primary">Tambah Laporan</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Nama Alat</th>
                <th>Merk</th>
                <th>No. Seri</th>
                <th>Tgl. Kalibrasi</th>
                <th>Tgl. Next Kalibrasi</th>
                <th>Hasil</th>
                <th>Teknisi</th>
                <th width="280px">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($laporan as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->nama_alat }}</td>
                <td>{{ $item->merk }}</td>
                <td>{{ $item->no_seri }}</td>
                <td>{{ \Carbon\Carbon::parse($item->tgl_kalibrasi)->format('d-m-Y') }}</td>
                <td>{{ \Carbon\Carbon::parse($item->tgl_next_kalibrasi)->format('d-m-Y') }}</td>
                <td>{{ $item->hasil }}</td>
                <td>{{ $item->teknisi }}</td>
                <td>
                    <form action="{{ route('laporan.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                        <a href="{{ route('laporan.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <a href="{{ route('laporan.show', $item->id) }}" class="btn btn-sm btn-primary">detail</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection