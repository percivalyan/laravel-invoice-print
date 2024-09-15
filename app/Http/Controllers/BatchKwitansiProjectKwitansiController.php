<?php

namespace App\Http\Controllers;

use App\Models\BatchKwitansi;
use App\Models\ProjectKwitansi;
use App\Models\BatchKwitansiProjectKwitansi;
use Illuminate\Http\Request;

class BatchKwitansiProjectKwitansiController extends Controller
{
    // public function index(Request $request)
    // {
    //     // Get the search query from the request
    //     $search = $request->query('search');

    //     // Fetch relationships with optional search filter
    //     $relationships = BatchKwitansiProjectKwitansi::with(['batchKwitansi', 'projectKwitansi'])
    //         ->when($search, function ($query, $search) {
    //             return $query->whereHas('projectKwitansi', function ($query) use ($search) {
    //                 $query->where('nomor_surat_jalan', 'like', "%{$search}%");
    //             });
    //         })
    //         ->get();

    //     return view('relationships.index', compact('relationships'));
    // }
    public function index(Request $request)
    {
        $search = $request->query('search');

        // Ensure you handle any special characters properly
        $relationships = BatchKwitansiProjectKwitansi::with(['batchKwitansi', 'projectKwitansi'])
            ->when($search, function ($query, $search) {
                return $query->whereHas('projectKwitansi', function ($query) use ($search) {
                    // Use `where` with `like` to match the search term
                    $query->where('nomor_surat_jalan', 'like', "%{$search}%");
                });
            })
            ->get();

        return view('relationships.index', compact('relationships'));
    }

    public function create(Request $request)
    {
        // Fetch batchKwitansis with their associated uraianKwitansis
        $batchKwitansis = BatchKwitansi::with('uraianKwitansis')->get();

        // Fetch projectKwitansis that do not have associated batchKwitansis
        $projectKwitansis = ProjectKwitansi::whereDoesntHave('batchKwitansis')->get();

        // Check if there is a pre-selected projectKwitansi from the request
        $selectedProjectKwitansiId = $request->input('project_kwitansi_id', null);

        return view('relationships.create', compact('batchKwitansis', 'projectKwitansis', 'selectedProjectKwitansiId'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'batch_kwitansi_ids' => 'required|array',
            'batch_kwitansi_ids.*' => 'exists:batch_kwitansis,id',
            'project_kwitansi_id' => 'required|exists:project_kwitansis,id',
        ]);

        // Ensure the project_kwitansi_id is not already in use
        if (BatchKwitansiProjectKwitansi::where('project_kwitansi_id', $request->project_kwitansi_id)->exists()) {
            return redirect()->back()->withErrors(['project_kwitansi_id' => 'The selected Project Kwitansi is already in use.'])->withInput();
        }

        // Create relationships
        foreach ($request->batch_kwitansi_ids as $batch_kwitansi_id) {
            BatchKwitansiProjectKwitansi::create([
                'batch_kwitansi_id' => $batch_kwitansi_id,
                'project_kwitansi_id' => $request->project_kwitansi_id,
            ]);
        }

        return redirect()->route('projectKwitansis.index')->with('success', 'Relationships created successfully.');
    }

    public function edit($id)
    {
        $relationship = BatchKwitansiProjectKwitansi::findOrFail($id);
        $batchKwitansis = BatchKwitansi::with('uraianKwitansis')->get();
        $projectKwitansis = ProjectKwitansi::all();
        $selectedBatchKwitansiIds = BatchKwitansiProjectKwitansi::where('project_kwitansi_id', $relationship->project_kwitansi_id)
            ->pluck('batch_kwitansi_id')->toArray();

        return view('relationships.edit', compact('relationship', 'batchKwitansis', 'projectKwitansis', 'selectedBatchKwitansiIds'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'batch_kwitansi_ids' => 'required|array',
            'batch_kwitansi_ids.*' => 'exists:batch_kwitansis,id',
            'project_kwitansi_id' => 'required|exists:project_kwitansis,id',
        ]);

        $relationship = BatchKwitansiProjectKwitansi::findOrFail($id);

        // Remove existing relationships for the current project_kwitansi_id
        BatchKwitansiProjectKwitansi::where('project_kwitansi_id', $relationship->project_kwitansi_id)
            ->delete();

        // Create new relationships
        foreach ($request->batch_kwitansi_ids as $batch_kwitansi_id) {
            BatchKwitansiProjectKwitansi::create([
                'batch_kwitansi_id' => $batch_kwitansi_id,
                'project_kwitansi_id' => $request->project_kwitansi_id,
            ]);
        }

        // return redirect()->route('relationships.index')->with('success', 'Relationships updated successfully.');
        return redirect()->route('projectKwitansis.index')->with('success', 'Relationships updated successfully.');
    }

    public function destroy($id)
    {
        // Find the relationship by the given ID
        $relationship = BatchKwitansiProjectKwitansi::findOrFail($id);

        // Delete all relationships associated with the project_kwitansi_id
        BatchKwitansiProjectKwitansi::where('project_kwitansi_id', $relationship->project_kwitansi_id)
            ->delete();

        // return redirect()->route('relationships.index')->with('success', 'All relationships for the selected Project Kwitansi deleted successfully.');
        return redirect()->route('projectKwitansis.index')->with('success', 'All relationships for the selected Project Kwitansi deleted successfully.');
    }
}
