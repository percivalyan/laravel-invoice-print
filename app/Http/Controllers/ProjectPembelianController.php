<?php

namespace App\Http\Controllers;

use App\Models\ProjectPembelian;
use Illuminate\Http\Request;

class ProjectPembelianController extends Controller
{
    // Display a listing of the resource
    public function index()
    {
        $projectPembelians = ProjectPembelian::all();
        return view('projectPembelians.index', compact('projectPembelians'));
    }

    // Show the form for creating a new resource
    public function create()
    {
        return view('projectPembelians.create');
    }

    // Store a newly created resource in storage
    public function store(Request $request)
    {
        $request->validate([
            'nomor_po' => 'required|string|max:255',
            'project' => 'required|string|max:255',
            'tanggal_order' => 'required|date',
            'metode_pembayaran' => 'required|string|max:255',
            'po_ditunjukan_kepada' => 'required|string|max:255',
            'alamat' => 'nullable|string|max:255',
            'kontak' => 'required|string|max:255',
            'email_mobile_number' => 'nullable|string|max:255',
        ]);

        ProjectPembelian::create($request->all());

        return redirect()->route('projectPembelians.index')->with('success', 'Project Pembelian created successfully.');
    }

    // Display the specified resource
    public function show(ProjectPembelian $projectPembelian)
    {
        // $projectPembelian = ProjectPembelian::findOrFail($id);
        // return view('projectPembelians.show', compact('projectPembelian'));

        $projectPembelian->load('catatanPembelian', 'footerPembelian', 'bahanPembelian.pembelians',);
        return view('ProjectPembelians.show', compact('projectPembelian'));
    }

    // Show the form for editing the specified resource
    public function edit($id)
    {
        $projectPembelian = ProjectPembelian::findOrFail($id);
        return view('projectPembelians.edit', compact('projectPembelian'));
    }

    // Update the specified resource in storage
    public function update(Request $request, $id)
    {
        $request->validate([
            'nomor_po' => 'required|string|max:255',
            'project' => 'required|string|max:255',
            'tanggal_order' => 'required|date',
            'metode_pembayaran' => 'required|string|max:255',
            'po_ditunjukan_kepada' => 'required|string|max:255',
            'alamat' => 'nullable|string|max:255',
            'kontak' => 'required|string|max:255',
            'email_mobile_number' => 'nullable|string|max:255',
        ]);

        $projectPembelian = ProjectPembelian::findOrFail($id);
        $projectPembelian->update($request->all());

        return redirect()->route('projectPembelians.index')->with('success', 'Project Pembelian updated successfully.');
    }

    // Remove the specified resource from storage
    public function destroy($id)
    {
        $projectPembelian = ProjectPembelian::findOrFail($id);
        $projectPembelian->delete();

        return redirect()->route('projectPembelians.index')->with('success', 'Project Pembelian deleted successfully.');
    }
}
