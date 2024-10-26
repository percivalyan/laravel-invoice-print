@extends('backend.layouts.master')

@section('title')
    SP/INV/BAST
@endsection

@section('admin-content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Pekerjaan Kwitansi</h1>
        <a href="{{ route('pekerjaanKwitansis.index', ['project_kwitansi_id' => $projectKwitansiId]) }}" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm"><i class="fas fa-arrow-left fa-sm text-white-50"></i> Kembali</a>
    </div>

    <!-- Form -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('pekerjaanKwitansis.store') }}" method="POST">
                @csrf
                <input type="hidden" name="project_kwitansi_id" value="{{ $projectKwitansiId }}">

                <div class="form-group">
                    <label for="pekerjaan" class="form-label">Nama Pekerjaan</label>
                    <input type="text" class="form-control @error('pekerjaan') is-invalid @enderror" id="pekerjaan" name="pekerjaan" value="{{ old('pekerjaan') }}">
                    @error('pekerjaan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                <a href="{{ route('pekerjaanKwitansis.index', ['project_kwitansi_id' => $projectKwitansiId]) }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
            </form>
        </div>
    </div>
</div>
@endsection
