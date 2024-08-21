@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h2>Edit Pembelian</h2>

            <form action="{{ route('pembelians.update', $pembelian->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="nama_bahan">Nama Bahan:</label>
                    <input type="text" name="nama_bahan" class="form-control" value="{{ $pembelian->nama_bahan }}" required>
                </div>

                <div class="form-group">
                    <label for="jumlah">Jumlah:</label>
                    <input type="number" name="jumlah" class="form-control" value="{{ $pembelian->jumlah }}" required>
                </div>

                <div class="form-group">
                    <label for="harga_satuan">Harga Satuan:</label>
                    <input type="number" name="harga_satuan" class="form-control" value="{{ $pembelian->harga_satuan }}" required>
                </div>

                <div class="form-group">
                    <label for="keterangan">Keterangan:</label>
                    <textarea name="keterangan" class="form-control">{{ $pembelian->keterangan }}</textarea>
                </div>

                <!-- Hidden input to store bahan_pembelian_id -->
                <input type="hidden" name="bahan_pembelian_id" value="{{ $bahanPembelianId }}">

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection
