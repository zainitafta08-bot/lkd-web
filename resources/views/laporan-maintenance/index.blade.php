@extends('back.template.index')

@section('title', 'Daftar Laporan Maintenance')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Daftar Laporan Maintenance</h2>
        <a href="{{ route('laporan-maintenance.create') }}" class="btn btn-primary d-block d-md-inline-block">Tambah Laporan</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="d-none d-md-block">
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
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
                        <td>{{ \Carbon\Carbon::parse($item->tgl_maintenance)->format('d-m-Y') }}</td>
                        <td>{{ $item->tindakan }}</td>
                        <td>{{ $item->hasil }}</td>
                        <td>{{ $item->teknisi }}</td>
                        <td>
                            <form action="{{ route('laporan-maintenance.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                <a href="{{ route('laporan-maintenance.show', $item->id) }}" class="btn btn-sm btn-info text-white">Detail</a>
                                <a href="{{ route('laporan-maintenance.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
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
    </div>

    <div class="d-md-none">
        @foreach ($laporan as $item)
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">{{ $item->nama_alat }}</h5>
                <p class="card-text mb-1"><strong>Merk:</strong> {{ $item->merk }}</p>
                <p class="card-text mb-1"><strong>No. Seri:</strong> {{ $item->no_seri }}</p>
                <p class="card-text mb-1"><strong>Tgl. Maintenance:</strong> {{ \Carbon\Carbon::parse($item->tgl_maintenance)->format('d-m-Y') }}</p>
                <p class="card-text mb-1"><strong>Teknisi:</strong> {{ $item->teknisi }}</p>
                
                <hr>
                
                <p class="card-text mb-1"><strong>Tindakan:</strong> {{ $item->tindakan }}</p>
                <p class="card-text mb-1"><strong>Hasil:</strong> {{ $item->hasil }}</p>
                
                <div class="mt-3">
                    <form action="{{ route('laporan-maintenance.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');" class="d-grid gap-2 d-md-block">
                        <a href="{{ route('laporan-maintenance.show', $item->id) }}" class="btn btn-info text-white d-block mb-2">Detail</a>
                        <a href="{{ route('laporan-maintenance.edit', $item->id) }}" class="btn btn-warning d-block mb-2">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger d-block">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection