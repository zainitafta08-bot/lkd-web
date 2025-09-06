<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kalibrasi;

class KalibrasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $kalibrasis = Kalibrasi::query();

        // Check for a search query and filter the results.
        if ($request->has('search')) {
            $search = $request->search;
            $kalibrasis->where('nama_alat', 'like', '%' . $search . '%')
                       ->orWhere('merk_alat', 'like', '%' . $search . '%')
                       ->orWhere('tipe_alat', 'like', '%' . $search . '%');
        }

        // Retrieve the filtered or all data.
        $kalibrasis = $kalibrasis->get();

        return view('kalibrasi.index', compact('kalibrasis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kalibrasi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_alat' => 'required',
            'merk_alat' => 'required',
            'tipe_alat' => 'required',
            'tanggal_kalibrasi' => 'required|date',
        ]);

        Kalibrasi::create($request->all());

        return redirect()->route('kalibrasi.index')->with('success', 'Data kalibrasi berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kalibrasi $kalibrasi)
    {
        return view('kalibrasi.show', compact('kalibrasi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kalibrasi $kalibrasi)
    {
        return view('kalibrasi.edit', compact('kalibrasi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kalibrasi $kalibrasi)
    {
        $request->validate([
            'nama_alat' => 'required',
            'merk_alat' => 'required',
            'tipe_alat' => 'required',
            'tanggal_kalibrasi' => 'required|date',
        ]);

        $kalibrasi->update($request->all());

        return redirect()->route('kalibrasi.index')->with('success', 'Data kalibrasi berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kalibrasi $kalibrasi)
    {
        $kalibrasi->delete();

        return redirect()->route('kalibrasi.index')->with('success', 'Data kalibrasi berhasil dihapus!');
    }
}