@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Uraian Jenis Pekerjaan Penawaran</h1>
    <form action="{{ route('uraianJenisPekerjaanPenawarans.update', $uraianJenisPekerjaanPenawaran->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="uraian">Uraian</label>
            <input type="text" name="uraian" id="uraian" class="form-control" value="{{ $uraianJenisPekerjaanPenawaran->uraian }}" required>
        </div>
        <div class="form-group">
            <label for="jenis_pekerjaan">Jenis Pekerjaan</label>
            <input type="text" name="jenis_pekerjaan" id="jenis_pekerjaan" class="form-control" value="{{ $uraianJenisPekerjaanPenawaran->jenis_pekerjaan }}" required>
        </div>
        <div class="form-group">
            <label for="quantitas">Quantitas</label>
            <input type="number" name="quantitas" id="quantitas" class="form-control" value="{{ $uraianJenisPekerjaanPenawaran->quantitas }}">
        </div>
        <div class="form-group">
            <label for="unit">Unit</label>
            <input type="text" name="unit" id="unit" class="form-control" value="{{ $uraianJenisPekerjaanPenawaran->unit }}">
        </div>
        <div class="form-group">
            <label for="harga_satuan">Harga Satuan</label>
            <input type="number" name="harga_satuan" id="harga_satuan" class="form-control" value="{{ $uraianJenisPekerjaanPenawaran->harga_satuan }}">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('uraianJenisPekerjaanPenawarans.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
