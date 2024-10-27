<?php

namespace App\Http\Controllers\Pembelian;

use App\Http\Controllers\Controller;
use App\Models\Pembelian\FooterPembelian;
use App\Models\Pembelian\ProjectPembelian;
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
    public function create(Request $request)
    {
        // Retrieve the project_pembelian_id from the query parameters
        $project_pembelian_id = $request->query('project_pembelian_id');
        
        // Find the ProjectPembelian by its ID
        $projectPembelian = ProjectPembelian::find($project_pembelian_id);
        
        // If the ProjectPembelian doesn't exist, redirect to the index with an error message
        if (!$projectPembelian) {
            return redirect()->route('footerPembelians.index')
                             ->with('error', 'Invalid Project Pembelian ID.');
        }

        // Check if a FooterPembelian already exists for this project_pembelian_id
        $existingRecord = FooterPembelian::where('project_pembelian_id', $project_pembelian_id)->first();

        // If a record exists, redirect to the show page of the existing record
        if ($existingRecord) {
            return redirect()->route('footerPembelians.edit', $existingRecord->id)
                             ->with('info', 'Footer Pembelian already exists for this project.');
        }

        // If no record exists, show the create form
        return view('footerPembelians.create', compact('projectPembelian'));
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

        // Create the new FooterPembelian
        $footerPembelian = FooterPembelian::create($request->all());

        // Redirect to the show page of the newly created record
        return redirect()->route('footerPembelians.show', $footerPembelian->id)
                         ->with('success', 'Footer Pembelian created successfully.');
    }

    // Display the specified resource
    public function show(FooterPembelian $footerPembelian)
    {
        return view('footerPembelians.show', compact('footerPembelian'));
    }

    // Show the form for editing the specified resource
    public function edit(FooterPembelian $footerPembelian)
    {
        // Get all ProjectPembelian for the edit form
        $projectPembelians = ProjectPembelian::all();
        return view('footerPembelians.edit', compact('footerPembelian', 'projectPembelians'));
    }

    // Update the specified resource in storage
    public function update(Request $request, FooterPembelian $footerPembelian)
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

        // Update the existing FooterPembelian
        $footerPembelian->update($request->all());

        // Redirect to the show page of the updated record
        return redirect()->route('projectPembelians.index')
                         ->with('success', 'Footer Pembelian updated successfully.');
    }

    // Remove the specified resource from storage
    public function destroy($id)
    {
        // Find the FooterPembelian record by its ID
        $footerPembelian = FooterPembelian::findOrFail($id);

        // Delete the record from the database
        $footerPembelian->delete();

        // Redirect back to the projectPembelians index page with a success message
        return redirect()->route('projectPembelians.index')
                         ->with('success', 'Footer Pembelian deleted successfully.');
    }
}
