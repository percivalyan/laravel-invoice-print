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
    public function create(Request $request)
    {
        // Retrieve the project_pembelian_id from the query parameters
        $project_pembelian_id = $request->query('project_pembelian_id');
        
        // Find the ProjectPembelian by its ID
        $projectPembelian = ProjectPembelian::find($project_pembelian_id);
        
        // If the ProjectPembelian doesn't exist, redirect to the index with an error message
        if (!$projectPembelian) {
            return redirect()->route('catatanPembelians.index')
                             ->with('error', 'Invalid Project Pembelian ID.');
        }
    
        // Check if a CatatanPembelian already exists for this project_pembelian_id
        $existingRecord = CatatanPembelian::where('project_pembelian_id', $project_pembelian_id)->first();
    
        // If a record exists, redirect to the index page
        if ($existingRecord) {
            return redirect()->route('catatanPembelians.show')
                             ->with('info', 'Catatan Pembelian already exists for this project.');
        }
    
        // If no record exists, show the create form
        return view('catatanPembelians.create', compact('projectPembelian'));
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
    
    // Show the form for editing the specified resource
    public function edit(CatatanPembelian $catatanPembelian)
    {
        // $catatanPembelian = CatatanPembelian::findOrFail($id);
        $projectPembelians = ProjectPembelian::all();
        return view('catatanPembelians.edit', compact('catatanPembelian', 'projectPembelians'));
    }

    // Update the specified resource in storage
    public function update(Request $request, CatatanPembelian $catatanPembelian)
    {
        $request->validate([
            'project_pembelian_id' => 'required|exists:project_pembelians,id',
            'waktu_pengiriman' => 'nullable|date',
            'alamat_pengiriman' => 'nullable|string|max:255',
            'contact_person' => 'nullable|string|max:255',
            'pembayaran' => 'nullable|string|max:255',
        ]);

        // $catatanPembelian = CatatanPembelian::findOrFail($id);
        $catatanPembelian->update($request->all());

        return redirect()->route('catatanPembelians.index')->with('success', 'Catatan Pembelian updated successfully.');
    }

    // Remove the specified resource from storage
    public function destroy($id)
    {
        // Find the CatatanPembelian record by its ID
        $catatanPembelian = CatatanPembelian::findOrFail($id);
        
        // Delete the record from the database
        $catatanPembelian->delete();
    
        // Redirect back to the index page with a success message
        return redirect()->route('catatanPembelians.index')->with('success', 'Catatan Pembelian deleted successfully.');
    }
    
}
