<?php

namespace App\Http\Controllers;

use App\Models\BahanPembelian;
use App\Models\ProjectPembelian;
use App\Models\Pembelian;
use Illuminate\Http\Request;

class BahanPembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     $bahanPembelians = BahanPembelian::with('projectPembelian')->get();
    //     return view('bahanPembelians.index', compact('bahanPembelians'));
    // }

    public function index(Request $request)
    {
        $projectPembelianId = $request->query('project_pembelian_id');

        $query = BahanPembelian::with('projectPembelian');

        if ($projectPembelianId) {
            $query->where('project_pembelian_id', $projectPembelianId);
        }

        $bahanPembelians = $query->get();

        return view('bahanPembelians.index', compact('bahanPembelians', 'projectPembelianId'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // Retrieve the optional 'project_pembelian_id' query parameter
        $projectPembelianId = $request->query('project_pembelian_id');

        // Get all ProjectPembelian records
        $projectPembelians = ProjectPembelian::all();

        // Pass the data to the view, including the selected project_pembelian_id
        return view('bahanPembelians.create', compact('projectPembelians', 'projectPembelianId'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'project_pembelian_id' => 'required|exists:project_pembelians,id',
            'pembelian' => 'required|string|max:255',
        ]);

        // Create a new BahanPembelian record
        BahanPembelian::create($request->all());

        // Redirect to the index page with a success message, including the selected project_pembelian_id
        return redirect()->route('bahanPembelians.index', ['project_pembelian_id' => $request->project_pembelian_id])
            ->with('success', 'Bahan Pembelian created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BahanPembelian  $bahanPembelian
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bahanPembelian = BahanPembelian::with('pembelians')->findOrFail($id);

        return view('bahanPembelians.show', compact('bahanPembelian'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BahanPembelian  $bahanPembelian
     * @return \Illuminate\Http\Response
     */
    // public function edit(BahanPembelian $bahanPembelian)
    // {
    //     $projectPembelians = ProjectPembelian::all();
    //     return view('bahanPembelians.edit', compact('bahanPembelian', 'projectPembelians'));
    // }
    public function edit($id)
    {
        $bahanPembelian = BahanPembelian::findOrFail($id);
        $projectPembelianId = $bahanPembelian->project_pembelian_id;

        return view('bahanPembelians.edit', compact('bahanPembelian', 'projectPembelianId'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BahanPembelian  $bahanPembelian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'project_pembelian_id' => 'required|exists:project_pembelians,id',
            'pembelian' => 'required|string|max:255',
        ]);

        $bahanPembelian = BahanPembelian::findOrFail($id);
        $bahanPembelian->update($request->all());

        return redirect()->route('bahanPembelians.index', ['project_pembelian_id' => $request->project_pembelian_id])
            ->with('success', 'Bahan Pembelian updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BahanPembelian  $bahanPembelian
     * @return \Illuminate\Http\Response
     */
    public function destroy(BahanPembelian $bahanPembelian)
    {
        $bahanPembelian->delete();

        return redirect()->route('bahanPembelians.index')
            ->with('success', 'Bahan Pembelian deleted successfully.');
    }
}
