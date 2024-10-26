@extends('backend.layouts.master')

@section('title')
    SP/INV/BAST
@endsection

@section('admin-content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Daftar Catatan Kwitansi</h1>

        <!-- Action Buttons -->
        <div class="mb-3">
            <a href="{{ route('projectKwitansis.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Kembali ke Surat
            </a>
        </div>

        <!-- Search Form -->
        <form action="{{ route('catatanKwitansis.index') }}" method="GET" class="mb-4">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search by Proyek or Kepada Yth"
                    value="{{ request('search') }}">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-search"></i> Search
                </button>
            </div>
        </form>

        <!-- Success Message -->
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Catatan Kwitansi List -->
        <div class="row">
            @forelse($catatanKwitansis as $catatanKwitansi)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card shadow h-100">
                        <div class="card-body">
                            <h5 class="card-title mb-3">
                                <span class="text-primary">Project Kwitansi:</span>
                                {{ $catatanKwitansi->projectKwitansi->proyek ?? '-' }} -
                                {{ $catatanKwitansi->projectKwitansi->kepada_yth ?? '-' }}
                            </h5>

                            <div class="mt-3">
                                <!-- Bank Information -->
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="bank_pembayaran">Bank Pembayaran</label>
                                            <p class="text-primary">{{ $catatanKwitansi->bank_pembayaran }}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="cabang">Cabang</label>
                                            <p class="text-primary">{{ $catatanKwitansi->cabang }}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nomor_rekening">Nomor Rekening</label>
                                            <p class="text-primary">{{ $catatanKwitansi->nomor_rekening }}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="atas_nama">Atas Nama</label>
                                            <p class="text-primary">{{ $catatanKwitansi->atas_nama }}</p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Catatan -->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nama_penerima">Nama Penerima</label>
                                            <p class="text-primary">{{ $catatanKwitansi->nama_penerima }}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="tanggal_diterima_penerima">Tgl-Diterima</label>
                                            <p class="text-primary">{{ $catatanKwitansi->tanggal_diterima_penerima }}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="waktu_diterima_penerima">Jam-Diterima</label>
                                            <p class="text-primary">{{ $catatanKwitansi->waktu_diterima_penerima }}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nama_driver">Driver</label>
                                            <p class="text-primary">{{ $catatanKwitansi->nama_driver }}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="tanggal_diterima_driver">Tgl-Diterima</label>
                                            <p class="text-primary">{{ $catatanKwitansi->tanggal_diterima_driver }}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="waktu_diterima_driver">Jam-Diterima</label>
                                            <p class="text-primary">{{ $catatanKwitansi->waktu_diterima_driver }}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="nama_adm_kantor">Admin Kantor</label>
                                            <p class="text-primary">{{ $catatanKwitansi->nama_adm_kantor }}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="tanggal_diterima_adm_kantor">Tgl-Diterima</label>
                                            <p class="text-primary">{{ $catatanKwitansi->tanggal_diterima_adm_kantor }}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="waktu_diterima_adm_kantor">Jam-Diterima</label>
                                            <p class="text-primary">{{ $catatanKwitansi->waktu_diterima_adm_kantor }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4">
                                <a href="{{ route('catatanKwitansis.show', $catatanKwitansi->id) }}"
                                    class="btn btn-info btn-sm">
                                    <i class="fas fa-eye"></i> View
                                </a>
                                <a href="{{ route('catatanKwitansis.edit', $catatanKwitansi->id) }}"
                                    class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('catatanKwitansis.destroy', $catatanKwitansi->id) }}" method="POST"
                                    style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Anda yakin ingin menghapus catatan kwitansi ini?');">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-warning">No Catatan Kwitansi found.</div>
                </div>
            @endforelse
        </div>
    </div>
@endsection
