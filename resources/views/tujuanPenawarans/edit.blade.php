@extends('backend.layouts.master')

@section('title', 'Surat Penawaran')

@section('admin-content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit Tujuan Penawaran Surat Penawaran</h1>
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

                    <input type="hidden" name="project_penawaran_id" value="{{ $tujuanPenawaran->project_penawaran_id }}">

                    <div class="form-group">
                        <label for="pengajuan">Pengajuan</label>
                        <input type="text" class="form-control @error('pengajuan') is-invalid @enderror" id="pengajuan"
                            name="pengajuan" value="{{ old('pengajuan', $tujuanPenawaran->pengajuan) }}" required>
                        @error('pengajuan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="tujuan">Tujuan</label>
                        <input type="text" class="form-control @error('tujuan') is-invalid @enderror" id="tujuan"
                            name="tujuan" value="{{ old('tujuan', $tujuanPenawaran->tujuan) }}" required>
                        @error('tujuan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
