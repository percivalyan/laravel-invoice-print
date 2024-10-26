@extends('backend.layouts.master')

@section('title', 'Surat Penawaran')

@section('admin-content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Atur Tandatangan Surat Penawaran</h1>
        </div>

        <!-- Form Card -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Atur Tandatangan</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('footerPenawarans.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="project_penawaran_id" value="{{ $projectPenawaran->id }}">

                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama"
                            name="nama" value="{{ old('nama') }}" required>
                        @error('nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="jabatan">Jabatan</label>
                        <input type="text" class="form-control @error('jabatan') is-invalid @enderror" id="jabatan"
                            name="jabatan" value="{{ old('jabatan') }}" required>
                        @error('jabatan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
