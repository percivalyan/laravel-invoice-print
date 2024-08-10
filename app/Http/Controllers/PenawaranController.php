<?php

namespace App\Http\Controllers;

use App\Models\Penawaran;
use App\Models\ProjectPenawaran;
use App\Models\JenisPenawaran;
use Illuminate\Http\Request;

class PenawaranController extends Controller
{
    public function index()
    {
        $penawarans = Penawaran::with('projectPenawaran', 'jenisPenawarans')->get();
        return view('penawarans.index', compact('penawarans'));
    }

    public function create()
    {
        $projects = ProjectPenawaran::all();
        $jenisPenawarans = JenisPenawaran::all();
        return view('penawarans.create', compact('projects', 'jenisPenawarans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'project_penawaran_id' => 'required|exists:project_penawarans,id',
            'pekerjaan' => 'required|string',
            'quantitas' => 'nullable|integer',
            'unit' => 'nullable|string',
            'harga_satuan' => 'nullable|integer',
            'jenis_penawaran_ids' => 'array|exists:jenis_penawarans,id', // Validation for many-to-many relationship
        ]);

        $penawaran = Penawaran::create($request->only(['project_penawaran_id', 'pekerjaan', 'quantitas', 'unit', 'harga_satuan']));
        $penawaran->jenisPenawarans()->attach($request->jenis_penawaran_ids);

        return redirect()->route('penawarans.index')->with('success', 'Penawaran created successfully.');
    }

    public function show(Penawaran $penawaran)
    {
        $penawaran->load('projectPenawaran', 'jenisPenawarans');
        return view('penawarans.show', compact('penawaran'));
    }

    public function edit(Penawaran $penawaran)
    {
        $projects = ProjectPenawaran::all();
        $jenisPenawarans = JenisPenawaran::all();
        return view('penawarans.edit', compact('penawaran', 'projects', 'jenisPenawarans'));
    }

    public function update(Request $request, Penawaran $penawaran)
    {
        $request->validate([
            'project_penawaran_id' => 'required|exists:project_penawarans,id',
            'pekerjaan' => 'required|string',
            'quantitas' => 'nullable|integer',
            'unit' => 'nullable|string',
            'harga_satuan' => 'nullable|integer',
            'jenis_penawaran_ids' => 'array|exists:jenis_penawarans,id', // Validation for many-to-many relationship
        ]);

        $penawaran->update($request->only(['project_penawaran_id', 'pekerjaan', 'quantitas', 'unit', 'harga_satuan']));
        $penawaran->jenisPenawarans()->sync($request->jenis_penawaran_ids);

        return redirect()->route('penawarans.index')->with('success', 'Penawaran updated successfully.');
    }

    public function destroy(Penawaran $penawaran)
    {
        $penawaran->jenisPenawarans()->detach();
        $penawaran->delete();
        return redirect()->route('penawarans.index')->with('success', 'Penawaran deleted successfully.');
    }
}
