@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Daftar Catatan Kwitansi</h1>
    
    <!-- Action Buttons -->
    <div class="mb-3">
        <a href="{{ route('projectKwitansis.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Kembali ke Surat
        </a>
    </div>

    <!-- Success Message -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Catatan Kwitansi List -->
    <div class="row">
        @forelse($catatanKwitansis as $catatanKwitansi)
            <div class="col-lg-12 col-md-6 mb-4">
                <div class="card shadow h-100">
                    <div class="card-body">
                        <h5 class="card-title mb-3">
                            <span class="text-primary">Project Kwitansi:</span> {{ $catatanKwitansi->projectKwitansi->name ?? '-' }}
                        </h5>
                        <h6 class="card-subtitle mb-2 text-muted">ID: {{ $catatanKwitansi->id }}</h6>
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

                            <!-- Penanggung Jawab -->
                            <div class="form-group mb-3">
                                <label for="penanggung_jawab">Penanggung Jawab</label>
                                <p class="text-primary">{{ $catatanKwitansi->penanggung_jawab }}</p>
                            </div>

                            <!-- Catatan -->
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="nama_penerima">Nama Penerima</label>
                                        <p class="text-primary">{{ $catatanKwitansi->nama_penerima }}</p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="tanggal_diterima_penerima">Tanggal Diterima Penerima</label>
                                        <p class="text-primary">{{ $catatanKwitansi->tanggal_diterima_penerima }}</p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="waktu_diterima_penerima">Waktu Diterima Penerima</label>
                                        <p class="text-primary">{{ $catatanKwitansi->waktu_diterima_penerima }}</p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="nama_driver">Nama Driver</label>
                                        <p class="text-primary">{{ $catatanKwitansi->nama_driver }}</p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="tanggal_diterima_driver">Tanggal Diterima Driver</label>
                                        <p class="text-primary">{{ $catatanKwitansi->tanggal_diterima_driver }}</p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="waktu_diterima_driver">Waktu Diterima Driver</label>
                                        <p class="text-primary">{{ $catatanKwitansi->waktu_diterima_driver }}</p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="nama_adm_kantor">Nama ADM Kantor</label>
                                        <p class="text-primary">{{ $catatanKwitansi->nama_adm_kantor }}</p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="tanggal_diterima_adm_kantor">Tanggal Diterima ADM Kantor</label>
                                        <p class="text-primary">{{ $catatanKwitansi->tanggal_diterima_adm_kantor }}</p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="waktu_diterima_adm_kantor">Waktu Diterima ADM Kantor</label>
                                        <p class="text-primary">{{ $catatanKwitansi->waktu_diterima_adm_kantor }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4">
                            <a href="{{ route('catatanKwitansis.show', $catatanKwitansi->id) }}" class="btn btn-info btn-sm">
                                <i class="fas fa-eye"></i> View
                            </a>
                            <a href="{{ route('catatanKwitansis.edit', $catatanKwitansi->id) }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('catatanKwitansis.destroy', $catatanKwitansi->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus catatan kwitansi ini?');">
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
