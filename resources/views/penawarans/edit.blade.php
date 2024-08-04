<!-- resources/views/penawarans/edit.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Penawaran</h1>
    <form action="{{ route('penawarans.update', $penawaran->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="project_penawaran_id">Project Penawaran</label>
            <select name="project_penawaran_id" id="project_penawaran_id" class="form-control">
                <option value="">Select Project Penawaran</option>
                @foreach ($projectPenawarans as $projectPenawaran)
                    <option value="{{ $projectPenawaran->id }}" {{ $penawaran->project_penawaran_id == $projectPenawaran->id ? 'selected' : '' }}>
                        {{ $projectPenawaran->proyek }}
                    </option>
                @endforeach
            </select>
            @error('project_penawaran_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="uraian">Uraian</label>
            <input type="text" name="uraian" class="form-control" id="uraian" value="{{ old('uraian', $penawaran->uraian) }}">
            @error('uraian')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="qty">Qty</label>
            <input type="number" name="qty" class="form-control" id="qty" value="{{ old('qty', $penawaran->qty) }}">
            @error('qty')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="unit">Unit</label>
            <input type="text" name="unit" class="form-control" id="unit" value="{{ old('unit', $penawaran->unit) }}">
            @error('unit')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="harga_satuan">Harga Satuan</label>
            <input type="number" name="harga_satuan" class="form-control" id="harga_satuan" value="{{ old('harga_satuan', $penawaran->harga_satuan) }}" step="0.01">
            @error('harga_satuan')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="jumlah">Jumlah</label>
            <input type="number" name="jumlah" class="form-control" id="jumlah" value="{{ old('jumlah', $penawaran->jumlah) }}" step="0.01">
            @error('jumlah')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="total">Total</label>
            <input type="number" name="total" class="form-control" id="total" value="{{ old('total', $penawaran->total) }}" step="0.01">
            @error('total')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="terbilang">Terbilang</label>
            <input type="text" name="terbilang" class="form-control" id="terbilang" value="{{ old('terbilang', $penawaran->terbilang) }}">
            @error('terbilang')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('penawarans.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
