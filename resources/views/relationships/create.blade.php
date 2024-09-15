@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Relationship</h1>
    <form action="{{ route('relationships.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="batch_kwitansi_ids">Batch Kwitansi</label>
            <div class="form-check">
                @foreach($batchKwitansis as $batchKwitansi)
                    <input type="checkbox" class="form-check-input" name="batch_kwitansi_ids[]" value="{{ $batchKwitansi->id }}" id="batch_{{ $batchKwitansi->id }}">
                    <label class="form-check-label" for="batch_{{ $batchKwitansi->id }}">
                        {{ $batchKwitansi->nama_batch }}
                    </label>
                    <ul>
                        @foreach($batchKwitansi->uraianKwitansis as $uraianKwitansi)
                            <li>{{ $uraianKwitansi->nama_uraian }} - {{ $uraianKwitansi->jumlah_uraian }} {{ $uraianKwitansi->satuan_uraian }}</li>
                        @endforeach
                    </ul><br>
                @endforeach
            </div>
            @error('batch_kwitansi_ids')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="project_kwitansi_id">Project Kwitansi</label>
            <select id="project_kwitansi_id" name="project_kwitansi_id" class="form-control @error('project_kwitansi_id') is-invalid @enderror" aria-disabled="true" style="pointer-events: none;">
                <option value="">Select Project Kwitansi</option>
                @foreach($projectKwitansis as $projectKwitansi)
                    <option value="{{ $projectKwitansi->id }}" {{ $selectedProjectKwitansiId == $projectKwitansi->id ? 'selected' : '' }}>
                        {{ $projectKwitansi->nomor_surat_jalan }}
                    </option>
                @endforeach
            </select>
            @error('project_kwitansi_id')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Create Relationship</button>
    </form>
</div>
@endsection
