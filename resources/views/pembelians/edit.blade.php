@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h2 class="h5 mb-0">Edit Pembelian</h2>
                    {{-- <a href="{{ route('pembelians.index') }}" class="btn btn-secondary btn-sm">
                        <i class="fas fa-arrow-left mr-1"></i> Kembali
                    </a> --}}
                    <a href="{{ route('projectPembelians.index') }}" class="btn btn-secondary text-white mb-3">
                        Kembali ke PO
                    </a> 
                </div>
                <div class="card-body">
                    <form action="{{ route('pembelians.update', $pembelian->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Nama Bahan -->
                        <div class="form-group">
                            <label for="nama_bahan" class="form-label"><strong>Nama Bahan:</strong></label>
                            <input type="text" name="nama_bahan" id="nama_bahan" class="form-control" value="{{ $pembelian->nama_bahan }}" required>
                        </div>

                        <!-- Jumlah -->
                        <div class="form-group">
                            <label for="jumlah" class="form-label"><strong>Jumlah:</strong></label>
                            <input type="number" name="jumlah" id="jumlah" class="form-control" value="{{ $pembelian->jumlah }}" required>
                        </div>

                        <!-- Harga Satuan -->
                        <div class="form-group">
                            <label for="harga_satuan" class="form-label"><strong>Harga Satuan:</strong></label>
                            <input type="number" name="harga_satuan" id="harga_satuan" class="form-control" value="{{ $pembelian->harga_satuan }}" required>
                        </div>

                        <!-- Keterangan -->
                        <div class="form-group">
                            <label for="keterangan" class="form-label"><strong>Keterangan:</strong></label>
                            <textarea name="keterangan" id="keterangan" class="form-control" rows="4">{{ $pembelian->keterangan }}</textarea>
                        </div>

                        <!-- Hidden input for bahan_pembelian_id -->
                        <input type="hidden" name="bahan_pembelian_id" value="{{ $bahanPembelianId }}">

                        <!-- Submit Button -->
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save mr-1"></i> Update Pembelian
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
