@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Penawaran</h1>
    <form action="{{ route('penawarans.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="project_penawaran_id">Project</label>
            <select name="project_penawaran_id" id="project_penawaran_id" class="form-control" required>
                <option value="">Select Project</option>
                @foreach($projectPenawaran as $project) <!-- Corrected variable name -->
                    <option value="{{ $project->id }}">{{ $project->kepada }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="jenis_penawaran_id">Jenis Pekerjaan</label>
            <select name="jenis_penawaran_id" id="jenis_penawaran_id" class="form-control" required>
                <option value="">Select Jenis Pekerjaan</option>
                @foreach($jenisPekerjaan as $jenis)
                    <option value="{{ $jenis->id }}">{{ $jenis->jenis_pekerjaan }}</option>
                @endforeach
            </select>            
        </div>
        <div class="form-group">
            <label for="pekerjaan">Pekerjaan</label>
            <input type="text" name="pekerjaan" id="pekerjaan" class="form-control" required>
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
        <a href="{{ route('penawarans.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
