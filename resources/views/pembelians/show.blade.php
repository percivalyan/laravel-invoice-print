@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h2>Detail Pembelian</h2>
            <a class="btn btn-primary mb-3" href="{{ route('pembelians.index') }}">Back</a>

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $pembelian->nama_bahan }}</h5>
                    <p class="card-text"><strong>Jumlah:</strong> {{ $pembelian->jumlah }}</p>
                    <p class="card-text"><strong>Harga Satuan:</strong> {{ $pembelian->harga_satuan }}</p>
                    <p class="card-text"><strong>Keterangan:</strong> {{ $pembelian->keterangan }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
