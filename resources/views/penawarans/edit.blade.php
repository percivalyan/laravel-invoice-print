@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Penawaran</h1>
        <form action="{{ route('penawarans.update', $penawaran->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Project (Read-only) -->
            <div class="form-group">
                <label for="project_penawaran_id">Project</label>
                <select id="project_penawaran_id" class="form-control" disabled>
                    @foreach ($projectPenawaran as $project)
                        <option value="{{ $project->id }}"
                            {{ $project->id == $penawaran->project_penawaran_id ? 'selected' : '' }}>
                            {{ $project->kepada }}
                        </option>
                    @endforeach
                </select>
                <!-- Hidden input to keep the selected value -->
                <input type="hidden" name="project_penawaran_id" value="{{ $penawaran->project_penawaran_id }}">
            </div>

            <!-- Jenis Pekerjaan (Read-only) -->
            <div class="form-group">
                <label for="jenis_penawaran_id">Jenis Pekerjaan</label>
                <select id="jenis_penawaran_id" class="form-control" disabled>
                    @foreach ($jenisPekerjaan as $jenis)
                        <option value="{{ $jenis->id }}"
                            {{ $jenis->id == $penawaran->jenis_penawaran_id ? 'selected' : '' }}>
                            {{ $jenis->jenis_pekerjaan }}
                        </option>
                    @endforeach
                </select>
                <!-- Hidden input to keep the selected value -->
                <input type="hidden" name="jenis_penawaran_id" value="{{ $penawaran->jenis_penawaran_id }}">
            </div>

            <!-- Pekerjaan -->
            <div class="form-group">
                <label for="pekerjaan">Pekerjaan</label>
                <input type="text" name="pekerjaan" id="pekerjaan" class="form-control"
                    value="{{ old('pekerjaan', $penawaran->pekerjaan) }}" required>
            </div>

            <!-- Quantitas -->
            <div class="form-group">
                <label for="quantitas">Quantitas</label>
                <input type="number" name="quantitas" id="quantitas" class="form-control"
                    value="{{ old('quantitas', $penawaran->quantitas) }}">
            </div>

            <!-- Unit -->
            <div class="form-group">
                <label for="unit">Unit</label>
                <input type="text" name="unit" id="unit" class="form-control"
                    value="{{ old('unit', $penawaran->unit) }}">
            </div>

            <!-- Harga Satuan -->
            <div class="form-group">
                <label for="harga_satuan">Harga Satuan</label>
                <input type="number" name="harga_satuan" id="harga_satuan" class="form-control"
                    value="{{ old('harga_satuan', $penawaran->harga_satuan) }}">
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('penawarans.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
