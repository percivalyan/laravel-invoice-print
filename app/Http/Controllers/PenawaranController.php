<?php

namespace App\Http\Controllers;

use App\Models\Penawaran;
use App\Models\ProjectPenawaran;
use Illuminate\Http\Request;

class PenawaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penawarans = Penawaran::with('projectPenawaran')->get();
        return view('penawarans.index', compact('penawarans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $projectPenawarans = ProjectPenawaran::all();
        return view('penawarans.create', compact('projectPenawarans'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'project_penawaran_id' => 'required|exists:project_penawarans,id|unique:penawarans,project_penawaran_id',
            'uraian' => 'nullable|string|max:255',
            'qty' => 'nullable|numeric',
            'unit' => 'nullable|string|max:50',
            'harga_satuan' => 'nullable|numeric',
            'jumlah' => 'nullable|numeric',
            'total' => 'nullable|numeric',
            'terbilang' => 'nullable|string',
        ]);

        Penawaran::create($request->all());

        return redirect()->route('penawarans.index')
                         ->with('success', 'Penawaran created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Penawaran  $penawaran
     * @return \Illuminate\Http\Response
     */
    public function show(Penawaran $penawaran)
    {
        return view('penawarans.show', compact('penawaran'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Penawaran  $penawaran
     * @return \Illuminate\Http\Response
     */
    public function edit(Penawaran $penawaran)
    {
        $projectPenawarans = ProjectPenawaran::all();
        return view('penawarans.edit', compact('penawaran', 'projectPenawarans'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Penawaran  $penawaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Penawaran $penawaran)
    {
        $request->validate([
            'project_penawaran_id' => 'required|exists:project_penawarans,id|unique:penawarans,project_penawaran_id,' . $penawaran->id,
            'uraian' => 'nullable|string|max:255',
            'qty' => 'nullable|numeric',
            'unit' => 'nullable|string|max:50',
            'harga_satuan' => 'nullable|numeric',
            'jumlah' => 'nullable|numeric',
            'total' => 'nullable|numeric',
            'terbilang' => 'nullable|string',
        ]);

        $penawaran->update($request->all());

        return redirect()->route('penawarans.index')
                         ->with('success', 'Penawaran updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Penawaran  $penawaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penawaran $penawaran)
    {
        $penawaran->delete();

        return redirect()->route('penawarans.index')
                         ->with('success', 'Penawaran deleted successfully.');
    }
}
