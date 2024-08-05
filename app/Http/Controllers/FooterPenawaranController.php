<?php

namespace App\Http\Controllers;

use App\Models\FooterPenawaran;
use App\Models\ProjectPenawaran;
use Illuminate\Http\Request;

class FooterPenawaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $footerPenawarans = FooterPenawaran::with('projectPenawaran')->get();
        return view('footerPenawarans.index', compact('footerPenawarans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $project_penawaran_id = $request->query('project_penawaran_id');
        $projectPenawaran = ProjectPenawaran::find($project_penawaran_id);
        if (!$projectPenawaran) {
            return redirect()->route('footerPenawarans.index')
                             ->with('error', 'Invalid Project Penawaran ID.');
        }
        return view('footerPenawarans.create', compact('projectPenawaran'));
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
            'project_penawaran_id' => 'required|exists:project_penawarans,id|unique:footer_penawarans,project_penawaran_id',
            'nama' => 'nullable|string|max:255',
            'jabatan' => 'nullable|string|max:255',
        ]);

        FooterPenawaran::create($request->all());

        return redirect()->route('footerPenawarans.index')
                         ->with('success', 'Footer Penawaran created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FooterPenawaran  $footerPenawaran
     * @return \Illuminate\Http\Response
     */
    public function show(FooterPenawaran $footerPenawaran)
    {
        return view('footerPenawarans.show', compact('footerPenawaran'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FooterPenawaran  $footerPenawaran
     * @return \Illuminate\Http\Response
     */
    public function edit(FooterPenawaran $footerPenawaran)
    {
        $projectPenawarans = ProjectPenawaran::all();
        return view('footerPenawarans.edit', compact('footerPenawaran', 'projectPenawarans'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FooterPenawaran  $footerPenawaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FooterPenawaran $footerPenawaran)
    {
        $request->validate([
            'nama' => 'nullable|string|max:255',
            'jabatan' => 'nullable|string|max:255',
        ]);

        $footerPenawaran->update($request->all());

        return redirect()->route('footerPenawarans.index')
                         ->with('success', 'Footer Penawaran updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FooterPenawaran  $footerPenawaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(FooterPenawaran $footerPenawaran)
    {
        $footerPenawaran->delete();

        return redirect()->route('footerPenawarans.index')
                         ->with('success', 'Footer Penawaran deleted successfully.');
    }
}
