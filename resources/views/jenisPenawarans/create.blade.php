@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Jenis Pekerjaan Penawaran</h1>
    <form action="{{ route('jenisPenawarans.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="uraian_jenis_pekerjaan_penawaran_id">Uraian Jenis Pekerjaan</label>
            <select name="uraian_jenis_pekerjaan_penawaran_id" id="uraian_jenis_pekerjaan_penawaran_id" class="form-control" required>
                <option value="">Select Uraian Jenis Pekerjaan</option>
                @foreach($uraianJenisPekerjaan as $uraian)
                    <option value="{{ $uraian->id }}">{{ $uraian->uraian }}</option>
                @endforeach
            </select>
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
        <button type="submit" class="btn btn-primary">Save</button>
        <a href="{{ route('jenisPenawarans.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
