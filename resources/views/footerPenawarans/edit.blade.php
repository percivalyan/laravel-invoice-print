<!-- resources/views/footerPenawarans/edit.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Footer Penawaran</h1>
    <form action="{{ route('footerPenawarans.update', $footerPenawaran->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="project_penawaran_id">Project Penawaran</label>
            <input type="text" class="form-control" id="project_penawaran_id" name="project_penawaran_id" value="{{ $footerPenawaran->projectPenawaran->proyek }}" readonly>
        </div>
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama', $footerPenawaran->nama) }}">
        </div>
        <div class="form-group">
            <label for="jabatan">Jabatan</label>
            <input type="text" class="form-control" id="jabatan" name="jabatan" value="{{ old('jabatan', $footerPenawaran->jabatan) }}">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
