<?php

namespace App\Http\Controllers;

use App\Models\FooterPembelian;
use App\Models\ProjectPembelian;
use Illuminate\Http\Request;

class FooterPembelianController extends Controller
{
    // Display a listing of the resource
    public function index()
    {
        $footerPembelians = FooterPembelian::with('projectPembelian')->get();
        return view('footerPembelians.index', compact('footerPembelians'));
    }

    // Show the form for creating a new resource
    public function create()
    {
        $projectPembelians = ProjectPembelian::all();
        return view('footerPembelians.create', compact('projectPembelians'));
    }

    // Store a newly created resource in storage
    public function store(Request $request)
    {
        $request->validate([
            'project_pembelian_id' => 'required|exists:project_pembelians,id',
            'diorder_oleh' => 'nullable|string|max:255',
            'diorder_oleh_jabatan' => 'nullable|string|max:255',
            'disetujui_oleh' => 'nullable|string|max:255',
            'disetujui_oleh_jabatan' => 'nullable|string|max:255',
            'order_diterima_oleh' => 'nullable|string|max:255',
            'order_diterima_oleh_jabatan' => 'nullable|string|max:255',
        ]);

        FooterPembelian::create($request->all());

        return redirect()->route('footerPembelians.index')->with('success', 'Footer Pembelian created successfully.');
    }

    // Display the specified resource
    public function show($id)
    {
        $footerPembelian = FooterPembelian::with('projectPembelian')->findOrFail($id);
        return view('footerPembelians.show', compact('footerPembelian'));
    }

    // Show the form for editing the specified resource
    public function edit($id)
    {
        $footerPembelian = FooterPembelian::findOrFail($id);
        $projectPembelians = ProjectPembelian::all();
        return view('footerPembelians.edit', compact('footerPembelian', 'projectPembelians'));
    }

    // Update the specified resource in storage
    public function update(Request $request, $id)
    {
        $request->validate([
            'project_pembelian_id' => 'required|exists:project_pembelians,id',
            'diorder_oleh' => 'nullable|string|max:255',
            'diorder_oleh_jabatan' => 'nullable|string|max:255',
            'disetujui_oleh' => 'nullable|string|max:255',
            'disetujui_oleh_jabatan' => 'nullable|string|max:255',
            'order_diterima_oleh' => 'nullable|string|max:255',
            'order_diterima_oleh_jabatan' => 'nullable|string|max:255',
        ]);

        $footerPembelian = FooterPembelian::findOrFail($id);
        $footerPembelian->update($request->all());

        return redirect()->route('footerPembelians.index')->with('success', 'Footer Pembelian updated successfully.');
    }

    // Remove the specified resource from storage
    public function destroy($id)
    {
        $footerPembelian = FooterPembelian::findOrFail($id);
        $footerPembelian->delete();

        return redirect()->route('footerPembelians.index')->with('success', 'Footer Pembelian deleted successfully.');
    }
}
