<?php

namespace App\Http\Controllers;

use App\Models\BatchKwitansi;
use App\Models\PekerjaanKwitansi;
use App\Models\BatchPekerjaanKwitansi;
use Illuminate\Http\Request;

class BatchPekerjaanKwitansiController extends Controller
{
    // Display a list of BatchPekerjaanKwitansi
    public function index(Request $request)
    {
        $search = $request->query('search');

        // Fetch relationships with optional search filter and only with related batchKwitansi
        $batchPekerjaanKwitansi = BatchPekerjaanKwitansi::with(['batchKwitansi', 'pekerjaanKwitansi'])
            ->whereHas('batchKwitansi') // Ensures only records with related batchKwitansi are fetched
            ->when($search, function ($query, $search) {
                return $query->whereHas('pekerjaanKwitansi', function ($query) use ($search) {
                    $query->where('nomor_pekerjaan', 'like', "%{$search}%");
                });
            })
            ->paginate(10); // Add pagination for better performance

        return view('batchPekerjaanKwitansi.index', compact('batchPekerjaanKwitansi'));
    }

    // Show the form for creating a new BatchPekerjaanKwitansi
    public function create(Request $request)
    {
        // Fetch batchKwitansis with their associated uraianKwitansis
        $batchKwitansis = BatchKwitansi::with('uraianKwitansis')->get();

        // Fetch pekerjaanKwitansis that do not have associated batchKwitansis
        $pekerjaanKwitansis = PekerjaanKwitansi::whereDoesntHave('batchKwitansis')->get();

        // Check if there is a pre-selected pekerjaanKwitansi from the request
        $selectedPekerjaanKwitansiId = $request->input('pekerjaan_kwitansi_id', null);

        return view('batchPekerjaanKwitansi.create', compact('batchKwitansis', 'pekerjaanKwitansis', 'selectedPekerjaanKwitansiId'));
    }

    // Store a new BatchPekerjaanKwitansi
    public function store(Request $request)
    {
        $request->validate([
            'batch_kwitansi_ids' => 'required|array',
            'batch_kwitansi_ids.*' => 'exists:batch_kwitansis,id',
            'pekerjaan_kwitansi_id' => 'required|exists:pekerjaan_kwitansis,id',
        ]);

        // Ensure the pekerjaan_kwitansi_id is not already in use
        if (BatchPekerjaanKwitansi::where('pekerjaan_kwitansi_id', $request->pekerjaan_kwitansi_id)->exists()) {
            return redirect()->back()->withErrors(['pekerjaan_kwitansi_id' => 'The selected Pekerjaan Kwitansi is already in use.'])->withInput();
        }

        // Create relationships
        foreach ($request->batch_kwitansi_ids as $batch_kwitansi_id) {
            BatchPekerjaanKwitansi::create([
                'batch_kwitansi_id' => $batch_kwitansi_id,
                'pekerjaan_kwitansi_id' => $request->pekerjaan_kwitansi_id,
            ]);
        }

        return redirect()->route('batchPekerjaanKwitansi.index')->with('success', 'Relationships created successfully.');
    }

    // Show the form for editing an existing BatchPekerjaanKwitansi
    public function edit($id)
    {
        $batchPekerjaanKwitansi = BatchPekerjaanKwitansi::findOrFail($id);
        $batchKwitansis = BatchKwitansi::with('uraianKwitansis')->get();
        $pekerjaanKwitansis = PekerjaanKwitansi::all();
        $selectedBatchKwitansiIds = BatchPekerjaanKwitansi::where('pekerjaan_kwitansi_id', $batchPekerjaanKwitansi->pekerjaan_kwitansi_id)
            ->pluck('batch_kwitansi_id')->toArray();

        return view('batchPekerjaanKwitansi.edit', compact('batchPekerjaanKwitansi', 'batchKwitansis', 'pekerjaanKwitansis', 'selectedBatchKwitansiIds'));
    }

    // Update an existing BatchPekerjaanKwitansi
    public function update(Request $request, $id)
    {
        $request->validate([
            'batch_kwitansi_ids' => 'required|array',
            'batch_kwitansi_ids.*' => 'exists:batch_kwitansis,id',
            'pekerjaan_kwitansi_id' => 'required|exists:pekerjaan_kwitansis,id',
        ]);

        $batchPekerjaanKwitansi = BatchPekerjaanKwitansi::findOrFail($id);

        // Remove existing relationships for the current pekerjaan_kwitansi_id
        BatchPekerjaanKwitansi::where('pekerjaan_kwitansi_id', $batchPekerjaanKwitansi->pekerjaan_kwitansi_id)
            ->delete();

        // Create new relationships
        foreach ($request->batch_kwitansi_ids as $batch_kwitansi_id) {
            BatchPekerjaanKwitansi::create([
                'batch_kwitansi_id' => $batch_kwitansi_id,
                'pekerjaan_kwitansi_id' => $request->pekerjaan_kwitansi_id,
            ]);
        }

        return redirect()->route('batchPekerjaanKwitansi.index')->with('success', 'Relationships updated successfully.');
    }

    // Delete an existing BatchPekerjaanKwitansi
    public function destroy($id)
    {
        // Find the relationship by the given ID
        $batchPekerjaanKwitansi = BatchPekerjaanKwitansi::findOrFail($id);

        // Delete all relationships associated with the pekerjaan_kwitansi_id
        BatchPekerjaanKwitansi::where('pekerjaan_kwitansi_id', $batchPekerjaanKwitansi->pekerjaan_kwitansi_id)
            ->delete();

        return redirect()->route('batchPekerjaanKwitansi.index')->with('success', 'All relationships for the selected Pekerjaan Kwitansi deleted successfully.');
    }
}
