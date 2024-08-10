@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Jenis Penawaran</h1>
    
    <form action="{{ route('jenisPenawarans.update', $jenisPenawaran) }}" method="POST">
        @csrf
        @method('PUT')
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
    </form>
</div>
@endsection
