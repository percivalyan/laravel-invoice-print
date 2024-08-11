<?php

namespace App\Http\Controllers;

use App\Models\Pembelian;
use App\Models\ProjectPembelian;
use Illuminate\Http\Request;

class PembelianController extends Controller
{
    // Display a listing of the resource
    public function index()
    {
        $pembelians = Pembelian::with('projectPembelian')->get();
        return view('pembelians.index', compact('pembelians'));
    }

    // Show the form for creating a new resource
    public function create()
    {
        $projectPembelians = ProjectPembelian::all();
        return view('pembelians.create', compact('projectPembelians'));
    }

    // Store a newly created resource in storage
    public function store(Request $request)
    {
        $request->validate([
            'project_pembelian_id' => 'required|exists:project_pembelians,id',
            'nama_bahan' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
            'jumlah' => 'required|integer',
            'harga_satuan' => 'required|numeric|min:0',
        ]);

        Pembelian::create($request->all());

        return redirect()->route('pembelians.index')->with('success', 'Pembelian created successfully.');
    }

    // Display the specified resource
    public function show($id)
    {
        $pembelian = Pembelian::with('projectPembelian')->findOrFail($id);
        return view('pembelians.show', compact('pembelian'));
    }

    // Show the form for editing the specified resource
    public function edit($id)
    {
        $pembelian = Pembelian::findOrFail($id);
        $projectPembelians = ProjectPembelian::all();
        return view('pembelians.edit', compact('pembelian', 'projectPembelians'));
    }

    // Update the specified resource in storage
    public function update(Request $request, $id)
    {
        $request->validate([
            'project_pembelian_id' => 'required|exists:project_pembelians,id',
            'nama_bahan' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
            'jumlah' => 'required|integer',
            'harga_satuan' => 'required|numeric|min:0',
        ]);

        $pembelian = Pembelian::findOrFail($id);
        $pembelian->update($request->all());

        return redirect()->route('pembelians.index')->with('success', 'Pembelian updated successfully.');
    }

    // Remove the specified resource from storage
    public function destroy($id)
    {
        $pembelian = Pembelian::findOrFail($id);
        $pembelian->delete();

        return redirect()->route('pembelians.index')->with('success', 'Pembelian deleted successfully.');
    }
}
