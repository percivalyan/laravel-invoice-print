<?php

namespace App\Http\Controllers;

use App\Models\ProjectPenawaran;
use Illuminate\Http\Request;

class ProjectPenawaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projectPenawarans = ProjectPenawaran::all();
        return view('projectPenawarans.index', compact('projectPenawarans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('projectPenawarans.create');
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
            'kepada' => 'nullable|string|max:255',
            'nomor' => 'nullable|string|max:255',
            'tanggal' => 'nullable|date',
            'proyek' => 'nullable|string|max:255',
            'lokasi' => 'nullable|string|max:255',
        ]);

        ProjectPenawaran::create($request->all());

        return redirect()->route('projectPenawarans.index')
                         ->with('success', 'Project Penawaran created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProjectPenawaran  $projectPenawaran
     * @return \Illuminate\Http\Response
     */
    public function show(ProjectPenawaran $projectPenawaran)
    {
        $projectPenawaran->load('tujuanPenawaran', 'footerPenawaran', 'penawaran.jenisPenawarans.uraianJenisPekerjaanPenawarans.jenisPenawaran',); // Load related tujuanPenawaran
        return view('projectPenawarans.show', compact('projectPenawaran'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProjectPenawaran  $projectPenawaran
     * @return \Illuminate\Http\Response
     */
    public function edit(ProjectPenawaran $projectPenawaran)
    {
        return view('projectPenawarans.edit', compact('projectPenawaran'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProjectPenawaran  $projectPenawaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProjectPenawaran $projectPenawaran)
    {
        $request->validate([
            'kepada' => 'nullable|string|max:255',
            'nomor' => 'nullable|string|max:255',
            'tanggal' => 'nullable|date',
            'proyek' => 'nullable|string|max:255',
            'lokasi' => 'nullable|string|max:255',
        ]);

        $projectPenawaran->update($request->all());

        return redirect()->route('projectPenawarans.index')
                         ->with('success', 'Project Penawaran updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProjectPenawaran  $projectPenawaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProjectPenawaran $projectPenawaran)
    {
        $projectPenawaran->delete();

        return redirect()->route('projectPenawarans.index')
                         ->with('success', 'Project Penawaran deleted successfully.');
    }

    // public function invoice(ProjectPenawaran $projectPenawaran)
    // {
    //     return view('projectPenawarans.invoice'); // Menampilkan halaman pewarnaan.blade.php
    // }
}
