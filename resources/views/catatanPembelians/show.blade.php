@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Catatan Pembelian</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Catatan Pembelian ID: {{ $catatanPembelian->id }}</h5>
            <P class="card-title">Proyek Pembelian: {{ $catatanPembelian->projectPembelian->nama_proyek ?? '-' }}</P>
            <p class="card-text">Waktu Pengiriman: {{ $catatanPembelian->waktu_pengiriman }}</p>
            <p class="card-text">Alamat Pengiriman: {{ $catatanPembelian->alamat_pengiriman }}</p>
            <p class="card-text">Contact Person: {{ $catatanPembelian->contact_person }}</p>
            <p class="card-text">Pembayaran: {{ $catatanPembelian->pembayaran }}</p>
        </div>
    </div>

    <a href="{{ route('catatanPembelians.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</div>
@endsection
