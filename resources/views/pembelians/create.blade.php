@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h2>Tambah Pembelian Baru</h2>
            <a class="btn btn-primary mb-3" href="{{ route('pembelians.index') }}">Back</a>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> Ada kesalahan dalam inputan.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('pembelians.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="bahan_pembelian_id">ID Bahan Pembelian:</label>
                    <input type="text" name="bahan_pembelian_id" class="form-control" placeholder="ID Bahan Pembelian">
                </div>
                <div class="form-group">
                    <label for="nama_bahan">Nama Bahan:</label>
                    <input type="text" name="nama_bahan" class="form-control" placeholder="Nama Bahan">
                </div>
                <div class="form-group">
                    <label for="jumlah">Jumlah:</label>
                    <input type="number" name="jumlah" class="form-control" placeholder="Jumlah">
                </div>
                <div class="form-group">
                    <label for="harga_satuan">Harga Satuan:</label>
                    <input type="text" name="harga_satuan" class="form-control" placeholder="Harga Satuan">
                </div>
                <div class="form-group">
                    <label for="keterangan">Keterangan:</label>
                    <textarea name="keterangan" class="form-control" placeholder="Keterangan"></textarea>
                </div>
                <button type="submit" class="btn btn-success">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
