<!-- resources/views/penawarans/show.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Penawaran Details</h1>
    <div class="mb-3">
        <strong>Project Penawaran:</strong> {{ $penawaran->projectPenawaran->proyek ?? 'N/A' }}
    </div>
    <div class="mb-3">
        <strong>Uraian:</strong> {{ $penawaran->uraian }}
    </div>
    <div class="mb-3">
        <strong>Qty:</strong> {{ $penawaran->qty }}
    </div>
    <div class="mb-3">
        <strong>Unit:</strong> {{ $penawaran->unit }}
    </div>
    <div class="mb-3">
        <strong>Harga Satuan:</strong> {{ $penawaran->harga_satuan }}
    </div>
    <div class="mb-3">
        <strong>Jumlah:</strong> {{ $penawaran->jumlah }}
    </div>
    <div class="mb-3">
        <strong>Total:</strong> {{ $penawaran->total }}
    </div>
    <div class="mb-3">
        <strong>Terbilang:</strong> {{ $penawaran->terbilang }}
    </div>
    <a href="{{ route('penawarans.edit', $penawaran->id) }}" class="btn btn-warning">Edit</a>
    <a href="{{ route('penawarans.index') }}" class="btn btn-secondary">Back to List</a>
</div>
@endsection
