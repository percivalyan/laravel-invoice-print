@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Tujuan Penawaran</h1>
    </div>

    <!-- Form Card -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Tujuan Penawaran</h6>
        </div>
        <div class="card-body">
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
    </div>
</div>
@endsection
