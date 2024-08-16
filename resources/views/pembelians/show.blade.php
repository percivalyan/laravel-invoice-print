@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Pembelian</h1>

    <div class="card">
        <div class="card-body">
            <p><strong>ID:</strong> {{ $pembelian->id }}</p>
            <p><strong>Project Pembelian ID:</strong> {{ $pembelian->project_pembelian_id }}</p>
            <p><strong>Nama Bahan:</strong> {{ $pembelian->nama_bahan }}</p>
            <p><strong>Keterangan:</strong> {{ $pembelian->keterangan }}</p>
            <p><strong>Jumlah:</strong> {{ $pembelian->jumlah }}</p>
            <p><strong>Harga Satuan:</strong> {{ $pembelian->harga_satuan }}</p>
            <a href="{{ route('pembelians.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
</div>
@endsection
