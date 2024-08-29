@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="h3 mb-4 text-gray-800">Detail Catatan Pembelian</h1>

        <!-- Main Card -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <h5 class="card-title font-weight-bold text-primary">
                    Catatan Pembelian ID: {{ $catatanPembelian->id }}
                </h5>

                <!-- Table for Details -->
                <table class="table table-striped table-hover mt-4">
                    <tbody>
                        <tr>
                            <th>Proyek Pembelian:</th>
                            <td>{{ $catatanPembelian->projectPembelian->nama_proyek ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Waktu Pengiriman:</th>
                            <td>{{ $catatanPembelian->waktu_pengiriman }}</td>
                        </tr>
                        <tr>
                            <th>Alamat Pengiriman:</th>
                            <td>{{ $catatanPembelian->alamat_pengiriman }}</td>
                        </tr>
                        <tr>
                            <th>Contact Person:</th>
                            <td>{{ $catatanPembelian->contact_person }}</td>
                        </tr>
                        <tr>
                            <th>Pembayaran:</th>
                            <td>{{ $catatanPembelian->pembayaran }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="d-flex justify-content-between mt-4">
            <div>
                <a href="{{ route('catatanPembelians.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left me-2"></i>Masuk ke Semua Daftar Catatan
                </a>
                <a href="{{ route('projectPembelians.index') }}" class="btn btn-warning ms-2">
                    <i class="fas fa-arrow-left me-2"></i>Kembali ke Daftar Purchase Order
                </a>
            </div>
            <div>
                <a href="{{ route('catatanPembelians.edit', $catatanPembelian->id) }}" class="btn btn-primary">
                    <i class="fas fa-edit me-2"></i>Edit
                </a>
                <form action="{{ route('catatanPembelians.destroy', $catatanPembelian->id) }}" method="POST" class="d-inline ms-2" onsubmit="return confirm('Are you sure you want to delete this record?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        <i class="fas fa-trash me-2"></i>Delete
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
