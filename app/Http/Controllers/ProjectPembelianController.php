<?php

namespace App\Http\Controllers;

use App\Models\ProjectPembelian;
use Illuminate\Http\Request;

class ProjectPembelianController extends Controller
{
    // Display a listing of the resource
    public function index()
    {
        $projectPembelians = ProjectPembelian::all();
        return view('projectPembelians.index', compact('projectPembelians'));
    }

    // Show the form for creating a new resource
    public function create()
    {
        return view('projectPembelians.create');
    }

    // Store a newly created resource in storage
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'project' => 'required|string|max:255',
            'tanggal_order' => 'required|date',
            'metode_pembayaran' => 'required|string|max:255',
            'po_ditunjukan_kepada' => 'required|string|max:255',
            'alamat' => 'nullable|string|max:255',
            'kontak' => 'required|string|max:255',
            'email_mobile_number' => 'nullable|string|max:255',
        ]);

        // Auto-generate Nomor PO
        $latest = ProjectPembelian::latest('id')->first();
        $latestUrutan = $latest ? (int) substr($latest->nomor_po, 0, 3) : 0;
        $urutan = str_pad($latestUrutan + 1, 3, '0', STR_PAD_LEFT);

        $poDitunjukanKepada = $request->input('po_ditunjukan_kepada');

        // Generate SBA, excluding 'PT' and 'CV'
        $excludedWords = ['PT', 'CV'];
        $words = explode(' ', $poDitunjukanKepada);
        $sba = strtoupper(implode('', array_map(function ($word) use ($excludedWords) {
            $word = strtoupper($word);
            return !in_array($word, $excludedWords) ? strtoupper(substr($word, 0, 1)) : '';
        }, $words)));

        $romanMonth = $this->getRomanMonth(now()->month);
        $year = now()->year;
        $tanggal = now()->day;

        $nomorPo = "{$urutan}/PO/IMG-{$sba}/{$romanMonth}/{$year}/{$tanggal}";

        // Create a new ProjectPembelian instance and save it
        ProjectPembelian::create([
            'nomor_po' => $nomorPo,
            'project' => $request->input('project'),
            'tanggal_order' => $request->input('tanggal_order'),
            'metode_pembayaran' => $request->input('metode_pembayaran'),
            'po_ditunjukan_kepada' => $request->input('po_ditunjukan_kepada'),
            'alamat' => $request->input('alamat'),
            'kontak' => $request->input('kontak'),
            'email_mobile_number' => $request->input('email_mobile_number'),
        ]);

        return redirect()->route('projectPembelians.index')->with('success', 'Project Pembelian created successfully.');
    }

    // Display the specified resource
    public function show(ProjectPembelian $projectPembelian)
    {
        $projectPembelian->load('catatanPembelian', 'footerPembelian', 'bahanPembelian.pembelians');
        return view('projectPembelians.show', compact('projectPembelian'));
    }

    // Show the form for editing the specified resource
    public function edit($id)
    {
        $projectPembelian = ProjectPembelian::findOrFail($id);
        return view('projectPembelians.edit', compact('projectPembelian'));
    }

    // Update the specified resource in storage (Awalan Bisa di edit)
    // public function update(Request $request, $id)
    // {
    //     // Validate the request data
    //     $request->validate([
    //         'project' => 'required|string|max:255',
    //         'tanggal_order' => 'required|date',
    //         'metode_pembayaran' => 'required|string|max:255',
    //         'po_ditunjukan_kepada' => 'required|string|max:255',
    //         'alamat' => 'nullable|string|max:255',
    //         'kontak' => 'required|string|max:255',
    //         'email_mobile_number' => 'nullable|string|max:255',
    //     ]);

    //     // Find the ProjectPembelian instance
    //     $projectPembelian = ProjectPembelian::findOrFail($id);

    //     // Generate new Nomor PO
    //     $latest = ProjectPembelian::latest('id')->first();
    //     $latestUrutan = $latest ? (int) substr($latest->nomor_po, 0, 3) : 0;
    //     $urutan = str_pad($latestUrutan + 1, 3, '0', STR_PAD_LEFT);

    //     $poDitunjukanKepada = $request->input('po_ditunjukan_kepada');

    //     // Generate SBA, excluding 'PT' and 'CV'
    //     $excludedWords = ['PT', 'CV'];
    //     $words = explode(' ', $poDitunjukanKepada);
    //     $sba = strtoupper(implode('', array_map(function ($word) use ($excludedWords) {
    //         $word = strtoupper($word);
    //         return !in_array($word, $excludedWords) ? strtoupper(substr($word, 0, 1)) : '';
    //     }, $words)));

    //     $romanMonth = $this->getRomanMonth(now()->month);
    //     $year = now()->year;
    //     $tanggal = now()->day;

    //     $nomorPo = "{$urutan}/PO/IMG-{$sba}/{$romanMonth}/{$year}/{$tanggal}";

    //     // Update the ProjectPembelian instance
    //     $projectPembelian->update([
    //         'nomor_po' => $nomorPo,
    //         'project' => $request->input('project'),
    //         'tanggal_order' => $request->input('tanggal_order'),
    //         'metode_pembayaran' => $request->input('metode_pembayaran'),
    //         'po_ditunjukan_kepada' => $request->input('po_ditunjukan_kepada'),
    //         'alamat' => $request->input('alamat'),
    //         'kontak' => $request->input('kontak'),
    //         'email_mobile_number' => $request->input('email_mobile_number'),
    //     ]);

    //     return redirect()->route('projectPembelians.index')->with('success', 'Project Pembelian updated successfully.');
    // }

    // Tidak bisa di edit
    public function update(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'project' => 'required|string|max:255',
            'tanggal_order' => 'required|date',
            'metode_pembayaran' => 'required|string|max:255',
            'po_ditunjukan_kepada' => 'required|string|max:255',
            'alamat' => 'nullable|string|max:255',
            'kontak' => 'required|string|max:255',
            'email_mobile_number' => 'nullable|string|max:255',
        ]);

        // Find the ProjectPembelian instance
        $projectPembelian = ProjectPembelian::findOrFail($id);

        // Generate new Nomor PO only if not set, e.g., during creation
        if (!$projectPembelian->nomor_po) {
            // Generate new Nomor PO
            $latest = ProjectPembelian::latest('id')->first();
            $latestUrutan = $latest ? (int) substr($latest->nomor_po, 0, 3) : 0;
            $urutan = str_pad($latestUrutan + 1, 3, '0', STR_PAD_LEFT);

            $poDitunjukanKepada = $request->input('po_ditunjukan_kepada');

            // Generate SBA, excluding 'PT' and 'CV'
            $excludedWords = ['PT', 'CV'];
            $words = explode(' ', $poDitunjukanKepada);
            $sba = strtoupper(implode('', array_map(function ($word) use ($excludedWords) {
                $word = strtoupper($word);
                return !in_array($word, $excludedWords) ? strtoupper(substr($word, 0, 1)) : '';
            }, $words)));

            $romanMonth = $this->getRomanMonth(now()->month);
            $year = now()->year;
            $tanggal = now()->day;

            $nomorPo = "{$urutan}/PO/IMG-{$sba}/{$romanMonth}/{$year}/{$tanggal}";

            $projectPembelian->nomor_po = $nomorPo;
        }

        // Update the ProjectPembelian instance
        $projectPembelian->update([
            'project' => $request->input('project'),
            'tanggal_order' => $request->input('tanggal_order'),
            'metode_pembayaran' => $request->input('metode_pembayaran'),
            'po_ditunjukan_kepada' => $request->input('po_ditunjukan_kepada'),
            'alamat' => $request->input('alamat'),
            'kontak' => $request->input('kontak'),
            'email_mobile_number' => $request->input('email_mobile_number'),
        ]);

        return redirect()->route('projectPembelians.index')->with('success', 'Project Pembelian updated successfully.');
    }

    // Remove the specified resource from storage
    public function destroy($id)
    {
        $projectPembelian = ProjectPembelian::findOrFail($id);
        $projectPembelian->delete();

        return redirect()->route('projectPembelians.index')->with('success', 'Project Pembelian deleted successfully.');
    }

    // Helper method to convert month number to Roman numeral
    private function getRomanMonth($month)
    {
        $romanNumerals = [
            1 => 'I',
            2 => 'II',
            3 => 'III',
            4 => 'IV',
            5 => 'V',
            6 => 'VI',
            7 => 'VII',
            8 => 'VIII',
            9 => 'IX',
            10 => 'X',
            11 => 'XI',
            12 => 'XII'
        ];

        return $romanNumerals[$month] ?? '';
    }
}
