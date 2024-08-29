<?php

namespace App\Http\Controllers;

use App\Models\PekerjaanKwitansi;
use Illuminate\Http\Request;

class PekerjaanKwitansiController extends Controller
{
    /**
     * Display a listing of the resource for a specific project.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $projectKwitansiId = $request->query("project_kwitansi_id");

        $query = PekerjaanKwitansi::with("projectKwitansi");
        if ($projectKwitansiId) {
            $query->where("project_kwitansi_id", $projectKwitansiId);
        }

        $pekerjaanKwitansis = $query->get();

        return view('pekerjaanKwitansis.index', compact('pekerjaanKwitansis', 'projectKwitansiId'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $projectKwitansiId = $request->query("project_kwitansi_id");
        return view('pekerjaanKwitansis.create', compact('projectKwitansiId'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'project_kwitansi_id' => 'required|exists:project_kwitansis,id',
            'pekerjaan' => 'nullable|string|max:255',
        ]);

        PekerjaanKwitansi::create($request->all());
        return redirect()->route('pekerjaanKwitansis.index', ['project_kwitansi_id' => $request->project_kwitansi_id])
            ->with('success', 'Pekerjaan Kwitansi created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pekerjaanKwitansi = PekerjaanKwitansi::findOrFail($id);
        $projectKwitansiId = $pekerjaanKwitansi->project_kwitansi_id;

        return view('pekerjaanKwitansis.edit', compact('pekerjaanKwitansi', 'projectKwitansiId'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'project_kwitansi_id' => 'required|exists:project_kwitansis,id',
            'pekerjaan' => 'nullable|string|max:255',
        ]);

        $pekerjaanKwitansi = PekerjaanKwitansi::findOrFail($id);
        $pekerjaanKwitansi->update($request->all());
        return redirect()->route('pekerjaanKwitansis.index', ['project_kwitansi_id' => $request->project_kwitansi_id])
            ->with('success', 'Pekerjaan Kwitansi updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Find the Pekerjaan Kwitansi by its ID and delete it
        $pekerjaanKwitansi = PekerjaanKwitansi::findOrFail($id);

        // Retrieve the project_kwitansi_id before deletion
        $projectKwitansiId = $pekerjaanKwitansi->project_kwitansi_id;

        // Delete the Pekerjaan Kwitansi
        $pekerjaanKwitansi->delete();

        // Redirect back to the Pekerjaan Kwitansi list with the appropriate project_kwitansi_id
        return redirect()->route('pekerjaanKwitansis.index', ['project_kwitansi_id' => $projectKwitansiId])
            ->with('success', 'Pekerjaan Kwitansi deleted successfully.');
    }
}
