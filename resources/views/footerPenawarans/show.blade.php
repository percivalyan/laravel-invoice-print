<!-- resources/views/footerPenawarans/show.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Footer Penawaran Details</h1>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Footer Penawaran ID: {{ $footerPenawaran->id }}</h5>
            <p class="card-text"><strong>Project Penawaran:</strong> {{ $footerPenawaran->projectPenawaran->proyek }}</p>
            <p class="card-text"><strong>Nama:</strong> {{ $footerPenawaran->nama }}</p>
            <p class="card-text"><strong>Jabatan:</strong> {{ $footerPenawaran->jabatan }}</p>
            <a href="{{ route('footerPenawarans.index') }}" class="btn btn-secondary">Back to List</a>
        </div>
    </div>
</div>
@endsection
