@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Jenis Pekerjaan Penawaran Details</h1>
    <div class="card">
        <div class="card-body">
            <p><strong>ID:</strong> {{ $jenisPenawaran->id }}</p>
            <p><strong>Uraian Jenis Pekerjaan:</strong> {{ $jenisPenawaran->uraianJenisPekerjaanPenawaran->uraian ?? 'N/A' }}</p>
            <p><strong>Jenis Pekerjaan:</strong> {{ $jenisPenawaran->jenis_pekerjaan }}</p>
            <p><strong>Quantitas:</strong> {{ $jenisPenawaran->quantitas }}</p>
            <p><strong>Unit:</strong> {{ $jenisPenawaran->unit }}</p>
            <p><strong>Harga Satuan:</strong> {{ $jenisPenawaran->harga_satuan }}</p>
            <a href="{{ route('jenisPenawarans.index') }}" class="btn btn-secondary">Back to List</a>
        </div>
    </div>
</div>
@endsection
