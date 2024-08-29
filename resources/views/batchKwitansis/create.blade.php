@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3 text-gray-800">Tambah Batch Kwitansi Baru</h1>
        </div>

        <div class="card shadow-sm">
            <div class="card-body">
                <form action="{{ route('batchKwitansis.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="nama_batch" class="form-label">Nama Batch</label>
                        <input type="text" class="form-control @error('nama_batch') is-invalid @enderror" id="nama_batch" name="nama_batch" value="{{ old('nama_batch') }}" placeholder="Masukkan nama batch">
                        @error('nama_batch')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="jumlah_batch" class="form-label">Jumlah Batch</label>
                        <input type="number" class="form-control @error('jumlah_batch') is-invalid @enderror" id="jumlah_batch" name="jumlah_batch" value="{{ old('jumlah_batch') }}" placeholder="Masukkan jumlah batch">
                        @error('jumlah_batch')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="satuan_batch" class="form-label">Satuan</label>
                        <input type="text" class="form-control @error('satuan_batch') is-invalid @enderror" id="satuan_batch" name="satuan_batch" value="{{ old('satuan_batch') }}" placeholder="Masukkan satuan batch">
                        @error('satuan_batch')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="keterangan_batch" class="form-label">Keterangan</label>
                        <textarea class="form-control @error('keterangan_batch') is-invalid @enderror" id="keterangan_batch" name="keterangan_batch" rows="3" placeholder="Masukkan keterangan">{{ old('keterangan_batch') }}</textarea>
                        @error('keterangan_batch')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label for="dimensi_panjang" class="form-label">Dimensi Panjang</label>
                            <input type="number" step="0.01" class="form-control @error('dimensi_panjang') is-invalid @enderror" id="dimensi_panjang" name="dimensi_panjang" value="{{ old('dimensi_panjang') }}" placeholder="Masukkan dimensi panjang">
                            @error('dimensi_panjang')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-3 mb-3">
                            <label for="dimensi_lebar" class="form-label">Dimensi Lebar</label>
                            <input type="number" step="0.01" class="form-control @error('dimensi_lebar') is-invalid @enderror" id="dimensi_lebar" name="dimensi_lebar" value="{{ old('dimensi_lebar') }}" placeholder="Masukkan dimensi lebar">
                            @error('dimensi_lebar')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-3 mb-3">
                            <label for="dimensi_tinggi" class="form-label">Dimensi Tinggi</label>
                            <input type="number" step="0.01" class="form-control @error('dimensi_tinggi') is-invalid @enderror" id="dimensi_tinggi" name="dimensi_tinggi" value="{{ old('dimensi_tinggi') }}" placeholder="Masukkan dimensi tinggi">
                            @error('dimensi_tinggi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-3 mb-3">
                            <label for="dimensi_berat" class="form-label">Dimensi Berat</label>
                            <input type="number" step="0.01" class="form-control @error('dimensi_berat') is-invalid @enderror" id="dimensi_berat" name="dimensi_berat" value="{{ old('dimensi_berat') }}" placeholder="Masukkan dimensi berat">
                            @error('dimensi_berat')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="d-flex justify-content-end mt-4">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                        <a href="{{ route('batchKwitansis.index') }}" class="btn btn-secondary ms-2"><i class="fas fa-arrow-left"></i> Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
