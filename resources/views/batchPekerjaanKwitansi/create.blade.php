@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add Batch Pekerjaan Kwitansi</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('batchPekerjaanKwitansi.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="pekerjaan_kwitansi_id" class="form-label">Pekerjaan Kwitansi</label>
            <select name="pekerjaan_kwitansi_id" id="pekerjaan_kwitansi_id" class="form-select" required>
                <option value="">Select Pekerjaan</option>
                @foreach ($pekerjaanKwitansis as $pekerjaan)
                    <option value="{{ $pekerjaan->id }}" {{ $selectedPekerjaanKwitansiId == $pekerjaan->id ? 'selected' : '' }}>
                        {{ $pekerjaan->pekerjaan }} ({{ $pekerjaan->projectKwitansi->proyek }}) - ({{ $pekerjaan->projectKwitansi->nomor_invoice }})
                    </option>
                @endforeach
            </select>
        </div>        

        <div class="mb-3">
            <label class="form-label">Batch Kwitansi</label>
            <input type="text" id="batchSearch" class="form-control mb-3" placeholder="Search Batch..." onkeyup="filterBatches()">
            <div id="batchList">
                @foreach ($batchKwitansis as $batch)
                    <div class="batch-container">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="batch_kwitansi_ids[]" value="{{ $batch->id }}" id="batch_kwitansi_{{ $batch->id }}">
                            <label class="form-check-label" for="batch_kwitansi_{{ $batch->id }}">
                                {{ $batch->nama_batch }}
                            </label>
                        </div>
                        <ul class="list-unstyled" style="display: none;" id="uraian_{{ $batch->id }}">
                            @foreach ($batch->uraianKwitansis as $uraian)
                                <li>
                                    <small>{{ $uraian->nama_uraian }} - {{ $uraian->jumlah_uraian }} {{ $uraian->satuan_uraian }}</small>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
        <a href="{{ route('batchPekerjaanKwitansi.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>

<script>
    // Function to filter batches based on search input
    function filterBatches() {
        const searchValue = document.getElementById('batchSearch').value.toLowerCase();
        const batchContainers = document.querySelectorAll('.batch-container');

        batchContainers.forEach(container => {
            const label = container.querySelector('.form-check-label').innerText.toLowerCase();
            if (label.includes(searchValue)) {
                container.style.display = ''; // Show the container if it matches
            } else {
                container.style.display = 'none'; // Hide the container if it doesn't match
            }
        });
    }

    // Toggle display of uraian for the selected batch
    document.querySelectorAll('.form-check-input').forEach(input => {
        input.addEventListener('change', function() {
            const uraianList = document.getElementById('uraian_' + this.value);
            if (this.checked) {
                uraianList.style.display = 'block'; // Show uraian when checkbox is checked
            } else {
                uraianList.style.display = 'none'; // Hide uraian when checkbox is unchecked
            }
        });
    });
</script>
@endsection
