@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Daftar Catatan Pembelian</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="row">
        @foreach($catatanPembelians as $catatan)
            <div class="col-lg-12 col-md-12 mb-4">
                <div class="card shadow h-100 py-2">
                    <div class="card-body">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Proyek Pembelian: {{ $catatan->projectPembelian->project ?? '-' }}
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            ID: {{ $catatan->id }}
                        </div>
                        <div class="text-gray-800">
                            <p><strong>Waktu Pengiriman:</strong> {{ $catatan->waktu_pengiriman }}</p>
                            <p><strong>Alamat Pengiriman:</strong> {{ $catatan->alamat_pengiriman }}</p>
                            <p><strong>Contact Person:</strong> {{ $catatan->contact_person }}</p>
                            <p><strong>Pembayaran:</strong> {{ $catatan->pembayaran }}</p>
                        </div>
                        <div class="mt-3">
                            <a href="{{ route('catatanPembelians.edit', $catatan->id) }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('catatanPembelians.destroy', $catatan->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus catatan pembelian ini?');">
                                    <i class="fas fa-trash"></i> Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
