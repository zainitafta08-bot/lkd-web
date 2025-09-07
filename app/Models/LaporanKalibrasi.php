<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanKalibrasi extends Model
{
    use HasFactory;

    // Nama tabel di database
    protected $table = 'laporan_kalibrasis';

    // Kolom yang bisa diisi mass-assignment
    protected $fillable = [
        'nama_alat',
        'merk',
        'no_seri',
        'tgl_kalibrasi',
        'tgl_next_kalibrasi',
        'hasil',
        'teknisi',
        'file_path',
        'u_a_value',
        'rata_rata',
        'standar_deviasi',
        'nilai_koreksi',
        'nilai_setting', // Tambahan
        'nilai_pengukuran', // Tambahan
    ];

    // Jika mau format tanggal otomatis
    protected $casts = [
        'tgl_kalibrasi' => 'date',
        'tgl_next_kalibrasi' => 'date',
        'nilai_pengukuran' => 'array', // Tambahan: ini sangat penting!
    ];
}