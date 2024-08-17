<?php

namespace App\Http\Controllers;

use App\Models\BahanPembelian;
use App\Models\Pembelian;
use Illuminate\Http\Request;

class BahanPembelianController extends Controller
{
    // public function index()
    // {
    //     $bahanPembelians = BahanPembelian::all();
    //     return view('bahanPembelians.index', compact('bahanPembelians'));
    // }

    public function index(Request $request)
    {
        // Mendapatkan pembelian_id dari query string, atau default ke null jika tidak ada
        $pembelian_id = $request->input('pembelian_id');

        // Mengambil data BahanPembelian yang sesuai dengan pembelian_id
        $bahanPembelians = BahanPembelian::where('project_pembelian_id', $pembelian_id)->get();

        // Mengirim data ke view
        return view('bahanPembelians.index', compact('bahanPembelians'));
    }

    // public function create(Request $request)
    // {
    //     // return view('bahanPembelians.create');
    //     $pembelian_id = $request->query('pembelian_id');
    //     $pembelian = Pembelian::find($pembelian_id);
    //     if (!$pembelian) {
    //         return redirect()->route('bahanPembelians.index')
    //                          ->with('error', 'Invalid ID.');
    //     }
    //     return view('bahanPembelians.create', compact('pembelian'));
    // }
    public function create(Request $request)
    {
        // Mendapatkan project_pembelian_id dari URL atau request
        $projectPembelianId = $request->input('pembelian_id');

        // Kirim project_pembelian_id ke view create
        return view('bahanPembelians.create', compact('projectPembelianId'));
    }


    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'pembelian' => 'required|string|max:255',
            'project_pembelian_id' => 'required|integer'
        ]);

        // Menyimpan data baru
        BahanPembelian::create([
            'pembelian' => $request->input('pembelian'),
            'project_pembelian_id' => $request->input('project_pembelian_id'),
        ]);

        // Redirect ke halaman index dengan pembelian_id yang sama
        return redirect()->route('bahanPembelians.index', ['pembelian_id' => $request->input('project_pembelian_id')])
            ->with('success', 'Bahan Pembelian created successfully.');
    }

    public function show(BahanPembelian $bahanPembelian)
    {
        return view('bahanPembelians.show', compact('bahanPembelian'));
    }

    public function edit(BahanPembelian $bahanPembelian)
    {
        $pembelians = Pembelian::all();
        return view('bahanPembelians.edit', compact('bahanPembelian', 'pembelians'));
    }

    public function update(Request $request, BahanPembelian $bahanPembelian)
    {
        // Validasi data
        $request->validate([
            'pembelian' => 'required|string|max:255',
            'project_pembelian_id' => 'required|integer'
        ]);

        // Mengupdate data
        $bahanPembelian->update([
            'pembelian' => $request->input('pembelian'),
            'project_pembelian_id' => $request->input('project_pembelian_id'),
        ]);

        // Redirect ke halaman index dengan pembelian_id yang sama
        return redirect()->route('bahanPembelians.index', ['pembelian_id' => $request->input('project_pembelian_id')])
            ->with('success', 'Bahan Pembelian updated successfully.');
    }

    public function destroy(BahanPembelian $bahanPembelian, Request $request)
    {
        // Simpan project_pembelian_id dari query string
        $projectPembelianId = $request->input('pembelian_id');

        // Hapus data
        $bahanPembelian->delete();

        // Redirect ke halaman index dengan pembelian_id yang sama
        return redirect()->route('bahanPembelians.index', ['pembelian_id' => $projectPembelianId])
            ->with('success', 'Bahan Pembelian deleted successfully.');
    }
}
