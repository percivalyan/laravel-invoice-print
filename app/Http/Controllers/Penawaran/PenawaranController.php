<?php

namespace App\Http\Controllers\Penawaran;

use App\Http\Controllers\Controller;
use App\Models\Penawaran\ProjectPenawaran;
use App\Models\Penawaran\Penawaran; // Pastikan model ini ada
use App\Models\Penawaran\JenisPenawaran; // Pastikan model ini ada
use Illuminate\Http\Request;

class PenawaranController extends Controller
{
    public function index(Request $request)
    {
        $projectPenawaranId = $request->input('project_penawaran_id');
        $penawarans = Penawaran::with('projectPenawaran', 'jenisPenawarans');

        if ($projectPenawaranId) {
            $penawarans->where('project_penawaran_id', $projectPenawaranId);
        }

        return view('penawarans.index', ['penawarans' => $penawarans->get()]);
    }



    public function create(Request $request)
    {
        $projects = ProjectPenawaran::all();
        $jenisPenawarans = JenisPenawaran::all();

        // Cek jika project_penawaran_id diberikan dan cari proyek yang sesuai
        $selectedProjectId = $request->input('project_penawaran_id');
        $selectedProject = $projects->find($selectedProjectId); // Mencari proyek berdasarkan ID

        return view('penawarans.create', compact('projects', 'jenisPenawarans', 'selectedProjectId', 'selectedProject'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'project_penawaran_id' => 'required|exists:project_penawarans,id',
            'pekerjaan' => 'required|string',
            'jenis_penawaran_ids' => 'array|exists:jenis_penawarans,id', // Validation for many-to-many relationship
        ]);

        $penawaran = Penawaran::create($request->only(['project_penawaran_id', 'pekerjaan']));
        $penawaran->jenisPenawarans()->attach($request->jenis_penawaran_ids);

        // Redirect to the index with project_penawaran_id
        return redirect()->route('penawarans.index', ['project_penawaran_id' => $request->project_penawaran_id])
            ->with('success', 'Penawaran created successfully.');
    }

    public function show(Penawaran $penawaran)
    {
        $penawaran->load('projectPenawaran', 'jenisPenawarans');

        // Menampilkan semua penawaran dalam pekerjaan yang sama
        $relatedPenawarans = Penawaran::where('project_penawaran_id', $penawaran->project_penawaran_id)->get();

        return view('penawarans.show', compact('penawaran', 'relatedPenawarans'));
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
            'jenis_penawaran_ids' => 'array|exists:jenis_penawarans,id', // Validation for many-to-many relationship
        ]);

        $penawaran->update($request->only(['project_penawaran_id', 'pekerjaan']));
        $penawaran->jenisPenawarans()->sync($request->jenis_penawaran_ids);

        return redirect()->route('penawarans.index', ['project_penawaran_id' => $request->project_penawaran_id])
            ->with('success', 'Penawaran created successfully.');
    }

    public function destroy(Penawaran $penawaran)
    {
        $penawaran->jenisPenawarans()->detach();
        $penawaran->delete();
        return redirect()->route('penawarans.index')->with('success', 'Penawaran deleted successfully.');
    }
}
