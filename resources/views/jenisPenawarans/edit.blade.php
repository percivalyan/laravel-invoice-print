@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Jenis Pekerjaan Penawaran</h1>
    <form action="{{ route('jenisPenawarans.update', $jenisPekerjaanPenawaran->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="uraian_jenis_pekerjaan_penawaran_id">Uraian Jenis Pekerjaan</label>
            <select name="uraian_jenis_pekerjaan_penawaran_id" id="uraian_jenis_pekerjaan_penawaran_id" class="form-control" required>
                @foreach($uraianJenisPekerjaan as $uraian)
                    <option value="{{ $uraian->id }}" {{ $uraian->id == $jenisPekerjaanPenawaran->uraian_jenis_pekerjaan_penawaran_id ? 'selected' : '' }}>
                        {{ $uraian->uraian }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="jenis_pekerjaan">Jenis Pekerjaan</label>
            <input type="text" name="jenis_pekerjaan" id="jenis_pekerjaan" class="form-control" value="{{ $jenisPekerjaanPenawaran->jenis_pekerjaan }}" required>
        </div>
        <div class="form-group">
            <label for="quantitas">Quantitas</label>
            <input type="number" name="quantitas" id="quantitas" class="form-control" value="{{ $jenisPekerjaanPenawaran->quantitas }}">
        </div>
        <div class="form-group">
            <label for="unit">Unit</label>
            <input type="text" name="unit" id="unit" class="form-control" value="{{ $jenisPekerjaanPenawaran->unit }}">
        </div>
        <div class="form-group">
            <label for="harga_satuan">Harga Satuan</label>
            <input type="number" name="harga_satuan" id="harga_satuan" class="form-control" value="{{ $jenisPekerjaanPenawaran->harga_satuan }}">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('jenisPenawarans.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
