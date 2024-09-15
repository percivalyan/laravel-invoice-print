@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Relationship</h1>
    <form action="{{ route('relationships.update', $relationship->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="batch_kwitansi_ids">Batch Kwitansi</label>
            <div class="form-check">
                @foreach($batchKwitansis as $batchKwitansi)
                    <input type="checkbox" class="form-check-input" name="batch_kwitansi_ids[]" value="{{ $batchKwitansi->id }}"
                        id="batch_{{ $batchKwitansi->id }}"
                        {{ in_array($batchKwitansi->id, $selectedBatchKwitansiIds) ? 'checked' : '' }}>
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
            <input type="text" id="project_kwitansi_id" class="form-control" value="{{ $relationship->projectKwitansi->nomor_surat_jalan }}" readonly>
            <input type="hidden" name="project_kwitansi_id" value="{{ $relationship->project_kwitansi_id }}">
            @error('project_kwitansi_id')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update Relationship</button>
    </form>
</div>
@endsection
