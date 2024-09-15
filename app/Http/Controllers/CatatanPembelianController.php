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

        // If a record exists, redirect to the show page of the existing record
        if ($existingRecord) {
            return redirect()->route('catatanPembelians.show', $existingRecord->id)
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

        // Create the new CatatanPembelian
        $catatanPembelian = CatatanPembelian::create($request->all());

        // Redirect to the show page of the newly created record
        return redirect()->route('catatanPembelians.show', $catatanPembelian->id)
                         ->with('success', 'Catatan Pembelian created successfully.');
    }

    // Display the specified resource
    public function show($id)
    {
        // Find the CatatanPembelian by its ID
        $catatanPembelian = CatatanPembelian::find($id);

        // If the CatatanPembelian doesn't exist, redirect to the index with an error message
        if (!$catatanPembelian) {
            return redirect()->route('catatanPembelians.index')
                ->with('error', 'Catatan Pembelian not found.');
        }

        // Pass the CatatanPembelian to the view
        return view('catatanPembelians.show', compact('catatanPembelian'));
    }

    // Show the form for editing the specified resource
    public function edit(CatatanPembelian $catatanPembelian)
    {
        // Get all ProjectPembelian for the edit form
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

        // Update the existing CatatanPembelian
        $catatanPembelian->update($request->all());

        // Redirect to the show page of the updated record
        return redirect()->route('catatanPembelians.show', $catatanPembelian->id)
                         ->with('success', 'Catatan Pembelian updated successfully.');
    }

    // Remove the specified resource from storage
    public function destroy($id)
    {
        // Find the CatatanPembelian record by its ID
        $catatanPembelian = CatatanPembelian::findOrFail($id);

        // Delete the record from the database
        $catatanPembelian->delete();

        // Redirect back to the index page with a success message
        // return redirect()->route('catatanPembelians.index')
        //                  ->with('success', 'Catatan Pembelian deleted successfully.');
        return redirect()->route('projectPembelians.index')
                         ->with('success', 'Catatan Pembelian deleted successfully.');
    }
}
