<?php

namespace App\Http\Controllers\Kwitansi;

use App\Http\Controllers\Controller;
use App\Models\Kwitansi\BatchKwitansi;
use App\Models\Kwitansi\UraianKwitansi;
use Illuminate\Http\Request;

class UraianKwitansiController extends Controller
{
    /**
     * Display a listing of the resource for a specific batch.
     *
     * @param  \App\Models\BatchKwitansi  $batchKwitansi
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $batchKwitansiId = $request->query("batch_kwitansi_id");

        $query = UraianKwitansi::with("batchKwitansi");
        if ($batchKwitansiId) {
            $query->where("batch_kwitansi_id", $batchKwitansiId);
        }

        $uraianKwitansis = $query->get();

        return view('uraianKwitansis.index', compact('uraianKwitansis', 'batchKwitansiId'));
    }

    // public function index(BatchKwitansi $batchKwitansi)
    // {
    //     $uraianKwitansis = $batchKwitansi->uraianKwitansis;
    //     return view('uraianKwitansis.index', compact('batchKwitansi', 'uraianKwitansis'));
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\Models\BatchKwitansi  $batchKwitansi
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $batchKwitansiId = $request->query("batch_kwitansi_id");
        return view('uraianKwitansis.create', compact('batchKwitansiId'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BatchKwitansi  $batchKwitansi
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'batch_kwitansi_id' => 'required|exists:batch_kwitansis,id',
            'nama_uraian' => 'nullable|string|max:255',
            'jumlah_uraian' => 'nullable|integer',
            'satuan_uraian' => 'nullable|string|max:255',
            'keterangan_uraian' => 'nullable|string',
        ]);

        UraianKwitansi::create($request->all());
        return redirect()->route('uraianKwitansis.index', ['batch_kwitansi_id' => $request->batch_kwitansi_id])->with('success', 'Uraian Kwitansi created successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BatchKwitansi  $batchKwitansi
     * @param  \App\Models\UraianKwitansi  $uraianKwitansi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $uraianKwitansi = UraianKwitansi::findOrFail($id);
        $batchKwitansiId = $uraianKwitansi->batch_kwitansi_id;

        return view('uraianKwitansis.edit', compact('uraianKwitansi', 'batchKwitansiId'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BatchKwitansi  $batchKwitansi
     * @param  \App\Models\UraianKwitansi  $uraianKwitansi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'batch_kwitansi_id' => 'required|exists:batch_kwitansis,id',
            'nama_uraian' => 'nullable|string|max:255',
            'jumlah_uraian' => 'nullable|integer',
            'satuan_uraian' => 'nullable|string|max:255',
            'keterangan_uraian' => 'nullable|string',
        ]);

        $uraianKwitansi = UraianKwitansi::findOrFail($id);
        $uraianKwitansi->update($request->all());
        return redirect()->route('uraianKwitansis.index', ['batch_kwitansi_id' => $request->batch_kwitansi_id])->with('success', 'Uraian Kwitansi updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BatchKwitansi  $batchKwitansi
     * @param  \App\Models\UraianKwitansi  $uraianKwitansi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Find the Uraian Kwitansi by its ID and delete it
        $uraianKwitansi = UraianKwitansi::findOrFail($id);

        // Retrieve the batch_kwitansi_id before deletion
        $batchKwitansiId = $uraianKwitansi->batch_kwitansi_id;

        // Delete the Uraian Kwitansi
        $uraianKwitansi->delete();

        // Redirect back to the Uraian Kwitansi list with the appropriate batch_kwitansi_id
        return redirect()->route('uraianKwitansis.index', ['batch_kwitansi_id' => $batchKwitansiId])
            ->with('success', 'Uraian kwitansi berhasil dihapus.');
    }
}
