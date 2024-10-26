@extends('backend.layouts.master')

@section('title')
    SP/INV/BAST
@endsection

@section('admin-content')
    <div class="container-fluid">
        <!-- Error Alert -->
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Whoops!</strong> There were some problems with your input.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Card for Edit Uraian Kwitansi -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit Uraian Kwitansi</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('uraianKwitansis.update', $uraianKwitansi->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Nama Uraian Field -->
                    <div class="form-group">
                        <label for="nama_uraian">Nama Uraian</label>
                        <input type="text" class="form-control @error('nama_uraian') is-invalid @enderror"
                               id="nama_uraian" name="nama_uraian" 
                               value="{{ old('nama_uraian', $uraianKwitansi->nama_uraian) }}" required>
                        @error('nama_uraian')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Jumlah Field -->
                    <div class="form-group">
                        <label for="jumlah_uraian">Jumlah</label>
                        <input type="number" class="form-control @error('jumlah_uraian') is-invalid @enderror"
                               id="jumlah_uraian" name="jumlah_uraian"
                               value="{{ old('jumlah_uraian', $uraianKwitansi->jumlah_uraian) }}">
                        @error('jumlah_uraian')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Satuan Field -->
                    <div class="form-group">
                        <label for="satuan_uraian">Satuan</label>
                        <input type="text" class="form-control @error('satuan_uraian') is-invalid @enderror"
                               id="satuan_uraian" name="satuan_uraian"
                               value="{{ old('satuan_uraian', $uraianKwitansi->satuan_uraian) }}">
                        @error('satuan_uraian')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Keterangan Field -->
                    <div class="form-group">
                        <label for="keterangan_uraian">Keterangan</label>
                        <textarea class="form-control @error('keterangan_uraian') is-invalid @enderror"
                                  id="keterangan_uraian" name="keterangan_uraian" rows="3">{{ old('keterangan_uraian', $uraianKwitansi->keterangan_uraian) }}</textarea>
                        @error('keterangan_uraian')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Hidden input for batch_kwitansi_id -->
                    <input type="hidden" name="batch_kwitansi_id" value="{{ $batchKwitansiId }}">

                    <!-- Submit Button -->
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save mr-1"></i> Update Pembelian
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
