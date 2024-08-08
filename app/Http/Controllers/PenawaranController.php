<?php

namespace App\Http\Controllers;

use App\Models\Penawaran;
use App\Models\ProjectPenawaran;
use App\Models\JenisPenawaran;
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
        $penawarans = Penawaran::with('projectPenawaran', 'jenisPekerjaanPenawaran')->get();
        return view('penawarans.index', compact('penawarans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $projects = ProjectPenawaran::all();
        $jenisPekerjaan = JenisPenawaran::all();
        return view('penawarans.create', compact('projects', 'jenisPekerjaan'));
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
            'project_penawaran_id' => 'required|exists:project_penawarans,id',
            'jenis_pekerjaan_penawaran_id' => 'required|exists:jenis_pekerjaan_penawarans,id',
            'pekerjaan' => 'required|string',
            'quantitas' => 'nullable|integer',
            'unit' => 'nullable|string',
            'harga_satuan' => 'nullable|integer',
        ]);

        Penawaran::create($request->all());

        return redirect()->route('penawarans.index')->with('success', 'Penawaran created successfully.');
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
        $projects = ProjectPenawaran::all();
        $jenisPekerjaan = JenisPenawaran::all();
        return view('penawarans.edit', compact('penawaran', 'projects', 'jenisPekerjaan'));
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
            'project_penawaran_id' => 'required|exists:project_penawarans,id',
            'jenis_pekerjaan_penawaran_id' => 'required|exists:jenis_pekerjaan_penawarans,id',
            'pekerjaan' => 'required|string',
            'quantitas' => 'nullable|integer',
            'unit' => 'nullable|string',
            'harga_satuan' => 'nullable|integer',
        ]);

        $penawaran->update($request->all());

        return redirect()->route('penawarans.index')->with('success', 'Penawaran updated successfully.');
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
        return redirect()->route('penawarans.index')->with('success', 'Penawaran deleted successfully.');
    }
}
