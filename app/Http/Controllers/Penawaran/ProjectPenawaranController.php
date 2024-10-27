<?php

namespace App\Http\Controllers\Penawaran;

use App\Http\Controllers\Controller;
use App\Models\Penawaran\ProjectPenawaran;
use Illuminate\Http\Request;

class ProjectPenawaranController extends Controller
{
    // Display a listing of the resource
    public function index(Request $request)
    {
        $search = $request->input('search');

        $projectPenawarans = ProjectPenawaran::when($search, function ($query, $search) {
            return $query->where('kepada', 'like', '%' . $search . '%')
                ->orWhere('nomor', 'like', '%' . $search . '%')
                ->orWhere('tanggal', 'like', '%' . $search . '%')
                ->orWhere('proyek', 'like', '%' . $search . '%')
                ->orWhere('lokasi', 'like', '%' . $search . '%');
        })->get();

        return view('projectPenawarans.index', compact('projectPenawarans'));
    }

    // Show the form for creating a new resource
    public function create()
    {
        return view('projectPenawarans.create');
    }

    // Store a newly created resource in storage
    public function store(Request $request)
    {
        // Validate input data
        $request->validate([
            'kepada' => 'nullable|string|max:255',
            'tanggal' => 'required|date',
            'proyek' => 'nullable|string|max:255',
            'lokasi' => 'nullable|string|max:255',
        ]);
    
        // Generate the Nomor Surat Penawaran
        $nomorSurat = null;
        $latest = ProjectPenawaran::latest('id')->first();
        $latestSequence = $latest ? (int)substr($latest->nomor, 0, 3) : 0; // Extract the sequence number
        $sequence = str_pad($latestSequence + 1, 3, '0', STR_PAD_LEFT); // Increment and pad
    
        $kepada = $request->input('kepada');
        $excludedWords = ['PT', 'CV'];
        $abbreviation = strtoupper(implode('', array_map(function ($word) use ($excludedWords) {
            return !in_array(strtoupper($word), $excludedWords) ? strtoupper(substr($word, 0, 1)) : '';
        }, explode(' ', $kepada))));
    
        $romanMonth = $this->getRomanMonth(now()->month);
        $year = now()->year;
    
        // Format the nomor
        $nomorSurat = "{$sequence}/PNW/IMG-{$abbreviation}/{$romanMonth}/{$year}/" . now()->format('m');
    
        // Store new Project Penawaran data
        ProjectPenawaran::create(array_merge($request->all(), ['nomor' => $nomorSurat]));
    
        return redirect()->route('projectPenawarans.index')->with('success', 'Project Penawaran created successfully.');
    }
    
    // Display the specified resource
    public function show(ProjectPenawaran $projectPenawaran)
    {
        $projectPenawaran->load('tujuanPenawaran', 'footerPenawaran', 'penawaran.jenisPenawarans.uraianJenisPekerjaanPenawarans.jenisPenawaran');
        return view('projectPenawarans.show', compact('projectPenawaran'));
    }

    // Show the form for editing the specified resource
    public function edit(ProjectPenawaran $projectPenawaran)
    {
        return view('projectPenawarans.edit', compact('projectPenawaran'));
    }

    // Update the specified resource in storage
    public function update(Request $request, ProjectPenawaran $projectPenawaran)
    {
        $request->validate([
            'nomor' => 'required|string|max:255',
            'kepada' => 'nullable|string|max:255',
            'tanggal' => 'required|date',
            'proyek' => 'nullable|string|max:255',
            'lokasi' => 'nullable|string|max:255',
        ]);

        $projectPenawaran->update($request->all());

        return redirect()->route('projectPenawarans.index')->with('success', 'Project Penawaran updated successfully.');
    }

    // Remove the specified resource from storage
    public function destroy(ProjectPenawaran $projectPenawaran)
    {
        $projectPenawaran->delete();

        return redirect()->route('projectPenawarans.index')->with('success', 'Project Penawaran deleted successfully.');
    }

    // Helper method to convert month number to Roman numeral
    private function getRomanMonth($month)
    {
        $romanNumerals = [
            1 => 'I', 2 => 'II', 3 => 'III', 4 => 'IV', 5 => 'V',
            6 => 'VI', 7 => 'VII', 8 => 'VIII', 9 => 'IX', 10 => 'X',
            11 => 'XI', 12 => 'XII'
        ];

        return $romanNumerals[$month] ?? '';
    }
}
