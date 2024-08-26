<?php

namespace App\Http\Controllers;

use App\Models\ProjectKwitansi;
use App\Models\ProjectPembelian;
use Illuminate\Http\Request;

class ProjectKwitansiController extends Controller
{
    public function index()
    {
        $projectKwitansis = ProjectKwitansi::with('projectPembelian')->get();
        return view('projectKwitansis.index', compact('projectKwitansis'));
    }

    // Many To One
    // public function create()
    // {
    //     $projectPembelians = ProjectPembelian::all();
    //     return view('projectKwitansis.create', compact('projectPembelians'));
    // }

    // One To One
    public function create()
    {
        // Ambil ID ProjectPembelian yang sudah tertaut dengan ProjectKwitansi
        $usedProjectPembelianIds = ProjectKwitansi::pluck('project_pembelian_id')->toArray();

        // Ambil ProjectPembelian yang ID-nya tidak ada di $usedProjectPembelianIds
        $projectPembelians = ProjectPembelian::whereNotIn('id', $usedProjectPembelianIds)->get();

        return view('projectKwitansis.create', compact('projectPembelians'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'project_pembelian_id' => 'required|exists:project_pembelians,id',
            'kepada_yth' => 'nullable|string',
            'nomor_surat_jalan' => 'nullable|string',
            'nomor_invoice' => 'nullable|string',
            'nomor_bast' => 'nullable|string',
            'proyek' => 'nullable|string',
            'lokasi' => 'nullable|string',
            'kendaraan' => 'nullable|string',
            'nomor_polisi' => 'nullable|string',
            'tanggal_surat_jalan' => 'nullable|date',
        ]);

        ProjectKwitansi::create($request->all());

        return redirect()->route('projectKwitansis.index')->with('success', 'Kwitansi berhasil ditambahkan.');
    }

    public function show(ProjectKwitansi $projectKwitansi)
    {
        return view('projectKwitansis.show', compact('projectKwitansi'));
    }

    public function edit(ProjectKwitansi $projectKwitansi)
    {
        $projectPembelians = ProjectPembelian::all();
        return view('projectKwitansis.edit', compact('projectKwitansi', 'projectPembelians'));
    }

    public function update(Request $request, ProjectKwitansi $projectKwitansi)
    {
        $request->validate([
            'project_pembelian_id' => 'required|exists:project_pembelians,id',
            'kepada_yth' => 'nullable|string',
            'nomor_surat_jalan' => 'nullable|string',
            'nomor_invoice' => 'nullable|string',
            'nomor_bast' => 'nullable|string',
            'proyek' => 'nullable|string',
            'lokasi' => 'nullable|string',
            'kendaraan' => 'nullable|string',
            'nomor_polisi' => 'nullable|string',
            'tanggal_surat_jalan' => 'nullable|date',
        ]);

        $projectKwitansi->update($request->all());

        return redirect()->route('projectKwitansis.index')->with('success', 'Kwitansi berhasil diperbarui.');
    }

    public function destroy(ProjectKwitansi $projectKwitansi)
    {
        $projectKwitansi->delete();

        return redirect()->route('projectKwitansis.index')->with('success', 'Kwitansi berhasil dihapus.');
    }
}
