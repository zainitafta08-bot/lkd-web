@extends('back.template.index')

@section('title', 'Tambah Laporan Kalibrasi')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h4>Form Tambah Laporan Kalibrasi</h4>
            <a href="{{ route('laporan.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
        <div class="card-body">
            <form action="{{ route('laporan.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="nama_alat" class="form-label">Nama Alat</label>
                    <input type="text" class="form-control @error('nama_alat') is-invalid @enderror" id="nama_alat" name="nama_alat" value="{{ old('nama_alat') }}" required>
                    @error('nama_alat')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="merk" class="form-label">Merk</label>
                    <input type="text" class="form-control @error('merk') is-invalid @enderror" id="merk" name="merk" value="{{ old('merk') }}" required>
                    @error('merk')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="no_seri" class="form-label">Nomor Seri</label>
                    <input type="text" class="form-control @error('no_seri') is-invalid @enderror" id="no_seri" name="no_seri" value="{{ old('no_seri') }}" required>
                    @error('no_seri')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="tgl_kalibrasi" class="form-label">Tanggal Kalibrasi</label>
                    <input type="date" class="form-control @error('tgl_kalibrasi') is-invalid @enderror" id="tgl_kalibrasi" name="tgl_kalibrasi" value="{{ old('tgl_kalibrasi') }}" required>
                    @error('tgl_kalibrasi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="tgl_next_kalibrasi" class="form-label">Tanggal Kalibrasi Berikutnya</label>
                    <input type="date" class="form-control @error('tgl_next_kalibrasi') is-invalid @enderror" id="tgl_next_kalibrasi" name="tgl_next_kalibrasi" value="{{ old('tgl_next_kalibrasi') }}" required>
                    @error('tgl_next_kalibrasi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="hasil" class="form-label">Hasil</label>
                    <textarea class="form-control @error('hasil') is-invalid @enderror" id="hasil" name="hasil" rows="3" required>{{ old('hasil') }}</textarea>
                    @error('hasil')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="teknisi" class="form-label">Teknisi</label>
                    <input type="text" class="form-control @error('teknisi') is-invalid @enderror" id="teknisi" name="teknisi" value="{{ old('teknisi') }}" required>
                    @error('teknisi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <label for="nilai_setting" class="form-label">Nilai Setting Alat</label>
                    <input type="number" step="any" class="form-control" id="nilai_setting" name="nilai_setting" value="{{ old('nilai_setting') }}" required>
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Nilai Hasil Pengukuran (Ulangi beberapa kali)</label>
                    <div id="pengukuran-container">
                        <div class="input-group mb-2">
                            <input type="number" step="any" class="form-control nilai-pengukuran" name="nilai_pengukuran[]" placeholder="Masukkan nilai pengukuran" required>
                            <button class="btn btn-danger remove-pengukuran" type="button">Hapus</button>
                        </div>
                    </div>
                    <button id="add-pengukuran" class="btn btn-secondary btn-sm" type="button">Tambah Pengukuran</button>
                </div>

                <div class="card mb-4 bg-light">
                    <div class="card-body">
                        <h5 class="card-title">Hasil Perhitungan Live</h5>
                        <p><strong>Rata-rata:</strong> <span id="display-rata-rata">...</span></p>
                        <p><strong>Standar Deviasi:</strong> <span id="display-standar-deviasi">...</span></p>
                        <p><strong>Nilai Koreksi:</strong> <span id="display-nilai-koreksi">...</span></p>
                        <p><strong>Ketidakpastian Tipe A (Ua):</strong> <span id="display-ua">...</span></p>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="file_kalibrasi" class="form-label">Unggah Laporan (.jpg, .png, .pdf)</label>
                    <input class="form-control @error('file_kalibrasi') is-invalid @enderror" type="file" id="file_kalibrasi" name="file_kalibrasi">
                    @error('file_kalibrasi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                
                <button type="submit" class="btn btn-primary">Simpan Laporan</button>
            </form>
        </div>
    </div>
</div>
@endsection

@push('script')
<script>
    function calculateAndDisplay() {
        const nilaiSettingInput = document.getElementById('nilai_setting');
        const pengukuranInputs = document.querySelectorAll('.nilai-pengukuran');
        
        const nilaiSetting = parseFloat(nilaiSettingInput.value);
        const nilaiPengukuran = Array.from(pengukuranInputs).map(input => parseFloat(input.value));
        
        const rataRataDisplay = document.getElementById('display-rata-rata');
        const standarDeviasiDisplay = document.getElementById('display-standar-deviasi');
        const nilaiKoreksiDisplay = document.getElementById('display-nilai-koreksi');
        const uaDisplay = document.getElementById('display-ua');

        // Cek jika ada input yang tidak valid atau kurang dari 2 pengukuran
        if (isNaN(nilaiSetting) || nilaiPengukuran.some(isNaN) || nilaiPengukuran.length < 2) {
            rataRataDisplay.innerText = '...';
            standarDeviasiDisplay.innerText = '...';
            nilaiKoreksiDisplay.innerText = '...';
            uaDisplay.innerText = '...';
            return;
        }

        // Hitung Rata-rata
        const n = nilaiPengukuran.length;
        const rataRata = nilaiPengukuran.reduce((sum, current) => sum + current, 0) / n;
        
        // Hitung Standar Deviasi
        let jumlahKuadratSelisih = 0;
        for (let i = 0; i < n; i++) {
            jumlahKuadratSelisih += Math.pow(nilaiPengukuran[i] - rataRata, 2);
        }
        const standarDeviasi = Math.sqrt(jumlahKuadratSelisih / (n - 1));

        // Hitung Ketidakpastian Tipe A (Ua)
        const uaValue = standarDeviasi / Math.sqrt(n);

        // Hitung Nilai Koreksi
        const nilaiKoreksi = rataRata - nilaiSetting;

        // Tampilkan hasil dengan 10 angka di belakang koma
        rataRataDisplay.innerText = rataRata.toFixed(10);
        standarDeviasiDisplay.innerText = standarDeviasi.toFixed(10);
        nilaiKoreksiDisplay.innerText = nilaiKoreksi.toFixed(10);
        uaDisplay.innerText = uaValue.toFixed(10);
    }

    // Tambah event listener untuk setiap input
    document.getElementById('nilai_setting').addEventListener('input', calculateAndDisplay);
    document.addEventListener('input', function (e) {
        if (e.target.classList.contains('nilai-pengukuran')) {
            calculateAndDisplay();
        }
    });

    // Tambah field pengukuran baru
    document.getElementById('add-pengukuran').addEventListener('click', function () {
        const container = document.getElementById('pengukuran-container');
        const inputGroup = document.createElement('div');
        inputGroup.className = 'input-group mb-2';
        inputGroup.innerHTML = `
            <input type="number" step="any" class="form-control nilai-pengukuran" name="nilai_pengukuran[]" placeholder="Masukkan nilai pengukuran" required>
            <button class="btn btn-danger remove-pengukuran" type="button">Hapus</button>
        `;
        container.appendChild(inputGroup);
        calculateAndDisplay();
    });

    // Hapus field pengukuran
    document.addEventListener('click', function (e) {
        if (e.target && e.target.classList.contains('remove-pengukuran')) {
            const inputGroups = document.querySelectorAll('#pengukuran-container .input-group');
            if (inputGroups.length > 1) {
                e.target.closest('.input-group').remove();
                calculateAndDisplay();
            } else {
                alert('Minimal harus ada dua field pengukuran untuk perhitungan.');
            }
        }
    });
</script>
@endpush