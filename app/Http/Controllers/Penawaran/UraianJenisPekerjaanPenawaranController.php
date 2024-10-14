<?php

namespace App\Http\Controllers\Penawaran;

use App\Http\Controllers\Controller;
use App\Models\Penawaran\JenisPenawaran; // Pastikan model ini ada
use App\Models\Penawaran\UraianJenisPekerjaanPenawaran; // Pastikan model ini ada
use Illuminate\Http\Request;

class UraianJenisPekerjaanPenawaranController extends Controller
{
    public function index(Request $request)
    {
        $jenisPenawaranId = $request->query('jenis_penawaran_id');
        $query = UraianJenisPekerjaanPenawaran::with('jenisPenawaran')
            ->where('jenis_penawaran_id', $jenisPenawaranId);

        // Add search functionality
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('uraian', 'like', '%' . $search . '%')
                    ->orWhere('quantitas', 'like', '%' . $search . '%')
                    ->orWhere('unit', 'like', '%' . $search . '%')
                    ->orWhere('harga_satuan', 'like', '%' . $search . '%');
            });
        }

        $uraianJenisPekerjaanPenawarans = $query->get();
        $jenisPenawaran = JenisPenawaran::find($jenisPenawaranId);

        return view('uraianJenisPekerjaanPenawarans.index', compact('uraianJenisPekerjaanPenawarans', 'jenisPenawaran'));
    }

    public function create(Request $request)
    {
        $jenis_penawaran_id = $request->query('jenis_penawaran_id');
        $jenisPenawarans = JenisPenawaran::all();
        return view('uraianJenisPekerjaanPenawarans.create', compact('jenisPenawarans', 'jenis_penawaran_id'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'jenis_penawaran_id' => 'required|exists:jenis_penawarans,id',
            'uraian' => 'required|string',
            'quantitas' => 'nullable|integer',
            'unit' => 'nullable|string',
            'harga_satuan' => 'nullable|integer',
        ]);

        // Simpan data
        UraianJenisPekerjaanPenawaran::create($request->all());

        // Redirect ke index dengan parameter jenis_penawaran_id yang sama
        // return redirect()->route('uraianJenisPekerjaanPenawarans.index', ['jenis_penawaran_id' => $request->jenis_penawaran_id])
        //     ->with('success', 'Uraian Jenis Pekerjaan Penawaran created successfully.');
        // Redirect ke jenisPenawaran
        return redirect()->route('jenisPenawarans.index')->with('success', 'Jenis Penawaran created successfully.');
    }

    public function show(UraianJenisPekerjaanPenawaran $uraianJenisPekerjaanPenawaran)
    {
        return view('uraianJenisPekerjaanPenawarans.show', compact('uraianJenisPekerjaanPenawaran'));
    }

    public function edit(UraianJenisPekerjaanPenawaran $uraianJenisPekerjaanPenawaran)
    {
        $jenisPenawarans = JenisPenawaran::all();
        return view('uraianJenisPekerjaanPenawarans.edit', compact('uraianJenisPekerjaanPenawaran', 'jenisPenawarans'));
    }

    public function update(Request $request, UraianJenisPekerjaanPenawaran $uraianJenisPekerjaanPenawaran)
    {
        $request->validate([
            'jenis_penawaran_id' => 'required|exists:jenis_penawarans,id',
            'uraian' => 'required|string',
            'quantitas' => 'nullable|integer',
            'unit' => 'nullable|string',
            'harga_satuan' => 'nullable|integer',
        ]);

        // Update data
        $uraianJenisPekerjaanPenawaran->update($request->all());

        // Redirect ke index dengan parameter jenis_penawaran_id yang sama
        return redirect()->route('uraianJenisPekerjaanPenawarans.index', ['jenis_penawaran_id' => $request->jenis_penawaran_id])
            ->with('success', 'Uraian Jenis Pekerjaan Penawaran updated successfully.');
    }

    public function destroy(UraianJenisPekerjaanPenawaran $uraianJenisPekerjaanPenawaran, Request $request)
    {
        // Delete the record
        $uraianJenisPekerjaanPenawaran->delete();

        // Prepare redirect route
        $redirectRoute = route('uraianJenisPekerjaanPenawarans.index');

        // Check if jenis_penawaran_id is present in the request
        if ($request->has('jenis_penawaran_id')) {
            $redirectRoute = route('uraianJenisPekerjaanPenawarans.index', [
                'jenis_penawaran_id' => $request->input('jenis_penawaran_id')
            ]);
        }

        // Redirect with success message
        return redirect($redirectRoute)->with('success', 'Uraian Jenis Pekerjaan Penawaran deleted successfully.');
    }
}
