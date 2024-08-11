<?php

namespace App\Http\Controllers;

use App\Models\CatatanPembelian;
use App\Models\ProjectPembelian;
use Illuminate\Http\Request;

class CatatanPembelianController extends Controller
{
    // Display a listing of the resource
    public function index()
    {
        $catatanPembelians = CatatanPembelian::with('projectPembelian')->get();
        return view('catatanPembelians.index', compact('catatanPembelians'));
    }

    // Show the form for creating a new resource
    public function create()
    {
        $projectPembelians = ProjectPembelian::all();
        return view('catatanPembelians.create', compact('projectPembelians'));
    }

    // Store a newly created resource in storage
    public function store(Request $request)
    {
        $request->validate([
            'project_pembelian_id' => 'required|exists:project_pembelians,id',
            'waktu_pengiriman' => 'nullable|date',
            'alamat_pengiriman' => 'nullable|string|max:255',
            'contact_person' => 'nullable|string|max:255',
            'pembayaran' => 'nullable|string|max:255',
        ]);

        CatatanPembelian::create($request->all());

        return redirect()->route('catatanPembelians.index')->with('success', 'Catatan Pembelian created successfully.');
    }

    // Display the specified resource
    public function show($id)
    {
        $catatanPembelian = CatatanPembelian::with('projectPembelian')->findOrFail($id);
        return view('catatanPembelians.show', compact('catatanPembelian'));
    }

    // Show the form for editing the specified resource
    public function edit($id)
    {
        $catatanPembelian = CatatanPembelian::findOrFail($id);
        $projectPembelians = ProjectPembelian::all();
        return view('catatanPembelians.edit', compact('catatanPembelian', 'projectPembelians'));
    }

    // Update the specified resource in storage
    public function update(Request $request, $id)
    {
        $request->validate([
            'project_pembelian_id' => 'required|exists:project_pembelians,id',
            'waktu_pengiriman' => 'nullable|date',
            'alamat_pengiriman' => 'nullable|string|max:255',
            'contact_person' => 'nullable|string|max:255',
            'pembayaran' => 'nullable|string|max:255',
        ]);

        $catatanPembelian = CatatanPembelian::findOrFail($id);
        $catatanPembelian->update($request->all());

        return redirect()->route('catatanPembelians.index')->with('success', 'Catatan Pembelian updated successfully.');
    }

    // Remove the specified resource from storage
    public function destroy($id)
    {
        $catatanPembelian = CatatanPembelian::findOrFail($id);
        $catatanPembelian->delete();

        return redirect()->route('catatanPembelians.index')->with('success', 'Catatan Pembelian deleted successfully.');
    }
}
