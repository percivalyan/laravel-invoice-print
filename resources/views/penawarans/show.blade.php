@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Penawaran Details</h1>
    <div class="card">
        <div class="card-body">
            <p><strong>ID:</strong> {{ $penawaran->id }}</p>
            <p><strong>Project:</strong> {{ $penawaran->projectPenawaran->name ?? 'N/A' }}</p>
            <p><strong>Jenis Pekerjaan:</strong> {{ $penawaran->jenisPekerjaanPenawaran->jenis_pekerjaan ?? 'N/A' }}</p>
            <p><strong>Pekerjaan:</strong> {{ $penawaran->pekerjaan }}</p>
            <p><strong>Quantitas:</strong> {{ $penawaran->quantitas }}</p>
            <p><strong>Unit:</strong> {{ $penawaran->unit }}</p>
            <p><strong>Harga Satuan:</strong> {{ $penawaran->harga_satuan }}</p>
            <a href="{{ route('penawarans.index') }}" class="btn btn-secondary">Back to List</a>
        </div>
    </div>
</div>
@endsection
