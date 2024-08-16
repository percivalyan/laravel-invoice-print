@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detail Bahan Pembelian</h1>

    <div class="card">
        <div class="card-body">
            <p><strong>ID:</strong> {{ $bahanPembelian->id }}</p>
            <p><strong>Project Pembelian ID:</strong> {{ $bahanPembelian->project_pembelian_id }}</p>
            <p><strong>Pembelian:</strong> {{ $bahanPembelian->pembelian }}</p>
            <a href="{{ route('bahanPembelians.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
</div>
@endsection
