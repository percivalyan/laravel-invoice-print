@extends('backend.layouts.master')

@section('title')
    Surat Penawaran Pages
@endsection

@section('admin-content')
<div class="container">
    <h1>Detail Uraian Jenis Pekerjaan Penawaran</h1>
    <div class="card">
        <div class="card-header">
            Detail Uraian
        </div>
        <div class="card-body">
            <p><strong>Jenis Penawaran:</strong> {{ $uraianJenisPekerjaanPenawaran->jenisPenawaran->nama }}</p>
            <p><strong>Uraian:</strong> {{ $uraianJenisPekerjaanPenawaran->uraian }}</p>
            {{-- <p><strong>Jenis Pekerjaan:</strong> {{ $uraianJenisPekerjaanPenawaran->jenis_pekerjaan }}</p> --}}
            <p><strong>Quantitas:</strong> {{ $uraianJenisPekerjaanPenawaran->quantitas }}</p>
            <p><strong>Unit:</strong> {{ $uraianJenisPekerjaanPenawaran->unit }}</p>
            <p><strong>Harga Satuan:</strong> {{ $uraianJenisPekerjaanPenawaran->harga_satuan }}</p>
            <a href="{{ route('uraianJenisPekerjaanPenawarans.index') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
</div>
@endsection
