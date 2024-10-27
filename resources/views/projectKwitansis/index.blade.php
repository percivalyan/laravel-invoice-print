@extends('backend.layouts.master')

@section('title')
    SP/INV/BAST
@endsection

@section('admin-content')
    <div class="container-fluid">

        <!-- Page Title Area -->
        <div class="page-title-area">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <div class="breadcrumbs-area clearfix">
                        <h4 class="page-title pull-left">Daftar Project Surat Jalan / Invoice / BAST</h4>
                        <ul class="breadcrumbs pull-left">
                            <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li><span>Daftar Project Kwitansi</span></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 clearfix">
                    @include('backend.layouts.partials.logout')
                </div>
            </div>
        </div>
        <!-- End Page Title Area -->

        <!-- Success Message -->
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> {{ $message }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Search Form -->
        <form method="GET" action="{{ route('projectKwitansis.index') }}" class="py-3">
            <div class="form-group d-flex align-items-center">
                <select name="filter" class="form-control mr-2">
                    <option value="">Pilih Filter</option>
                    <option value="all" {{ request('filter') == 'all' ? 'selected' : '' }}>Cari Semua</option>
                    <option value="kepada_yth" {{ request('filter') == 'kepada_yth' ? 'selected' : '' }}>Client</option>
                    <option value="proyek" {{ request('filter') == 'proyek' ? 'selected' : '' }}>Proyek</option>
                    <option value="project_pembelian.nomor_po"
                        {{ request('filter') == 'project_pembelian.nomor_po' ? 'selected' : '' }}>Reff PO No</option>
                    <option value="nomor_surat_jalan" {{ request('filter') == 'nomor_surat_jalan' ? 'selected' : '' }}>Nomor
                        Surat Jalan</option>
                    <option value="nomor_invoice" {{ request('filter') == 'nomor_invoice' ? 'selected' : '' }}>Nomor Invoice
                    </option>
                    <option value="nomor_bast" {{ request('filter') == 'nomor_bast' ? 'selected' : '' }}>Nomor BAST</option>
                    <option value="lokasi" {{ request('filter') == 'lokasi' ? 'selected' : '' }}>Lokasi</option>
                </select>
                <input type="text" id="search" name="keyword" class="form-control mr-2"
                    value="{{ request('keyword') }}" placeholder="Cari...">
                <button type="submit" class="btn btn-sm btn-primary shadow-sm">Search</button>
            </div>
        </form>

        <!-- DataTable Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">Daftar Project SJ/INV/BAST</h6>
                <!-- Create New Project Kwitansi Button -->
                <a href="{{ route('projectKwitansis.create') }}" class="btn btn-sm btn-primary shadow-sm"
                    data-toggle="tooltip" title="Tambah Project Kwitansi Baru">
                    <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Project SJ/INV/BAST
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr class="text-center">
                                <th>No</th>
                                <th>Client</th>
                                <th>Proyek</th>
                                <th>Reff PO No</th>
                                <th>Informasi <br> Dokumen</th>
                                <th>Lokasi</th>
                                <th>Actions <br> (Pengaturan Spesifik Surat)</th>
                                <th>Pekerjaan</th>
                                <th>Surat</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($projectKwitansis as $projectKwitansi)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $projectKwitansi->kepada_yth }}</td>
                                    <td>{{ $projectKwitansi->proyek }}</td>
                                    <td>{{ $projectKwitansi->projectPembelian ? $projectKwitansi->projectPembelian->nomor_po : 'N/A' }}
                                    </td>
                                    <td>
                                        <div>
                                            <strong>Nomor Surat Jalan:</strong>
                                            {{ $projectKwitansi->nomor_surat_jalan }}<br>
                                            <strong>Nomor Invoice:</strong> {{ $projectKwitansi->nomor_invoice }}<br>
                                            <strong>Nomor BAST:</strong> {{ $projectKwitansi->nomor_bast }}
                                        </div>
                                    </td>
                                    <td>{{ $projectKwitansi->lokasi }}</td>
                                    <td class="text-center">
                                        <div class="d-inline-flex">
                                            <a href="{{ route('projectKwitansis.edit', $projectKwitansi->id) }}"
                                                class="btn btn-warning btn-sm mb-2 mr-1" title="Edit">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <form action="{{ route('projectKwitansis.destroy', $projectKwitansi->id) }}"
                                                method="POST" style="margin: 0;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger m-0 mr-1"
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                            <a href="{{ route('catatanKwitansis.create', ['project_kwitansi_id' => $projectKwitansi->id]) }}"
                                                class="btn btn-success btn-sm mb-2" title="Catatan">
                                                <i class="fas fa-sticky-note"></i> Ket.
                                            </a>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('pekerjaanKwitansis.create', ['project_kwitansi_id' => $projectKwitansi->id]) }}"
                                            class="btn btn-sm btn-success mb-2" title="Tambah Pekerjaan Baru">
                                            <i class="fas fa-box"></i> Input Pekerjaan
                                        </a>
                                        <a href="{{ route('pekerjaanKwitansis.index', ['project_kwitansi_id' => $projectKwitansi->id]) }}"
                                            class="btn btn-sm btn-info mb-2" title="Tambahkan Pekerjaan">
                                            <i class="fas fa-list"></i> Daftar Pekerjaan
                                        </a>
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
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $projectKwitansis->links() }}
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
@endsection
