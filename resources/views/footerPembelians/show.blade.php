@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Footer Pembelian Details</h1>
    
    <div class="card">
        <div class="card-body">
            <p><strong>ID:</strong> {{ $footerPembelian->id }}</p>
            <p><strong>Project Pembelian:</strong> {{ $footerPembelian->projectPembelian->name }}</p>
            <p><strong>Diorder Oleh:</strong> {{ $footerPembelian->diorder_oleh }}</p>
            <p><strong>Diorder Oleh Jabatan:</strong> {{ $footerPembelian->diorder_oleh_jabatan }}</p>
            <p><strong>Disetujui Oleh:</strong> {{ $footerPembelian->disetujui_oleh }}</p>
            <p><strong>Disetujui Oleh Jabatan:</strong> {{ $footerPembelian->disetujui_oleh_jabatan }}</p>
            <p><strong>Order Diterima Oleh:</strong> {{ $footerPembelian->order_diterima_oleh }}</p>
            <p><strong>Order Diterima Oleh Jabatan:</strong> {{ $footerPembelian->order_diterima_oleh_jabatan }}</p>
            
            <a href="{{ route('footerPembelians.edit', $footerPembelian->id) }}" class="btn btn-warning">Edit</a>
            <a href="{{ route('footerPembelians.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
</div>
@endsection
