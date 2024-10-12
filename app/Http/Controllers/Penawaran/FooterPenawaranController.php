<?php

namespace App\Http\Controllers\Penawaran;

use App\Http\Controllers\Controller;
use App\Models\Penawaran\FooterPenawaran;
use App\Models\Penawaran\ProjectPenawaran;
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
            return redirect()->route('projectPenawarans.index')
                             ->with('error', 'Invalid Project Penawaran ID.');
        }

        // Check if a FooterPenawaran already exists for the project_penawaran_id
        $footerPenawaran = FooterPenawaran::where('project_penawaran_id', $project_penawaran_id)->first();
        
        if ($footerPenawaran) {
            // Redirect to the edit page if it exists
            return redirect()->route('footerPenawarans.edit', $footerPenawaran->id)
                             ->with('info', 'Footer Penawaran already exists. You can edit it.');
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

        return redirect()->route('projectPenawarans.index')
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
            'project_penawaran_id' => 'required|exists:project_penawarans,id', // Make sure project_penawaran_id is an integer and exists
            'nama' => 'nullable|string|max:255',
            'jabatan' => 'nullable|string|max:255',
        ]);
    
        // Update only validated fields
        $footerPenawaran->update($request->only(['project_penawaran_id', 'nama', 'jabatan']));
    
        return redirect()->route('projectPenawarans.index')
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
