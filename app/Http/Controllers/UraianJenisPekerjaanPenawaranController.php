<?php

namespace App\Http\Controllers;

use App\Models\UraianJenisPekerjaanPenawaran;
use Illuminate\Http\Request;

class UraianJenisPekerjaanPenawaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $uraianJenisPekerjaanPenawarans = UraianJenisPekerjaanPenawaran::all();
        return view('uraianJenisPekerjaanPenawarans.index', compact('uraianJenisPekerjaanPenawarans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('uraianJenisPekerjaanPenawarans.create');
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
            'uraian' => 'required|string',
            'jenis_pekerjaan' => 'required|string',
            'quantitas' => 'nullable|integer',
            'unit' => 'nullable|string',
            'harga_satuan' => 'nullable|integer',
        ]);

        UraianJenisPekerjaanPenawaran::create($request->all());

        return redirect()->route('uraianJenisPekerjaanPenawarans.index')
                         ->with('success', 'Uraian Jenis Pekerjaan Penawaran created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UraianJenisPekerjaanPenawaran  $uraianJenisPekerjaanPenawaran
     * @return \Illuminate\Http\Response
     */
    public function show(UraianJenisPekerjaanPenawaran $uraianJenisPekerjaanPenawaran)
    {
        return view('uraianJenisPekerjaanPenawarans.show', compact('uraianJenisPekerjaanPenawaran'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UraianJenisPekerjaanPenawaran  $uraianJenisPekerjaanPenawaran
     * @return \Illuminate\Http\Response
     */
    public function edit(UraianJenisPekerjaanPenawaran $uraianJenisPekerjaanPenawaran)
    {
        return view('uraianJenisPekerjaanPenawarans.edit', compact('uraianJenisPekerjaanPenawaran'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UraianJenisPekerjaanPenawaran  $uraianJenisPekerjaanPenawaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UraianJenisPekerjaanPenawaran $uraianJenisPekerjaanPenawaran)
    {
        $request->validate([
            'uraian' => 'required|string',
            'jenis_pekerjaan' => 'required|string',
            'quantitas' => 'nullable|integer',
            'unit' => 'nullable|string',
            'harga_satuan' => 'nullable|integer',
        ]);

        $uraianJenisPekerjaanPenawaran->update($request->all());

        return redirect()->route('uraianJenisPekerjaanPenawarans.index')
                         ->with('success', 'Uraian Jenis Pekerjaan Penawaran updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UraianJenisPekerjaanPenawaran  $uraianJenisPekerjaanPenawaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(UraianJenisPekerjaanPenawaran $uraianJenisPekerjaanPenawaran)
    {
        $uraianJenisPekerjaanPenawaran->delete();
        return redirect()->route('uraianJenisPekerjaanPenawarans.index')
                         ->with('success', 'Uraian Jenis Pekerjaan Penawaran deleted successfully.');
    }
}
