@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Uraian Jenis Pekerjaan Penawaran Details</h1>
    <div class="card">
        <div class="card-body">
            <p><strong>ID:</strong> {{ $uraianJenisPekerjaanPenawaran->id }}</p>
            <p><strong>Uraian:</strong> {{ $uraianJenisPekerjaanPenawaran->uraian }}</p>
            <p><strong>Jenis Pekerjaan:</strong> {{ $uraianJenisPekerjaanPenawaran->jenis_pekerjaan }}</p>
            <p><strong>Quantitas:</strong> {{ $uraianJenisPekerjaanPenawaran->quantitas }}</p>
            <p><strong>Unit:</strong> {{ $uraianJenisPekerjaanPenawaran->unit }}</p>
            <p><strong>Harga Satuan:</strong> {{ $uraianJenisPekerjaanPenawaran->harga_satuan }}</p>
            <a href="{{ route('uraianJenisPekerjaanPenawarans.index') }}" class="btn btn-secondary">Back to List</a>
        </div>
    </div>
</div>
@endsection
