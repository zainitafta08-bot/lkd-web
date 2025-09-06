<?php
// app/Http/Controllers/LaporanMaintenanceController.php

namespace App\Http\Controllers;

use App\Models\LaporanMaintenance;
use Illuminate\Http\Request;

class LaporanMaintenanceController extends Controller
{
    public function index()
    {
        $laporan = LaporanMaintenance::all();
        return view('laporan-maintenance.index', compact('laporan'));
    }

    public function create()
    {
        return view('laporan-maintenance.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_alat' => 'required',
            'merk' => 'required',
            'no_seri' => 'required',
            'tgl_maintenance' => 'required|date',
            'tindakan' => 'required',
            'hasil' => 'required',
            'teknisi' => 'required'
        ]);

        LaporanMaintenance::create($request->all());
        return redirect()->route('laporan-maintenance.index')->with('success', 'Laporan maintenance berhasil ditambahkan.');
    }

    public function show(LaporanMaintenance $laporanMaintenance)
    {
        return view('laporan-maintenance.show', compact('laporanMaintenance'));
    }

    public function edit(LaporanMaintenance $laporanMaintenance)
    {
        return view('laporan-maintenance.edit', compact('laporanMaintenance'));
    }

    public function update(Request $request, LaporanMaintenance $laporanMaintenance)
    {
        $request->validate([
            'nama_alat' => 'required',
            'merk' => 'required',
            'no_seri' => 'required',
            'tgl_maintenance' => 'required|date',
            'tindakan' => 'required',
            'hasil' => 'required',
            'teknisi' => 'required'
        ]);

        $laporanMaintenance->update($request->all());
        return redirect()->route('laporan-maintenance.index')->with('success', 'Laporan maintenance berhasil diperbarui.');
    }

    public function destroy(LaporanMaintenance $laporanMaintenance)
    {
        $laporanMaintenance->delete();
        return redirect()->route('laporan-maintenance.index')->with('success', 'Laporan maintenance berhasil dihapus.');
    }
}