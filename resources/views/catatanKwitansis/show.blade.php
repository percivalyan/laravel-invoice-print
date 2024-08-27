@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Catatan Kwitansi Details</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Details of Catatan Kwitansi</h6>
        </div>
        <div class="card-body">
            <h5 class="card-title text-primary">
                Project Kwitansi: {{ $catatanKwitansi->projectKwitansi->name ?? '-' }}
            </h5>

            <dl class="row">
                <dt class="col-sm-3">Bank Pembayaran:</dt>
                <dd class="col-sm-9">{{ $catatanKwitansi->bank_pembayaran }}</dd>

                <dt class="col-sm-3">Cabang:</dt>
                <dd class="col-sm-9">{{ $catatanKwitansi->cabang }}</dd>

                <dt class="col-sm-3">Nomor Rekening:</dt>
                <dd class="col-sm-9">{{ $catatanKwitansi->nomor_rekening }}</dd>

                <dt class="col-sm-3">Atas Nama:</dt>
                <dd class="col-sm-9">{{ $catatanKwitansi->atas_nama }}</dd>

                <dt class="col-sm-3">Penanggung Jawab:</dt>
                <dd class="col-sm-9">{{ $catatanKwitansi->penanggung_jawab }}</dd>

                <dt class="col-sm-3">Nama Penerima:</dt>
                <dd class="col-sm-9">{{ $catatanKwitansi->nama_penerima }}</dd>

                <dt class="col-sm-3">Tanggal Diterima Penerima:</dt>
                <dd class="col-sm-9">{{ $catatanKwitansi->tanggal_diterima_penerima ? $catatanKwitansi->tanggal_diterima_penerima->format('d/m/Y') : '-' }}</dd>

                <dt class="col-sm-3">Waktu Diterima Penerima:</dt>
                <dd class="col-sm-9">{{ $catatanKwitansi->waktu_diterima_penerima }}</dd>

                <dt class="col-sm-3">Nama Driver:</dt>
                <dd class="col-sm-9">{{ $catatanKwitansi->nama_driver }}</dd>

                <dt class="col-sm-3">Tanggal Diterima Driver:</dt>
                <dd class="col-sm-9">{{ $catatanKwitansi->tanggal_diterima_driver ? $catatanKwitansi->tanggal_diterima_driver->format('d/m/Y') : '-' }}</dd>

                <dt class="col-sm-3">Waktu Diterima Driver:</dt>
                <dd class="col-sm-9">{{ $catatanKwitansi->waktu_diterima_driver }}</dd>

                <dt class="col-sm-3">Nama ADM Kantor:</dt>
                <dd class="col-sm-9">{{ $catatanKwitansi->nama_adm_kantor }}</dd>

                <dt class="col-sm-3">Tanggal Diterima ADM Kantor:</dt>
                <dd class="col-sm-9">{{ $catatanKwitansi->tanggal_diterima_adm_kantor ? $catatanKwitansi->tanggal_diterima_adm_kantor->format('d/m/Y') : '-' }}</dd>

                <dt class="col-sm-3">Waktu Diterima ADM Kantor:</dt>
                <dd class="col-sm-9">{{ $catatanKwitansi->waktu_diterima_adm_kantor }}</dd>
            </dl>
        </div>
        <div class="card-footer text-end">
            <a href="{{ route('catatanKwitansis.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Back to List
            </a>
            <a href="{{ route('catatanKwitansis.edit', $catatanKwitansi->id) }}" class="btn btn-warning ms-2">
                <i class="fas fa-edit"></i> Edit
            </a>

            
            <form action="{{ route('catatanKwitansis.destroy', $catatanKwitansi->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure you want to delete this record?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger ms-2">
                    <i class="fas fa-trash"></i> Delete
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
