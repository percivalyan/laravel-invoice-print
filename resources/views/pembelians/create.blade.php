@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Pembelian</h1>

    <form action="{{ route('pembelians.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="project_pembelian_id">Project Pembelian ID</label>
            <input type="number" name="project_pembelian_id" id="project_pembelian_id" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="nama_bahan">Nama Bahan</label>
            <input type="text" name="nama_bahan" id="nama_bahan" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="keterangan">Keterangan</label>
            <textarea name="keterangan" id="keterangan" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="jumlah">Jumlah</label>
            <input type="number" name="jumlah" id="jumlah" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="harga_satuan">Harga Satuan</label>
            <input type="number" name="harga_satuan" id="harga_satuan" class="form-control" step="0.01" required>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection
