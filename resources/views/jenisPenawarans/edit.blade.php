@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Jenis Pekerjaan Penawaran</h1>
    <form action="{{ route('jenisPenawarans.update', $jenisPenawaran->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="uraian_jenis_pekerjaan_penawaran_id">Uraian Jenis Pekerjaan</label>
            <select id="uraian_jenis_pekerjaan_penawaran_id" class="form-control" disabled>
                @foreach($uraianJenisPekerjaan as $uraian)
                    <option value="{{ $uraian->id }}" {{ $uraian->id == $jenisPenawaran->uraian_jenis_pekerjaan_penawaran_id ? 'selected' : '' }}>
                        {{ $uraian->uraian }}
                    </option>
                @endforeach
            </select>
            <!-- Hidden input to keep the selected value -->
            <input type="hidden" name="uraian_jenis_pekerjaan_penawaran_id" value="{{ $jenisPenawaran->uraian_jenis_pekerjaan_penawaran_id }}">
        </div>
        <div class="form-group">
            <label for="jenis_pekerjaan">Jenis Pekerjaan</label>
            <input type="text" name="jenis_pekerjaan" id="jenis_pekerjaan" class="form-control" value="{{ $jenisPenawaran->jenis_pekerjaan }}" required>
        </div>
        <div class="form-group">
            <label for="quantitas">Quantitas</label>
            <input type="number" name="quantitas" id="quantitas" class="form-control" value="{{ $jenisPenawaran->quantitas }}">
        </div>
        <div class="form-group">
            <label for="unit">Unit</label>
            <input type="text" name="unit" id="unit" class="form-control" value="{{ $jenisPenawaran->unit }}">
        </div>
        <div class="form-group">
            <label for="harga_satuan">Harga Satuan</label>
            <input type="number" name="harga_satuan" id="harga_satuan" class="form-control" value="{{ $jenisPenawaran->harga_satuan }}">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('jenisPenawarans.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
