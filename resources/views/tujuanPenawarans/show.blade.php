<!-- resources/views/tujuanPenawarans/show.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tujuan Penawaran Details</h1>
    <div class="card">
        <div class="card-header">
            Tujuan Penawaran
        </div>
        <div class="card-body">
            <h5 class="card-title">Project Penawaran: {{ $tujuanPenawaran->projectPenawaran->proyek }}</h5>
            <p class="card-text"><strong>Pengajuan:</strong> {{ $tujuanPenawaran->pengajuan }}</p>
            <p class="card-text"><strong>Tujuan:</strong> {{ $tujuanPenawaran->tujuan }}</p>
            <a href="{{ route('tujuanPenawarans.index') }}" class="btn btn-primary">Back</a>
        </div>
    </div>
</div>
@endsection
