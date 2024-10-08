@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3 mb-0 text-gray-800">Daftar Project Kwitansi</h1>
            <a href="{{ route('projectKwitansis.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Project
                Kwitansi</a>
        </div>

        <!-- Pencarian dan Sorting -->
        <form method="GET" action="{{ route('projectKwitansis.index') }}" class="mb-4">
            <div class="row">
                <div class="col-md-6">
                    <div class="input-group">
                        <select name="filter" class="form-select">
                            <option value="">Pilih Filter</option>
                            <option value="all" {{ request('filter') == 'all' ? 'selected' : '' }}>Cari Semua</option>
                            <option value="kepada_yth" {{ request('filter') == 'kepada_yth' ? 'selected' : '' }}>Client
                            </option>
                            <option value="proyek" {{ request('filter') == 'proyek' ? 'selected' : '' }}>Proyek</option>
                            <option value="project_pembelian.nomor_po"
                                {{ request('filter') == 'project_pembelian.nomor_po' ? 'selected' : '' }}>Reff PO No
                            </option>
                            <option value="nomor_surat_jalan"
                                {{ request('filter') == 'nomor_surat_jalan' ? 'selected' : '' }}>Nomor Surat Jalan</option>
                            <option value="nomor_invoice" {{ request('filter') == 'nomor_invoice' ? 'selected' : '' }}>Nomor
                                Invoice</option>
                            <option value="nomor_bast" {{ request('filter') == 'nomor_bast' ? 'selected' : '' }}>Nomor BAST
                            </option>
                            <option value="lokasi" {{ request('filter') == 'lokasi' ? 'selected' : '' }}>Lokasi</option>
                        </select>
                        <input type="text" name="keyword" class="form-control" placeholder="Cari..."
                            value="{{ request('keyword') }}">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                    </div>
                </div>

                <div class="col-md-6">
                    <select name="sort" class="form-select" onchange="this.form.submit()">
                        <option value="">Sort by</option>
                        <option value="kepada_yth" {{ request('sort') == 'kepada_yth' ? 'selected' : '' }}>Client (A-Z)
                        </option>
                        <option value="proyek" {{ request('sort') == 'proyek' ? 'selected' : '' }}>Proyek (A-Z)</option>
                        <option value="lokasi" {{ request('sort') == 'lokasi' ? 'selected' : '' }}>Lokasi (A-Z)</option>
                    </select>
                </div>
            </div>
        </form>

        <!-- Success Message -->
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> {{ $message }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Project Kwitansi Table -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th>No</th>
                                <th>Client</th>
                                <th>Proyek</th>
                                {{-- <th>Reff PO No</th> --}}
                                <th>Nomor Dokumen</th>
                                {{-- <th>Nomor Surat Jalan</th>
                                <th>Nomor Invoice</th>
                                <th>Nomor BAST</th> --}}
                                <th>Lokasi</th>
                                <th>Batch dan Uraian</th>
                                <th>Cetak Dokumen</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($projectKwitansis as $projectKwitansi)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $projectKwitansi->kepada_yth }}</td>
                                    <td>{{ $projectKwitansi->proyek }}</td>
                                    {{-- <td>{{ $projectKwitansi->projectPembelian ? $projectKwitansi->projectPembelian->nomor_po : 'N/A' }} --}}
                                    </td>
                                    <td>
                                        <li>Reff PO No: {{ $projectKwitansi->projectPembelian ? $projectKwitansi->projectPembelian->nomor_po : 'N/A' }}</li>
                                        <li>Surat Jalan: {{ $projectKwitansi->nomor_surat_jalan }}</li>
                                        <li>Invoice: {{ $projectKwitansi->nomor_invoice }}</li>
                                        <li>BAST: {{ $projectKwitansi->nomor_bast }}
                                    </td>
                                    <td>{{ $projectKwitansi->lokasi }}</td>
                                    <td>
                                        @foreach ($projectKwitansi->batchKwitansis as $batch)
                                            <strong>Batch: {{ $batch->nama_batch }}</strong><br>
                                            @foreach ($batch->uraianKwitansis as $uraian)
                                                <div>- {{ $uraian->nama_uraian }}: {{ $uraian->jumlah_uraian }}
                                                    {{ $uraian->satuan_uraian }}</div>
                                            @endforeach
                                        @endforeach
                                    </td>
                                    <td class="text-center">
                                        <div class="dropdown">
                                            <button class="btn btn-info btn-sm dropdown-toggle" type="button"
                                                id="dropdownMenuSurat{{ $projectKwitansi->id }}" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                Surat
                                            </button>
                                            <ul class="dropdown-menu"
                                                aria-labelledby="dropdownMenuSurat{{ $projectKwitansi->id }}">
                                                <li><a class="dropdown-item"
                                                        href="{{ route('projectKwitansis.show', $projectKwitansi->id) }}"><i
                                                            class="fas fa-file-alt"></i> Surat Jalan</a></li>
                                                <li><a class="dropdown-item"
                                                        href="{{ route('projectKwitansis.showinvoice', $projectKwitansi->id) }}"><i
                                                            class="fas fa-file-invoice"></i> Invoice</a></li>
                                                <li><a class="dropdown-item"
                                                        href="{{ route('projectKwitansis.showbast', $projectKwitansi->id) }}"><i
                                                            class="fas fa-file-signature"></i> BAST</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="dropdown">
                                            <button class="btn btn-secondary btn-sm dropdown-toggle" type="button"
                                                id="dropdownMenuButton{{ $projectKwitansi->id }}" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                Aksi
                                            </button>
                                            <ul class="dropdown-menu"
                                                aria-labelledby="dropdownMenuButton{{ $projectKwitansi->id }}">
                                                <li><a class="dropdown-item"
                                                        href="{{ route('projectKwitansis.edit', $projectKwitansi->id) }}"><i
                                                            class="fas fa-edit"></i> Edit</a></li>
                                                <li><a class="dropdown-item"
                                                        href="{{ route('catatanKwitansis.create', ['project_kwitansi_id' => $projectKwitansi->id]) }}"><i
                                                            class="fas fa-sticky-note"></i> Catatan</a></li>
                                                <li><a class="dropdown-item"
                                                        href="{{ route('pekerjaanKwitansis.index', ['project_kwitansi_id' => $projectKwitansi->id]) }}">Tambahkan
                                                        Pekerjaan</a></li>
                                                <li>
                                                    <form
                                                        action="{{ route('projectKwitansis.destroy', $projectKwitansi->id) }}"
                                                        method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="dropdown-item"
                                                            onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i
                                                                class="fas fa-trash"></i> Hapus</button>
                                                    </form>
                                                </li>
                                                <li>
                                                    @php
                                                        $relationshipExists = \App\Models\BatchKwitansiProjectKwitansi::where(
                                                            'project_kwitansi_id',
                                                            $projectKwitansi->id,
                                                        )->exists();
                                                        $searchQuery = $projectKwitansi->nomor_surat_jalan; // No encoding
                                                        $route = $relationshipExists
                                                            ? route('relationships.index', ['search' => $searchQuery])
                                                            : route('relationships.create', [
                                                                'project_kwitansi_id' => $projectKwitansi->id,
                                                            ]);
                                                        $label = $relationshipExists
                                                            ? 'Edit Relationship'
                                                            : 'Create Relationship';
                                                    @endphp
                                                    <a class="dropdown-item" href="{{ $route }}">
                                                        <i class="fas fa-link"></i> {{ $label }}
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- Pagination -->
                <div class="pagination-wrapper">
                    {{ $projectKwitansis->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
