<?php

namespace App\Http\Controllers;

use App\Models\UraianJenisPekerjaanPenawaran;
use App\Models\JenisPenawaran;
use Illuminate\Http\Request;

class UraianJenisPekerjaanPenawaranController extends Controller
{
    public function index()
    {
        $uraianJenisPekerjaanPenawarans = UraianJenisPekerjaanPenawaran::with('jenisPenawaran')->get();
        return view('uraianJenisPekerjaanPenawarans.index', compact('uraianJenisPekerjaanPenawarans'));
    }

    public function create()
    {
        $jenisPenawarans = JenisPenawaran::all();
        return view('uraianJenisPekerjaanPenawarans.create', compact('jenisPenawarans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'jenis_penawaran_id' => 'required|exists:jenis_penawarans,id',
            'uraian' => 'required|string',
            'jenis_pekerjaan' => 'required|string',
            'quantitas' => 'nullable|integer',
            'unit' => 'nullable|string',
            'harga_satuan' => 'nullable|integer',
        ]);

        UraianJenisPekerjaanPenawaran::create($request->all());
        return redirect()->route('uraianJenisPekerjaanPenawarans.index')->with('success', 'Uraian Jenis Pekerjaan Penawaran created successfully.');
    }

    public function show(UraianJenisPekerjaanPenawaran $uraianJenisPekerjaanPenawaran)
    {
        return view('uraianJenisPekerjaanPenawarans.show', compact('uraianJenisPekerjaanPenawaran'));
    }

    public function edit(UraianJenisPekerjaanPenawaran $uraianJenisPekerjaanPenawaran)
    {
        $jenisPenawarans = JenisPenawaran::all();
        return view('uraianJenisPekerjaanPenawarans.edit', compact('uraianJenisPekerjaanPenawaran', 'jenisPenawarans'));
    }

    public function update(Request $request, UraianJenisPekerjaanPenawaran $uraianJenisPekerjaanPenawaran)
    {
        $request->validate([
            'jenis_penawaran_id' => 'required|exists:jenis_penawarans,id',
            'uraian' => 'required|string',
            'jenis_pekerjaan' => 'required|string',
            'quantitas' => 'nullable|integer',
            'unit' => 'nullable|string',
            'harga_satuan' => 'nullable|integer',
        ]);

        $uraianJenisPekerjaanPenawaran->update($request->all());
        return redirect()->route('uraianJenisPekerjaanPenawarans.index')->with('success', 'Uraian Jenis Pekerjaan Penawaran updated successfully.');
    }

    public function destroy(UraianJenisPekerjaanPenawaran $uraianJenisPekerjaanPenawaran)
    {
        $uraianJenisPekerjaanPenawaran->delete();
        return redirect()->route('uraianJenisPekerjaanPenawarans.index')->with('success', 'Uraian Jenis Pekerjaan Penawaran deleted successfully.');
    }
}
