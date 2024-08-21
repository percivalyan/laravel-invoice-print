@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h2>Tambah Pembelian</h2>

            <form action="{{ route('pembelians.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nama_bahan">Nama Bahan:</label>
                    <input type="text" name="nama_bahan" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="jumlah">Jumlah:</label>
                    <input type="number" name="jumlah" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="harga_satuan">Harga Satuan:</label>
                    <input type="number" name="harga_satuan" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="keterangan">Keterangan:</label>
                    <textarea name="keterangan" class="form-control"></textarea>
                </div>

                <!-- Hidden input to store bahan_pembelian_id -->
                <input type="hidden" name="bahan_pembelian_id" value="{{ $bahanPembelianId }}">

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
