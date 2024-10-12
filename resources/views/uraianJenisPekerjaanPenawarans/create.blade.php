@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tambah Uraian Jenis Pekerjaan Penawaran</h1>
        </div>

        <!-- Form Card -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Uraian Jenis Pekerjaan Penawaran</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('uraianJenisPekerjaanPenawarans.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="jenis_penawaran_id">Jenis Penawaran</label>
                        <select name="jenis_penawaran_id" id="jenis_penawaran_id" class="form-control" required>
                            <option value="">Pilih Jenis Penawaran</option>
                            @foreach ($jenisPenawarans as $jenis)
                                <option value="{{ $jenis->id }}"
                                    {{ $jenis_penawaran_id == $jenis->id ? 'selected' : '' }}>
                                    {{ $jenis->jenis_pekerjaan }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="uraian">Uraian</label>
                        <input type="text" name="uraian" id="uraian" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="jenis_pekerjaan">Jenis Pekerjaan</label>
                        <input type="text" name="jenis_pekerjaan" id="jenis_pekerjaan" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="quantitas">Quantitas</label>
                        <input type="number" name="quantitas" id="quantitas" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="unit">Unit</label>
                        <input type="text" name="unit" id="unit" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="harga_satuan">Harga Satuan</label>
                        <input type="number" name="harga_satuan" id="harga_satuan" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
