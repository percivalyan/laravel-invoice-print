<?php

namespace App\Http\Controllers\Pembelian;

use App\Http\Controllers\Controller;
use App\Models\Pembelian\BahanPembelian;
use App\Models\Pembelian\ProjectPembelian;
use Illuminate\Http\Request;

class BahanPembelianController extends Controller
{
    /**
     * Display a listing of the Bahan Pembelian resources.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $projectPembelianId = $request->query('project_pembelian_id');
        $search = $request->query('search');

        // Build query to get Bahan Pembelian with optional filtering by project_pembelian_id and search
        $query = BahanPembelian::with('projectPembelian');

        if ($projectPembelianId) {
            $query->where('project_pembelian_id', $projectPembelianId);
        }

        if ($search) {
            // Perform search filtering on fields like 'pembelian' or any other relevant field
            $query->where('pembelian', 'like', '%' . $search . '%')
                ->orWhereHas('projectPembelian', function ($q) use ($search) {
                    $q->where('project', 'like', '%' . $search . '%')
                        ->orWhere('nomor_po', 'like', '%' . $search . '%');
                });
        }

        $bahanPembelians = $query->get();

        return view('bahanPembelians.index', compact('bahanPembelians', 'projectPembelianId', 'search'));
    }

    /**
     * Show the form for creating a new Bahan Pembelian resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // Retrieve the optional 'project_pembelian_id' query parameter
        $projectPembelianId = $request->query('project_pembelian_id');

        // Get all Project Pembelian records
        $projectPembelians = ProjectPembelian::all();

        return view('bahanPembelians.create', compact('projectPembelians', 'projectPembelianId'));
    }

    /**
     * Store a newly created Bahan Pembelian resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'project_pembelian_id' => 'required|exists:project_pembelians,id',
            'pembelian' => 'required|string|max:255',
        ]);

        // Create a new Bahan Pembelian record
        BahanPembelian::create($request->all());

        // Redirect to the index page with a success message
        return redirect()->route('bahanPembelians.index', ['project_pembelian_id' => $request->project_pembelian_id])
            ->with('success', 'Bahan Pembelian created successfully.');
    }

    /**
     * Display the specified Bahan Pembelian resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Find the Bahan Pembelian by ID and load related pembelians
        $bahanPembelian = BahanPembelian::with('pembelians')->findOrFail($id);

        return view('bahanPembelians.show', compact('bahanPembelian'));
    }

    /**
     * Show the form for editing the specified Bahan Pembelian resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Find the Bahan Pembelian by ID
        $bahanPembelian = BahanPembelian::findOrFail($id);
        $projectPembelianId = $bahanPembelian->project_pembelian_id;

        return view('bahanPembelians.edit', compact('bahanPembelian', 'projectPembelianId'));
    }

    /**
     * Update the specified Bahan Pembelian resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $request->validate([
            'project_pembelian_id' => 'required|exists:project_pembelians,id',
            'pembelian' => 'required|string|max:255',
        ]);

        // Find the Bahan Pembelian by ID and update it
        $bahanPembelian = BahanPembelian::findOrFail($id);
        $bahanPembelian->update($request->all());

        // Redirect to the index page with a success message
        return redirect()->route('bahanPembelians.index', ['project_pembelian_id' => $request->project_pembelian_id])
            ->with('success', 'Bahan Pembelian updated successfully.');
    }

    /**
     * Remove the specified Bahan Pembelian resource from storage.
     *
     * @param \App\Models\Pembelian\BahanPembelian $bahanPembelian
     * @return \Illuminate\Http\Response
     */
    public function destroy(BahanPembelian $bahanPembelian, Request $request)
    {
        // Delete the Bahan Pembelian record
        $bahanPembelian->delete();
    
        // Prepare to redirect with the project_pembelian_id if it exists
        $redirectRoute = route('bahanPembelians.index');
    
        // Check if project_pembelian_id is present in the request
        if ($request->has('project_pembelian_id')) {
            $redirectRoute = route('bahanPembelians.index', [
                'project_pembelian_id' => $request->input('project_pembelian_id')
            ]);
        }
    
        // Redirect to the index page with a success message
        return redirect($redirectRoute)
            ->with('success', 'Bahan Pembelian deleted successfully.');
    }
    
}
