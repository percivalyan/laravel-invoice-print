<?php

namespace App\Http\Controllers;

use App\Models\BahanPembelian;
use Illuminate\Http\Request;

class BahanPembelianController extends Controller
{
    public function index()
    {
        $bahanPembelians = BahanPembelian::all();
        return view('bahanPembelians.index', compact('bahanPembelians'));
    }

    public function create()
    {
        return view('bahanPembelians.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'project_pembelian_id' => 'required|integer',
            'pembelian' => 'required|string|max:255',
        ]);

        BahanPembelian::create($request->all());

        return redirect()->route('bahanPembelians.index')->with('success', 'Bahan Pembelian created successfully.');
    }

    public function show(BahanPembelian $bahanPembelian)
    {
        return view('bahanPembelians.show', compact('bahanPembelian'));
    }

    public function edit(BahanPembelian $bahanPembelian)
    {
        return view('bahanPembelians.edit', compact('bahanPembelian'));
    }

    public function update(Request $request, BahanPembelian $bahanPembelian)
    {
        $request->validate([
            'project_pembelian_id' => 'required|integer',
            'pembelian' => 'required|string|max:255',
        ]);

        $bahanPembelian->update($request->all());

        return redirect()->route('bahanPembelians.index')->with('success', 'Bahan Pembelian updated successfully.');
    }

    public function destroy(BahanPembelian $bahanPembelian)
    {
        $bahanPembelian->delete();

        return redirect()->route('bahanPembelians.index')->with('success', 'Bahan Pembelian deleted successfully.');
    }
}
