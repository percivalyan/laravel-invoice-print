<?php

namespace App\Http\Controllers\Pembelian;

use App\Http\Controllers\Controller;
use App\Models\Pembelian\Pembelian;
use App\Models\Pembelian\BahanPembelian;
use Illuminate\Http\Request;

class PembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $bahanPembelianId = $request->query('bahan_pembelian_id');

        $query = Pembelian::with('bahanPembelian');

        if ($bahanPembelianId) {
            $query->where('bahan_pembelian_id', $bahanPembelianId);
        }

        $pembelians = $query->get();

        return view('pembelians.index', compact('pembelians', 'bahanPembelianId'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $bahanPembelianId = $request->query('bahan_pembelian_id');
        return view('pembelians.create', compact('bahanPembelianId'));
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
            'nama_bahan' => 'required',
            'jumlah' => 'required|numeric',
            'harga_satuan' => 'required|numeric',
            'keterangan' => 'nullable',
            'bahan_pembelian_id' => 'required|exists:bahan_pembelians,id'
        ]);

        Pembelian::create($request->all());

        return redirect()->route('pembelians.index', ['bahan_pembelian_id' => $request->bahan_pembelian_id])
            ->with('success', 'Pembelian created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pembelian  $pembelian
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pembelian = Pembelian::findOrFail($id);
        $bahanPembelianId = $pembelian->bahan_pembelian_id;

        return view('pembelians.edit', compact('pembelian', 'bahanPembelianId'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pembelian  $pembelian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_bahan' => 'required',
            'jumlah' => 'required|numeric',
            'harga_satuan' => 'required|numeric',
            'keterangan' => 'nullable',
            'bahan_pembelian_id' => 'required|exists:bahan_pembelians,id'
        ]);

        $pembelian = Pembelian::findOrFail($id);
        $pembelian->update($request->all());

        return redirect()->route('pembelians.index', ['bahan_pembelian_id' => $request->bahan_pembelian_id])
            ->with('success', 'Pembelian updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pembelian  $pembelian
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pembelian $pembelian, Request $request)
    {
        // Hapus record Pembelian
        $pembelian->delete();

        // Siapkan untuk redirect dengan bahan_pembelian_id jika ada
        $redirectRoute = route('pembelians.index');

        // Cek apakah bahan_pembelian_id ada dalam permintaan
        if ($request->has('bahan_pembelian_id')) {
            $redirectRoute = route('pembelians.index', [
                'bahan_pembelian_id' => $request->input('bahan_pembelian_id')
            ]);
        }

        // Redirect ke halaman index dengan pesan sukses
        return redirect($redirectRoute)
            ->with('success', 'Pembelian deleted successfully.');
    }
}
