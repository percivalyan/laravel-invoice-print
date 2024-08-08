<?php

namespace App\Http\Controllers;

use App\Models\JenisPenawaran;
use App\Models\UraianJenisPekerjaanPenawaran;
use Illuminate\Http\Request;

class JenisPenawaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jenisPenawarans = JenisPenawaran::with('uraianJenisPekerjaanPenawaran')->get(); // Fixed relationship name
        return view('jenisPenawarans.index', compact('jenisPenawarans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $uraianJenisPekerjaan = UraianJenisPekerjaanPenawaran::all();
        return view('jenisPenawarans.create', compact('uraianJenisPekerjaan'));
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
            'uraian_jenis_pekerjaan_penawaran_id' => 'required|exists:uraian_jenis_pekerjaan_penawarans,id',
            'jenis_pekerjaan' => 'required|string',
            'quantitas' => 'nullable|integer',
            'unit' => 'nullable|string',
            'harga_satuan' => 'nullable|integer',
        ]);

        JenisPenawaran::create($request->all());

        return redirect()->route('jenisPenawarans.index')
                         ->with('success', 'Jenis Pekerjaan Penawaran created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JenisPenawaran  $jenisPenawaran
     * @return \Illuminate\Http\Response
     */
    public function show(JenisPenawaran $jenisPenawaran)
    {
        return view('jenisPenawarans.show', compact('jenisPenawaran'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JenisPenawaran  $jenisPenawaran
     * @return \Illuminate\Http\Response
     */
    public function edit(JenisPenawaran $jenisPenawaran)
    {
        $uraianJenisPekerjaan = UraianJenisPekerjaanPenawaran::all();
        return view('jenisPenawarans.edit', compact('jenisPenawaran', 'uraianJenisPekerjaan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\JenisPenawaran  $jenisPenawaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JenisPenawaran $jenisPenawaran)
    {
        $request->validate([
            'uraian_jenis_pekerjaan_penawaran_id' => 'required|exists:uraian_jenis_pekerjaan_penawarans,id',
            'jenis_pekerjaan' => 'required|string',
            'quantitas' => 'nullable|integer',
            'unit' => 'nullable|string',
            'harga_satuan' => 'nullable|integer',
        ]);

        $jenisPenawaran->update($request->all());

        return redirect()->route('jenisPenawarans.index')
                         ->with('success', 'Jenis Pekerjaan Penawaran updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JenisPenawaran  $jenisPenawaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(JenisPenawaran $jenisPenawaran)
    {
        $jenisPenawaran->delete();
        return redirect()->route('jenisPenawarans.index')
                         ->with('success', 'Jenis Pekerjaan Penawaran deleted successfully.');
    }
}
