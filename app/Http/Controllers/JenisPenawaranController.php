<?php

namespace App\Http\Controllers;

use App\Models\JenisPenawaran;
use Illuminate\Http\Request;

class JenisPenawaranController extends Controller
{
    public function index()
    {
        $jenisPenawarans = JenisPenawaran::all();
        return view('jenisPenawarans.index', compact('jenisPenawarans'));
    }

    public function create()
    {
        return view('jenisPenawarans.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'jenis_pekerjaan' => 'required|string',
            'quantitas' => 'nullable|integer',
            'unit' => 'nullable|string',
            'harga_satuan' => 'nullable|integer',
        ]);

        JenisPenawaran::create($request->all());

        return redirect()->route('jenisPenawarans.index')->with('success', 'Jenis Penawaran created successfully.');
    }

    public function show(JenisPenawaran $jenisPenawaran)
    {
        return view('jenisPenawarans.show', compact('jenisPenawaran'));
    }

    public function edit(JenisPenawaran $jenisPenawaran)
    {
        return view('jenisPenawarans.edit', compact('jenisPenawaran'));
    }

    public function update(Request $request, JenisPenawaran $jenisPenawaran)
    {
        $request->validate([
            'jenis_pekerjaan' => 'required|string',
            'quantitas' => 'nullable|integer',
            'unit' => 'nullable|string',
            'harga_satuan' => 'nullable|integer',
        ]);

        $jenisPenawaran->update($request->all());

        return redirect()->route('jenisPenawarans.index')->with('success', 'Jenis Penawaran updated successfully.');
    }

    public function destroy(JenisPenawaran $jenisPenawaran)
    {
        $jenisPenawaran->penawarans()->detach();
        $jenisPenawaran->delete();
        return redirect()->route('jenisPenawarans.index')->with('success', 'Jenis Penawaran deleted successfully.');
    }
}
