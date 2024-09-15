<?php

namespace App\Http\Controllers;

use App\Models\ProjectKwitansi;
use App\Models\ProjectPembelian;
use Illuminate\Http\Request;

class ProjectKwitansiController extends Controller
{
    /**
     * Display a listing of the project kwitansi with filtering and sorting options.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function index(Request $request)
    // {
    //     // Get filter, keyword, and sort parameters from the request
    //     $filter = $request->input('filter');
    //     $keyword = $request->input('keyword');
    //     $sort = $request->input('sort');

    //     // Build the base query with eager loading for projectPembelian relation
    //     $query = ProjectKwitansi::query()->with('projectPembelian');

    //     // Apply keyword search
    //     if ($keyword) {
    //         if ($filter === 'all') {
    //             // Universal search across specific columns
    //             $query->where(function ($q) use ($keyword) {
    //                 $q->where('kepada_yth', 'like', "%{$keyword}%")
    //                     ->orWhere('proyek', 'like', "%{$keyword}%")
    //                     ->orWhere('lokasi', 'like', "%{$keyword}%")
    //                     ->orWhere('nomor_surat_jalan', 'like', "%{$keyword}%")
    //                     ->orWhere('nomor_invoice', 'like', "%{$keyword}%")
    //                     ->orWhere('nomor_bast', 'like', "%{$keyword}%")
    //                     ->orWhereHas('projectPembelian', function ($q) use ($keyword) {
    //                         $q->where('nomor_po', 'like', "%{$keyword}%");
    //                     });
    //             });
    //         } else {
    //             // Search based on the selected filter
    //             $query->where($filter, 'like', "%{$keyword}%");
    //         }
    //     }

    //     // Apply sorting if provided
    //     if ($sort) {
    //         $query->orderBy($sort);
    //     }

    //     // Paginate the results
    //     $projectKwitansis = $query->paginate(10);

    //     return view('projectKwitansis.index', compact('projectKwitansis'));
    // }

    public function index(Request $request)
    {
        // Get filter, keyword, and sort parameters from the request
        $filter = $request->input('filter');
        $keyword = $request->input('keyword');
        $sort = $request->input('sort');

        // Build the base query with eager loading for relationships
        $query = ProjectKwitansi::query()
            ->with(['projectPembelian', 'batchKwitansis.uraianKwitansis']); // Eager load BatchKwitansi and UraianKwitansi

        // Apply keyword search
        if ($keyword) {
            if ($filter === 'all') {
                // Universal search across specific columns
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
            } else {
                // Search based on the selected filter
                $query->where($filter, 'like', "%{$keyword}%");
            }
        }

        // Apply sorting if provided
        if ($sort) {
            $query->orderBy($sort);
        }

        // Paginate the results
        $projectKwitansis = $query->paginate(10);

        return view('projectKwitansis.index', compact('projectKwitansis'));
    }


    /**
     * Show the form for creating a new kwitansi.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Get IDs of project pembelians that are already linked to kwitansi
        $usedProjectPembelianIds = ProjectKwitansi::pluck('project_pembelian_id')->toArray();

        // Fetch only project pembelians that haven't been linked yet
        $projectPembelians = ProjectPembelian::whereNotIn('id', $usedProjectPembelianIds)->get();

        return view('projectKwitansis.create', compact('projectPembelians'));
    }

    /**
     * Store a newly created kwitansi in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

        // Generate identifiers for nomor_surat_jalan, nomor_invoice, and nomor_bast
        $latest = ProjectKwitansi::latest('id')->first();
        $latestUrutan = $latest ? (int) substr($latest->nomor_surat_jalan, 0, 3) : 0;
        $urutan = str_pad($latestUrutan + 1, 3, '0', STR_PAD_LEFT);

        $kepadaYth = strtoupper($request->input('kepada_yth'));

        // Extract first letters of each word in kepada_yth, excluding 'PT' and 'CV'
        $excludedWords = ['PT', 'CV'];
        $words = explode(' ', $kepadaYth);
        $abbreviation = strtoupper(implode('', array_map(function ($word) use ($excludedWords) {
            return !in_array($word, $excludedWords) ? strtoupper(substr($word, 0, 1)) : '';
        }, $words)));

        // Get current date details
        $romanMonth = $this->getRomanMonth(now()->month);
        $year = now()->year;
        $tanggal = now()->day;

        // Format the identifiers
        $nomorSuratJalan = "{$urutan}/SJ/IMG-{$abbreviation}/{$romanMonth}/{$year}/{$tanggal}";
        $nomorInvoice = "{$urutan}/INV/IMG-{$abbreviation}/{$romanMonth}/{$year}/{$tanggal}";
        $nomorBast = "{$urutan}/BAST/IMG-{$abbreviation}/{$romanMonth}/{$year}/{$tanggal}";

        // Store the new kwitansi record
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

    /**
     * Display the specified kwitansi details.
     *
     * @param  \App\Models\ProjectKwitansi  $projectKwitansi
     * @return \Illuminate\Http\Response
     */
    public function show(ProjectKwitansi $projectKwitansi)
    {
        // Eager load related models
        $projectKwitansi->load('catatanKwitansi', 'pekerjaanKwitansi');

        return view('projectKwitansis.show', compact('projectKwitansi'));
    }

    /**
     * Show the invoice for the specified kwitansi.
     *
     * @param  \App\Models\ProjectKwitansi  $projectKwitansi
     * @return \Illuminate\Http\Response
     */
    public function showInvoice(ProjectKwitansi $projectKwitansi)
    {
        // Eager load related models and pass to the view
        $projectKwitansi->load('catatanKwitansi', 'pekerjaanKwitansi');
        $pekerjaanKwitansis = $projectKwitansi->pekerjaanKwitansi;
        $catatanKwitansis = $projectKwitansi->catatanKwitansi;

        return view('projectKwitansis.showInvoice', compact('projectKwitansi', 'pekerjaanKwitansis', 'catatanKwitansis'));
    }

    /**
     * Show the form for editing the specified kwitansi.
     *
     * @param  \App\Models\ProjectKwitansi  $projectKwitansi
     * @return \Illuminate\Http\Response
     */
    public function edit(ProjectKwitansi $projectKwitansi)
    {
        // Fetch all project pembelians
        $projectPembelians = ProjectPembelian::all();

        return view('projectKwitansis.edit', compact('projectKwitansi', 'projectPembelians'));
    }

    /**
     * Update the specified kwitansi in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProjectKwitansi  $projectKwitansi
     * @return \Illuminate\Http\Response
     */
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

        // Update the kwitansi record
        $projectKwitansi->update($request->only([
            'project_pembelian_id',
            'kepada_yth',
            'proyek',
            'lokasi',
            'kendaraan',
            'nomor_polisi',
            'tanggal_surat_jalan'
        ]));

        return redirect()->route('projectKwitansis.index')->with('success', 'Kwitansi berhasil diperbarui.');
    }

    /**
     * Remove the specified kwitansi from the database.
     *
     * @param  \App\Models\ProjectKwitansi  $projectKwitansi
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProjectKwitansi $projectKwitansi)
    {
        // Delete the kwitansi record
        $projectKwitansi->delete();

        return redirect()->route('projectKwitansis.index')->with('success', 'Kwitansi berhasil dihapus.');
    }

    /**
     * Helper function to get the Roman numeral for a given month.
     *
     * @param  int  $month
     * @return string
     */
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
            12 => 'XII',
        ];

        return $romanMonths[$month] ?? '';
    }
}
