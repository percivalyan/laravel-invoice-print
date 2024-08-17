<?php

namespace App\Http\Controllers;

use App\Models\Pembelian;
use Illuminate\Http\Request;

class PembelianController extends Controller
{
    public function index()
    {
        $pembelians = Pembelian::all();
        return view('pembelians.index', compact('pembelians'));
    }

    public function create()
    {
        return view('pembelians.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'project_pembelian_id' => 'required|integer',
            'nama_bahan' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
            'jumlah' => 'required|integer',
            'harga_satuan' => 'required|numeric',
        ]);

        Pembelian::create($request->all());

        return redirect()->route('pembelians.index')->with('success', 'Pembelian created successfully.');
    }

    public function show(Pembelian $pembelian)
    {
        $pembelian->load('bahanPembelian');
        return view('pembelians.show', compact('pembelian'));
    }

    public function edit(Pembelian $pembelian)
    {
        return view('pembelians.edit', compact('pembelian'));
    }

    public function update(Request $request, Pembelian $pembelian)
    {
        $request->validate([
            'project_pembelian_id' => 'required|integer',
            'nama_bahan' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
            'jumlah' => 'required|integer',
            'harga_satuan' => 'required|numeric',
        ]);

        $pembelian->update($request->all());

        return redirect()->route('pembelians.index')->with('success', 'Pembelian updated successfully.');
    }

    public function destroy(Pembelian $pembelian)
    {
        $pembelian->delete();

        return redirect()->route('pembelians.index')->with('success', 'Pembelian deleted successfully.');
    }
}
