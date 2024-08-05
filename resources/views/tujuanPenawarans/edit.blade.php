@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Tujuan Penawaran</h1>
    <form action="{{ route('tujuanPenawarans.update', $tujuanPenawaran->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="project_penawaran">Project Penawaran</label>
            <input type="text" class="form-control" id="project_penawaran" name="project_penawaran" value="{{ $tujuanPenawaran->projectPenawaran->proyek }}" readonly>
        </div>
        <div class="form-group">
            <label for="pengajuan">Pengajuan</label>
            <input type="text" class="form-control" id="pengajuan" name="pengajuan" value="{{ old('pengajuan', $tujuanPenawaran->pengajuan) }}">
        </div>
        <div class="form-group">
            <label for="tujuan">Tujuan</label>
            <input type="text" class="form-control" id="tujuan" name="tujuan" value="{{ old('tujuan', $tujuanPenawaran->tujuan) }}">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
