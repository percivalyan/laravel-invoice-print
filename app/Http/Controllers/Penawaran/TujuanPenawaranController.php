<?php

namespace App\Http\Controllers\Penawaran;

use App\Http\Controllers\Controller;
use App\Models\Penawaran\ProjectPenawaran;
use App\Models\Penawaran\TujuanPenawaran; // Pastikan model ini ada
use Illuminate\Http\Request;

class TujuanPenawaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tujuanPenawarans = TujuanPenawaran::with('projectPenawaran')->get();
        return view('tujuanPenawarans.index', compact('tujuanPenawarans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     $projectPenawarans = ProjectPenawaran::all();
    //     return view('tujuanPenawarans.create', compact('projectPenawarans'));
    // }

    public function create(Request $request)
    {
        $project_penawaran_id = $request->query('project_penawaran_id');
        $projectPenawaran = ProjectPenawaran::find($project_penawaran_id);

        if (!$projectPenawaran) {
            return redirect()->route('projectPenawarans.index')
                ->with('error', 'Invalid Project Penawaran ID.');
        }

        // Check if a TujuanPenawaran already exists for the project_penawaran_id
        $tujuanPenawaran = TujuanPenawaran::where('project_penawaran_id', $project_penawaran_id)->first();

        if ($tujuanPenawaran) {
            // Redirect to the edit page if it exists
            return redirect()->route('tujuanPenawarans.edit', $tujuanPenawaran->id)
                ->with('info', 'Tujuan Penawaran already exists. You can edit it.');
        }

        return view('tujuanPenawarans.create', compact('projectPenawaran'));
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
            'project_penawaran_id' => 'required|exists:project_penawarans,id|unique:tujuan_penawarans,project_penawaran_id',
            'pengajuan' => 'nullable|string|max:255',
            'tujuan' => 'nullable|string|max:255',
        ]);

        TujuanPenawaran::create($request->all());

        return redirect()->route('projectPenawarans.index')
            ->with('success', 'Tujuan Penawaran created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TujuanPenawaran  $tujuanPenawaran
     * @return \Illuminate\Http\Response
     */
    public function show(TujuanPenawaran $tujuanPenawaran)
    {
        return view('tujuanPenawarans.show', compact('tujuanPenawaran'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TujuanPenawaran  $tujuanPenawaran
     * @return \Illuminate\Http\Response
     */
    public function edit(TujuanPenawaran $tujuanPenawaran)
    {
        $projectPenawarans = ProjectPenawaran::all();
        return view('tujuanPenawarans.edit', compact('tujuanPenawaran', 'projectPenawarans'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TujuanPenawaran  $tujuanPenawaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TujuanPenawaran $tujuanPenawaran)
    {
        $request->validate([
            // 'project_penawaran_id' => 'required|exists:project_penawarans,id|unique:tujuan_penawarans,project_penawaran_id,' . $tujuanPenawaran->id,
            'pengajuan' => 'nullable|string|max:255',
            'tujuan' => 'nullable|string|max:255',
        ]);

        $tujuanPenawaran->update($request->all());

        return redirect()->route('projectPenawarans.index')
            ->with('success', 'Tujuan Penawaran updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TujuanPenawaran  $tujuanPenawaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(TujuanPenawaran $tujuanPenawaran)
    {
        $tujuanPenawaran->delete();

        return redirect()->route('tujuanPenawarans.index')
            ->with('success', 'Tujuan Penawaran deleted successfully.');
    }
}
