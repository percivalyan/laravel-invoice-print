<?php

namespace App\Http\Controllers\Penawaran;

use App\Http\Controllers\Controller;
use App\Models\Penawaran\JenisPenawaran; // Pastikan model ini ada
use Illuminate\Http\Request;

class JenisPenawaranController extends Controller
{
    public function index(Request $request)
    {
        $query = JenisPenawaran::query();

        if ($request->filled('search')) {
            $search = $request->input('search');

            $query->where(function ($q) use ($search) {
                $q->where('jenis_pekerjaan', 'like', '%' . $search . '%')
                    ->orWhere('quantitas', $search)
                    ->orWhere('unit', 'like', '%' . $search . '%')
                    ->orWhere('harga_satuan', $search);
            });
        }

        $jenisPenawarans = $query->get();

        return view('jenisPenawarans.index', compact('jenisPenawarans'));
    }

    public function create()
    {
        return view('jenisPenawarans.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'jenis_pekerjaan' => 'required|string',
            'quantitas' => 'nullable|integer',
            'unit' => 'nullable|string',
            'harga_satuan' => 'nullable|integer',
        ]);

        JenisPenawaran::create($request->all());

        return redirect()->route('jenisPenawarans.index')->with('success', 'Jenis Penawaran created successfully.');
    }

    public function show(JenisPenawaran $jenisPenawaran)
    {
        $uraianPenawarans = $jenisPenawaran->uraianJenisPekerjaanPenawaran; // Fetch related uraian
        return view('jenisPenawarans.show', compact('jenisPenawaran', 'uraianJenisPekerjaanPenawarans'));
    }

    public function edit(JenisPenawaran $jenisPenawaran)
    {
        return view('jenisPenawarans.edit', compact('jenisPenawaran'));
    }

    public function update(Request $request, JenisPenawaran $jenisPenawaran)
    {
        $request->validate([
            'jenis_pekerjaan' => 'required|string',
            'quantitas' => 'nullable|integer',
            'unit' => 'nullable|string',
            'harga_satuan' => 'nullable|integer',
        ]);

        $jenisPenawaran->update($request->all());

        return redirect()->route('jenisPenawarans.index')->with('success', 'Jenis Penawaran updated successfully.');
    }

    public function destroy(JenisPenawaran $jenisPenawaran)
    {
        $jenisPenawaran->penawarans()->detach();
        $jenisPenawaran->delete();
        return redirect()->route('jenisPenawarans.index')->with('success', 'Jenis Penawaran deleted successfully.');
    }
}
