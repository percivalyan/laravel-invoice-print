<?php

namespace App\Http\Controllers\Kwitansi;

use App\Http\Controllers\Controller;
use App\Models\Kwitansi\PekerjaanKwitansi;
use App\Models\Kwitansi\BatchKwitansi; // Import the BatchKwitansi model
use Illuminate\Http\Request;

class PekerjaanKwitansiController extends Controller
{
    // Display a listing of the resource
    public function index(Request $request)
    {
        $projectKwitansiId = $request->query("project_kwitansi_id");

        $query = PekerjaanKwitansi::with("projectKwitansi");
        if ($projectKwitansiId) {
            $query->where("project_kwitansi_id", $projectKwitansiId);
        }

        $pekerjaanKwitansis = $query->get();
        $allBatches = BatchKwitansi::all(); // Load all batches

        return view('pekerjaanKwitansis.index', compact('pekerjaanKwitansis', 'projectKwitansiId', 'allBatches'));
    }

    // Show the form for creating a new resource
    public function create(Request $request)
    {
        $projectKwitansiId = $request->query("project_kwitansi_id");
        $allBatches = BatchKwitansi::all(); // Load all batches for the form
    
        return view('pekerjaanKwitansis.create', compact('projectKwitansiId', 'allBatches'));
    }

    // Store a newly created resource in storage
    public function store(Request $request)
    {
        $validated = $request->validate([
            'project_kwitansi_id' => 'required|exists:project_kwitansis,id',
            'pekerjaan' => 'nullable|string|max:255',
            'batch_kwitansi_ids' => 'required|array',
            'batch_kwitansi_ids.*' => 'exists:batch_kwitansis,id',
        ]);

        $pekerjaanKwitansi = PekerjaanKwitansi::create($validated);

        // Attach multiple batch_kwitansi_ids to the pekerjaanKwitansi
        $pekerjaanKwitansi->batchKwitansis()->attach($request->batch_kwitansi_ids);

        return redirect()->route('pekerjaanKwitansis.index', ['project_kwitansi_id' => $request->project_kwitansi_id])
            ->with('success', 'Pekerjaan Kwitansi created successfully.');
    }

    // Show the form for editing the specified resource
    public function edit($id)
    {
        $pekerjaanKwitansi = PekerjaanKwitansi::with('batchKwitansis')->findOrFail($id);
        $projectKwitansiId = $pekerjaanKwitansi->project_kwitansi_id;
        $allBatches = BatchKwitansi::all(); // Load all batches

        return view('pekerjaanKwitansis.edit', compact('pekerjaanKwitansi', 'projectKwitansiId', 'allBatches'));
    }

    // Update the specified resource in storage
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'project_kwitansi_id' => 'required|exists:project_kwitansis,id',
            'pekerjaan' => 'nullable|string|max:255',
            'batch_kwitansi_ids' => 'required|array',
            'batch_kwitansi_ids.*' => 'exists:batch_kwitansis,id',
        ]);

        $pekerjaanKwitansi = PekerjaanKwitansi::findOrFail($id);
        $pekerjaanKwitansi->update($validated);

        // Sync the batch_kwitansi_ids with the pekerjaanKwitansi
        $pekerjaanKwitansi->batchKwitansis()->sync($request->batch_kwitansi_ids);

        return redirect()->route('pekerjaanKwitansis.index', ['project_kwitansi_id' => $request->project_kwitansi_id])
            ->with('success', 'Pekerjaan Kwitansi updated successfully.');
    }

    // Remove the specified resource from storage
    public function destroy($id)
    {
        $pekerjaanKwitansi = PekerjaanKwitansi::findOrFail($id);
        $projectKwitansiId = $pekerjaanKwitansi->project_kwitansi_id;

        $pekerjaanKwitansi->delete();

        return redirect()->route('pekerjaanKwitansis.index', ['project_kwitansi_id' => $projectKwitansiId])
            ->with('success', 'Pekerjaan Kwitansi deleted successfully.');
    }
}
