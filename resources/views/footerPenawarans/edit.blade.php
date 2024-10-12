@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Footer Penawaran</h1>
    </div>

    <!-- Form Card -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Footer Penawaran</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('footerPenawarans.update', $footerPenawaran->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="project_penawaran_id">Project Penawaran</label>
                    <!-- Readonly display field -->
                    <input type="text" class="form-control" id="project_penawaran_id" value="{{ $footerPenawaran->projectPenawaran->proyek }}" readonly>
                    <!-- Hidden field to submit project_penawaran_id -->
                    <input type="hidden" name="project_penawaran_id" value="{{ $footerPenawaran->project_penawaran_id }}">
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
    </div>
</div>
@endsection
