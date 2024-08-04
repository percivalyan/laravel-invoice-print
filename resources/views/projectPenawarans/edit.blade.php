<!-- resources/views/projectPenawarans/edit.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Project Penawaran</h1>
    <form action="{{ route('projectPenawarans.update', $projectPenawaran->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="kepada">Kepada</label>
            <input type="text" name="kepada" class="form-control" id="kepada" value="{{ old('kepada', $projectPenawaran->kepada) }}">
            @error('kepada')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="nomor">Nomor</label>
            <input type="text" name="nomor" class="form-control" id="nomor" value="{{ old('nomor', $projectPenawaran->nomor) }}">
            @error('nomor')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="tanggal">Tanggal</label>
            <input type="date" name="tanggal" class="form-control" id="tanggal" value="{{ old('tanggal', $projectPenawaran->tanggal) }}">
            @error('tanggal')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="proyek">Proyek</label>
            <input type="text" name="proyek" class="form-control" id="proyek" value="{{ old('proyek', $projectPenawaran->proyek) }}">
            @error('proyek')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="lokasi">Lokasi</label>
            <input type="text" name="lokasi" class="form-control" id="lokasi" value="{{ old('lokasi', $projectPenawaran->lokasi) }}">
            @error('lokasi')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('projectPenawarans.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
