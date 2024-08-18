<?php

namespace App\Http\Controllers;

use App\Models\Pembelian;
use Illuminate\Http\Request;

class PembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pembelians = Pembelian::all();
        return view('pembelians.index', compact('pembelians'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pembelians.create');
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
            'bahan_pembelian_id' => 'required|exists:BahanPembelians,id',
            'nama_bahan' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
            'jumlah' => 'required|integer',
            'harga_satuan' => 'required|numeric',
        ]);

        Pembelian::create($request->all());

        return redirect()->route('pembelians.index')
                         ->with('success', 'Pembelian created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pembelian  $pembelian
     * @return \Illuminate\Http\Response
     */
    public function show(Pembelian $pembelian)
    {
        return view('pembelians.show', compact('pembelian'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pembelian  $pembelian
     * @return \Illuminate\Http\Response
     */
    public function edit(Pembelian $pembelian)
    {
        return view('pembelians.edit', compact('pembelian'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pembelian  $pembelian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pembelian $pembelian)
    {
        $request->validate([
            'bahan_pembelian_id' => 'required|exists:BahanPembelians,id',
            'nama_bahan' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
            'jumlah' => 'required|integer',
            'harga_satuan' => 'required|numeric',
        ]);

        $pembelian->update($request->all());

        return redirect()->route('pembelians.index')
                         ->with('success', 'Pembelian updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pembelian  $pembelian
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pembelian $pembelian)
    {
        $pembelian->delete();

        return redirect()->route('pembelians.index')
                         ->with('success', 'Pembelian deleted successfully.');
    }
}
