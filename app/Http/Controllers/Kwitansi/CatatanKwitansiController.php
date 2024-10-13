<?php

namespace App\Http\Controllers\Kwitansi;

use App\Http\Controllers\Controller;
use App\Models\Kwitansi\CatatanKwitansi;
use App\Models\Kwitansi\ProjectKwitansi;
use Illuminate\Http\Request;

class CatatanKwitansiController extends Controller
{
    // Display a listing of the resource
    public function index()
    {
        $catatanKwitansis = CatatanKwitansi::with('projectKwitansi')->get();
        return view('catatanKwitansis.index', compact('catatanKwitansis'));
    }

    // Show the form for creating a new resource
    public function create(Request $request)
    {
        // Retrieve the project_kwitansi_id from the query parameters
        $project_kwitansi_id = $request->query('project_kwitansi_id');

        // Find the ProjectKwitansi by its ID
        $projectKwitansi = ProjectKwitansi::find($project_kwitansi_id);

        // If the ProjectKwitansi doesn't exist, redirect to the index with an error message
        if (!$projectKwitansi) {
            return redirect()->route('catatanKwitansis.index')
                ->with('error', 'Invalid Project Kwitansi ID.');
        }

        // Check if a CatatanKwitansi already exists for this project_kwitansi_id
        $existingRecord = CatatanKwitansi::where('project_kwitansi_id', $project_kwitansi_id)->first();

        // If a record exists, redirect to the index page
        if ($existingRecord) {
            return redirect()->route('catatanKwitansis.show', $existingRecord->id)
                ->with('info', 'Catatan Kwitansi already exists for this project.');
        }

        // If no record exists, show the create form
        return view('catatanKwitansis.create', compact('projectKwitansi'));
    }

    // Store a newly created resource in storage
    public function store(Request $request)
    {
        $request->validate([
            'project_kwitansi_id' => 'required|exists:project_kwitansis,id',
            'bank_pembayaran' => 'nullable|string',
            'cabang' => 'nullable|string',
            'nomor_rekening' => 'nullable|string',
            'atas_nama' => 'nullable|string',
            'penanggung_jawab' => 'nullable|string',
            'nama_penerima' => 'nullable|string',
            'tanggal_diterima_penerima' => 'nullable|date',
            'waktu_diterima_penerima' => 'nullable|date_format:H:i',
            'nama_driver' => 'nullable|string',
            'tanggal_diterima_driver' => 'nullable|date',
            'waktu_diterima_driver' => 'nullable|date_format:H:i',
            'nama_adm_kantor' => 'nullable|string',
            'tanggal_diterima_adm_kantor' => 'nullable|date',
            'waktu_diterima_adm_kantor' => 'nullable|date_format:H:i',
        ]);

        // CatatanKwitansi::create($request->all());
        $catatanKwitansi = CatatanKwitansi::create($request->all());

        return redirect()->route('catatanKwitansis.show', $catatanKwitansi->id)
            ->with('success', 'Catatan Kwitansi created successfully.');
    }

    // Show the specified resource
    public function show($id)
    {
        $catatanKwitansi = CatatanKwitansi::find($id);

        if (!$catatanKwitansi) {
            return redirect()->route('catatanKwitansis.index')
                ->with('error', 'Catatan Kwitansi not found.');
        }

        return view('catatanKwitansis.show', compact('catatanKwitansi'));
    }

    // Show the form for editing the specified resource
    // public function edit(CatatanKwitansi $catatanKwitansi)
    // {
    //     $projectKwitansis = ProjectKwitansi::all();
    //     return view('catatanKwitansis.edit', compact('catatanKwitansi', 'projectKwitansis'));
    // }

    public function edit(CatatanKwitansi $catatanKwitansi)
    {
        // Retrieve the specific ProjectKwitansi associated with the CatatanKwitansi
        $projectKwitansi = ProjectKwitansi::findOrFail($catatanKwitansi->project_kwitansi_id);

        // Pass the specific ProjectKwitansi instance to the view
        return view('catatanKwitansis.edit', compact('catatanKwitansi', 'projectKwitansi'));
    }


    // Update the specified resource in storage
    // public function update(Request $request, CatatanKwitansi $catatanKwitansi)
    // {
    //     $request->validate([
    //         'project_kwitansi_id' => 'required|exists:project_kwitansis,id',
    //         'bank_pembayaran' => 'nullable|string',
    //         'cabang' => 'nullable|string',
    //         'nomor_rekening' => 'nullable|string',
    //         'atas_nama' => 'nullable|string',
    //         'penanggung_jawab' => 'nullable|string',
    //         'nama_penerima' => 'nullable|string',
    //         'tanggal_diterima_penerima' => 'nullable|date',
    //         'waktu_diterima_penerima' => 'nullable|date_format:H:i',
    //         'nama_driver' => 'nullable|string',
    //         'tanggal_diterima_driver' => 'nullable|date',
    //         'waktu_diterima_driver' => 'nullable|date_format:H:i',
    //         'nama_adm_kantor' => 'nullable|string',
    //         'tanggal_diterima_adm_kantor' => 'nullable|date',
    //         'waktu_diterima_adm_kantor' => 'nullable|date_format:H:i',
    //     ]);

    //     $catatanKwitansi->update($request->all());

    //     return redirect()->route('catatanKwitansis.index')->with('success', 'Catatan Kwitansi updated successfully.');
    // }

    public function update(Request $request, CatatanKwitansi $catatanKwitansi)
    {
        // Validate the request data
        $request->validate([
            'project_kwitansi_id' => 'required|exists:project_kwitansis,id',
            'bank_pembayaran' => 'nullable|string',
            'cabang' => 'nullable|string',
            'nomor_rekening' => 'nullable|string',
            'atas_nama' => 'nullable|string',
            'penanggung_jawab' => 'nullable|string',
            'nama_penerima' => 'nullable|string',
            'tanggal_diterima_penerima' => 'nullable|date',
            'waktu_diterima_penerima' => 'nullable|date_format:H:i',
            'nama_driver' => 'nullable|string',
            'tanggal_diterima_driver' => 'nullable|date',
            'waktu_diterima_driver' => 'nullable|date_format:H:i',
            'nama_adm_kantor' => 'nullable|string',
            'tanggal_diterima_adm_kantor' => 'nullable|date',
            'waktu_diterima_adm_kantor' => 'nullable|date_format:H:i',
        ]);

        // Update the CatatanKwitansi record with validated data
        $catatanKwitansi->update($request->all());

        // Redirect with success message
        return redirect()->route('catatanKwitansis.show', $catatanKwitansi->id)->with('success', 'Catatan Kwitansi updated successfully.');
    }


    // Remove the specified resource from storage
    public function destroy(CatatanKwitansi $catatanKwitansi)
    {
        $catatanKwitansi->delete();
        return redirect()->route('catatanKwitansis.index')->with('success', 'Catatan Kwitansi deleted successfully.');
    }
}
