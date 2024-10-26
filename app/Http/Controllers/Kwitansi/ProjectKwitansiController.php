<?php

namespace App\Http\Controllers\Kwitansi;

use App\Http\Controllers\Controller;
use App\Models\Kwitansi\ProjectKwitansi;
use App\Models\Pembelian\ProjectPembelian;
use Illuminate\Http\Request;

class ProjectKwitansiController extends Controller
{
    // public function index()
    // {
    //     $projectKwitansis = ProjectKwitansi::with('projectPembelian')->get();
    //     return view('projectKwitansis.index', compact('projectKwitansis'));
    // }

    // public function index(Request $request)
    // {
    //     // Get filter and sorting parameters
    //     $filter = $request->input('filter');
    //     $keyword = $request->input('keyword');
    //     $sort = $request->input('sort');

    //     // Build query
    //     $query = ProjectKwitansi::query()->with('projectPembelian');

    //     if ($keyword) {
    //         if ($filter == 'project_pembelian.nomor_po') {
    //             $query->whereHas('projectPembelian', function ($q) use ($keyword) {
    //                 $q->where('nomor_po', 'like', "%{$keyword}%");
    //             });
    //         } else {
    //             $query->where($filter, 'like', "%{$keyword}%");
    //         }
    //     }

    //     if ($sort) {
    //         $query->orderBy($sort);
    //     }

    //     $projectKwitansis = $query->paginate(10);

    //     return view('projectKwitansis.index', compact('projectKwitansis'));
    // }

    public function index(Request $request)
    {
        // Get filter and sorting parameters
        $filter = $request->input('filter');
        $keyword = $request->input('keyword');
        $sort = $request->input('sort', 'kepada_yth'); // Default sort by 'kepada_yth'
        
        // Define valid filters
        $validFilters = ['kepada_yth', 'proyek', 'project_pembelian.nomor_po', 'nomor_surat_jalan', 'nomor_invoice', 'nomor_bast', 'lokasi'];
    
        // Build query
        $query = ProjectKwitansi::query()->with('projectPembelian');
    
        if ($keyword) {
            if ($filter == 'all') {
                // Universal search across all relevant columns
                $query->where(function ($q) use ($keyword) {
                    $q->where('kepada_yth', 'like', "%{$keyword}%")
                        ->orWhere('proyek', 'like', "%{$keyword}%")
                        ->orWhere('lokasi', 'like', "%{$keyword}%")
                        ->orWhere('nomor_surat_jalan', 'like', "%{$keyword}%")
                        ->orWhere('nomor_invoice', 'like', "%{$keyword}%")
                        ->orWhere('nomor_bast', 'like', "%{$keyword}%")
                        ->orWhereHas('projectPembelian', function ($q) use ($keyword) {
                            $q->where('nomor_po', 'like', "%{$keyword}%");
                        });
                });
            } elseif (in_array($filter, $validFilters)) {
                // Search based on the selected filter if valid
                if ($filter == 'project_pembelian.nomor_po') {
                    // Handle the special case for the related 'project_pembelian' table
                    $query->whereHas('projectPembelian', function ($q) use ($keyword) {
                        $q->where('nomor_po', 'like', "%{$keyword}%");
                    });
                } else {
                    $query->where($filter, 'like', "%{$keyword}%");
                }
            }
        }
    
        // Sorting by valid columns, defaulting to 'kepada_yth'
        if (in_array($sort, ['kepada_yth', 'proyek', 'lokasi'])) {
            $query->orderBy($sort, 'asc');
        } else {
            // Default sorting if an invalid sort column is requested
            $query->orderBy('kepada_yth', 'asc');
        }
    
        // Paginate the results
        $projectKwitansis = $query->paginate(10);
    
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
        // Validate the request data
        $request->validate([
            'project_pembelian_id' => 'required|exists:project_pembelians,id',
            'kepada_yth' => 'nullable|string',
            'proyek' => 'nullable|string',
            'lokasi' => 'nullable|string',
            'kendaraan' => 'nullable|string',
            'nomor_polisi' => 'nullable|string',
            'tanggal_surat_jalan' => 'nullable|date',
        ]);

        // Generate identifiers
        $latest = ProjectKwitansi::latest('id')->first();
        $latestUrutan = $latest ? (int) substr($latest->nomor_surat_jalan, 0, 3) : 0;
        $urutan = str_pad($latestUrutan + 1, 3, '0', STR_PAD_LEFT);

        $kepadaYth = strtoupper($request->input('kepada_yth'));

        // Extract first letters of each word in kepada_yth, excluding 'PT' and 'CV'
        $excludedWords = ['PT', 'CV'];
        $words = explode(' ', $kepadaYth);
        $abbreviation = strtoupper(implode('', array_map(function ($word) use ($excludedWords) {
            $word = strtoupper($word);
            return !in_array($word, $excludedWords) ? strtoupper(substr($word, 0, 1)) : '';
        }, $words)));

        $romanMonth = $this->getRomanMonth(now()->month);
        $year = now()->year;
        $tanggal = now()->day;

        $nomorSuratJalan = "{$urutan}/SJ/IMG-{$abbreviation}/{$romanMonth}/{$year}/{$tanggal}";
        $nomorInvoice = "{$urutan}/INV/IMG-{$abbreviation}/{$romanMonth}/{$year}/{$tanggal}";
        $nomorBast = "{$urutan}/BAST/IMG-{$abbreviation}/{$romanMonth}/{$year}/{$tanggal}";

        // Create a new ProjectKwitansi instance and save it
        ProjectKwitansi::create([
            'project_pembelian_id' => $request->input('project_pembelian_id'),
            'kepada_yth' => $request->input('kepada_yth'),
            'nomor_surat_jalan' => $nomorSuratJalan,
            'nomor_invoice' => $nomorInvoice,
            'nomor_bast' => $nomorBast,
            'proyek' => $request->input('proyek'),
            'lokasi' => $request->input('lokasi'),
            'kendaraan' => $request->input('kendaraan'),
            'nomor_polisi' => $request->input('nomor_polisi'),
            'tanggal_surat_jalan' => $request->input('tanggal_surat_jalan'),
        ]);

        return redirect()->route('projectKwitansis.index')->with('success', 'Kwitansi berhasil ditambahkan.');
    }

    public function show(ProjectKwitansi $projectKwitansi)
    {
        $projectKwitansi->load([
            'catatanKwitansi',
            'pekerjaanKwitansi.batchPekerjaanKwitansi.batchKwitansi.uraianKwitansis'
        ]);

        return view('projectKwitansis.show', compact('projectKwitansi'));
    }

    // public function showInvoice(ProjectKwitansi $projectKwitansi)
    // {
    //     $projectKwitansi->load('catatanKwitansi', 'pekerjaanKwitansi');
    //     $pekerjaanKwitansis = $projectKwitansi->pekerjaanKwitansi; // Fetch related pekerjaan kwitansi
    //     return view('projectKwitansis.showInvoice', compact('projectKwitansi', 'pekerjaanKwitansis'));
    // }

    public function showInvoice(ProjectKwitansi $projectKwitansi)
    {
        // Eager load related models
        $projectKwitansi->load('catatanKwitansi', 'pekerjaanKwitansi');

        // Fetch related pekerjaan kwitansi
        $pekerjaanKwitansis = $projectKwitansi->pekerjaanKwitansi;

        // Fetch related catatan kwitansi
        $catatanKwitansis = $projectKwitansi->catatanKwitansi;

        // Pass variables to the view
        return view('projectKwitansis.showInvoice', compact('projectKwitansi', 'pekerjaanKwitansis', 'catatanKwitansis'));
    }

    public function edit(ProjectKwitansi $projectKwitansi)
    {
        $projectPembelians = ProjectPembelian::all();
        return view('projectKwitansis.edit', compact('projectKwitansi', 'projectPembelians'));
    }

    public function update(Request $request, ProjectKwitansi $projectKwitansi)
    {
        // Validate the request data
        $request->validate([
            'project_pembelian_id' => 'required|exists:project_pembelians,id',
            'kepada_yth' => 'nullable|string',
            'proyek' => 'nullable|string',
            'lokasi' => 'nullable|string',
            'kendaraan' => 'nullable|string',
            'nomor_polisi' => 'nullable|string',
            'tanggal_surat_jalan' => 'nullable|date',
        ]);

        // Update the ProjectKwitansi instance
        $projectKwitansi->update([
            'project_pembelian_id' => $request->input('project_pembelian_id'),
            'kepada_yth' => $request->input('kepada_yth'),
            'proyek' => $request->input('proyek'),
            'lokasi' => $request->input('lokasi'),
            'kendaraan' => $request->input('kendaraan'),
            'nomor_polisi' => $request->input('nomor_polisi'),
            'tanggal_surat_jalan' => $request->input('tanggal_surat_jalan'),
        ]);

        return redirect()->route('projectKwitansis.index')->with('success', 'Kwitansi berhasil diperbarui.');
    }

    public function destroy(ProjectKwitansi $projectKwitansi)
    {
        $projectKwitansi->delete();

        return redirect()->route('projectKwitansis.index')->with('success', 'Kwitansi berhasil dihapus.');
    }

    // Helper function to convert month to Roman numerals
    private function getRomanMonth($month)
    {
        $romanMonths = [
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
        return $romanMonths[$month];
    }
}
