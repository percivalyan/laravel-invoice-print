@extends('backend.layouts.master')

@section('title')
    SJ/INV/BAST
@endsection

@section('admin-content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Pekerjaan Kwitansi</h1>
        <a href="{{ route('pekerjaanKwitansis.index', ['project_kwitansi_id' => $projectKwitansiId]) }}" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm">
            <i class="fas fa-arrow-left fa-sm text-white-50"></i> Kembali
        </a>
    </div>

    <!-- Form -->
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('pekerjaanKwitansis.store') }}" method="POST">
                @csrf
                <input type="hidden" name="project_kwitansi_id" value="{{ $projectKwitansiId }}">

                <div class="form-group">
                    <label for="pekerjaan" class="form-label">Nama Pekerjaan</label>
                    <input type="text" class="form-control @error('pekerjaan') is-invalid @enderror" id="pekerjaan" name="pekerjaan" value="{{ old('pekerjaan') }}">
                    @error('pekerjaan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="batch_kwitansi_ids" class="form-label">Pilih Batch Kwitansi</label>
                    <!-- Search input for filtering checkboxes -->
                    <input type="text" id="search-batch" class="form-control mb-2" placeholder="Cari Batch Kwitansi">
                    <div id="batch-checkbox-list" class="overflow-auto" style="max-height: 200px; border: 1px solid #ddd; padding: 10px;">
                        @foreach ($allBatches as $batch)
                            <div class="form-check">
                                <input class="form-check-input batch-checkbox" type="checkbox" name="batch_kwitansi_ids[]" value="{{ $batch->id }}" id="batch_{{ $batch->id }}">
                                <label class="form-check-label" for="batch_{{ $batch->id }}">
                                    {{ $batch->nama_batch }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                    @error('batch_kwitansi_ids')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                <a href="{{ route('pekerjaanKwitansis.index', ['project_kwitansi_id' => $projectKwitansiId]) }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
            </form>
        </div>
    </div>
</div>

<script>
    // JavaScript for filtering checkboxes based on search input
    document.getElementById('search-batch').addEventListener('keyup', function() {
        let searchText = this.value.toLowerCase();
        document.querySelectorAll('.batch-checkbox').forEach(function(checkbox) {
            let label = checkbox.nextElementSibling;
            if (label.textContent.toLowerCase().includes(searchText)) {
                label.parentElement.style.display = '';
            } else {
                label.parentElement.style.display = 'none';
            }
        });
    });
</script>
@endsection
