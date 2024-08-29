<?php

namespace App\Http\Controllers;

use App\Models\BatchKwitansi;
use App\Models\UraianKwitansi;
use Illuminate\Http\Request;

class BatchKwitansiController extends Controller
{
    // Menampilkan daftar semua batch kwitansi
    public function index()
    {
        $batchKwitansis = BatchKwitansi::with('uraianKwitansis')->get();
        return view('batchKwitansis.index', compact('batchKwitansis'));
    }

    // Menampilkan form untuk membuat batch kwitansi baru
    public function create()
    {
        return view('batchKwitansis.create');
    }

    // Menyimpan batch kwitansi baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_batch' => 'nullable|string|max:255',
            'jumlah_batch' => 'nullable|integer',
            'satuan_batch' => 'nullable|string|max:255',
            'keterangan_batch' => 'nullable|string',
            'dimensi_panjang' => 'nullable|numeric',
            'dimensi_lebar' => 'nullable|numeric',
            'dimensi_tinggi' => 'nullable|numeric',
            'dimensi_berat' => 'nullable|numeric',
        ]);

        BatchKwitansi::create($validated);

        return redirect()->route('batchKwitansis.index')->with('success', 'Batch Kwitansi berhasil ditambahkan');
    }

    // Menampilkan detail satu batch kwitansi
    public function show(BatchKwitansi $batchKwitansi)
    {
        return view('batchKwitansis.show', compact('batchKwitansi'));
    }

    // Menampilkan form untuk mengedit batch kwitansi
    public function edit(BatchKwitansi $batchKwitansi)
    {
        return view('batchKwitansis.edit', compact('batchKwitansi'));
    }

    // Memperbarui batch kwitansi
    public function update(Request $request, BatchKwitansi $batchKwitansi)
    {
        $validated = $request->validate([
            'nama_batch' => 'nullable|string|max:255',
            'jumlah_batch' => 'nullable|integer',
            'satuan_batch' => 'nullable|string|max:255',
            'keterangan_batch' => 'nullable|string',
            'dimensi_panjang' => 'nullable|numeric',
            'dimensi_lebar' => 'nullable|numeric',
            'dimensi_tinggi' => 'nullable|numeric',
            'dimensi_berat' => 'nullable|numeric',
        ]);

        $batchKwitansi->update($validated);

        return redirect()->route('batchKwitansis.index')->with('success', 'Batch Kwitansi berhasil diperbarui');
    }

    // Menghapus batch kwitansi
    public function destroy(BatchKwitansi $batchKwitansi)
    {
        $batchKwitansi->delete();
        return redirect()->route('batchKwitansis.index')->with('success', 'Batch Kwitansi berhasil dihapus');
    }
}
