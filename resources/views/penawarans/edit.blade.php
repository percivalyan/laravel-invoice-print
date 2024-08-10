@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Penawaran</h1>
    
    <form action="{{ route('penawarans.update', $penawaran) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="project_penawaran_id">Project Penawaran</label>
            <select name="project_penawaran_id" id="project_penawaran_id" class="form-control" required>
                @foreach($projects as $project)
                    <option value="{{ $project->id }}" {{ $penawaran->project_penawaran_id == $project->id ? 'selected' : '' }}>
                        {{ $project->kepada }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="pekerjaan">Pekerjaan</label>
            <input type="text" name="pekerjaan" id="pekerjaan" class="form-control" value="{{ $penawaran->pekerjaan }}" required>
        </div>
        <div class="form-group">
            <label for="quantitas">Quantitas</label>
            <input type="number" name="quantitas" id="quantitas" class="form-control" value="{{ $penawaran->quantitas }}">
        </div>
        <div class="form-group">
            <label for="unit">Unit</label>
            <input type="text" name="unit" id="unit" class="form-control" value="{{ $penawaran->unit }}">
        </div>
        <div class="form-group">
            <label for="harga_satuan">Harga Satuan</label>
            <input type="number" name="harga_satuan" id="harga_satuan" class="form-control" value="{{ $penawaran->harga_satuan }}">
        </div>
        <div class="form-group">
            <label>Jenis Penawaran</label>
            @foreach($jenisPenawarans as $jenis)
                <div class="form-check">
                    <input type="checkbox" name="jenis_penawaran_ids[]" value="{{ $jenis->id }}" class="form-check-input" 
                        {{ $penawaran->jenisPenawarans->contains($jenis) ? 'checked' : '' }}>
                    <label class="form-check-label">{{ $jenis->jenis_pekerjaan }}</label>
                </div>
            @endforeach
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
