@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Penawaran</h1>
    <form action="{{ route('penawarans.update', $penawaran->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="project_penawaran_id">Project</label>
            <select name="project_penawaran_id" id="project_penawaran_id" class="form-control" required>
                @foreach($projects as $project)
                    <option value="{{ $project->id }}" {{ $project->id == $penawaran->project_penawaran_id ? 'selected' : '' }}>
                        {{ $project->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="jenis_pekerjaan_penawaran_id">Jenis Pekerjaan</label>
            <select name="jenis_pekerjaan_penawaran_id" id="jenis_pekerjaan_penawaran_id" class="form-control" required>
                @foreach($jenisPekerjaan as $jenis)
                    <option value="{{ $jenis->id }}" {{ $jenis->id == $penawaran->jenis_pekerjaan_penawaran_id ? 'selected' : '' }}>
                        {{ $jenis->jenis_pekerjaan }}
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
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('penawarans.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
