@extends('backend.layouts.master')

@section('title')
    Surat Penawaran Pages
@endsection

@section('admin-content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Create Pekerjaan</h1>
    </div>

    <!-- Form Card -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Pekerjaan Form</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('penawarans.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="project_penawaran_id">Project Penawaran</label>
                    <select name="project_penawaran_id" id="project_penawaran_id" class="form-control" required disabled>
                        @foreach($projects as $project)
                            <option value="{{ $project->id }}" {{ isset($selectedProjectId) && $selectedProjectId == $project->id ? 'selected' : '' }}>
                                {{ $project->kepada }}
                            </option>
                        @endforeach
                    </select>
                    <input type="hidden" name="project_penawaran_id" value="{{ isset($selectedProjectId) ? $selectedProjectId : '' }}">
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
                
                <!-- Jenis Penawaran dengan fitur Search -->
                <div class="form-group">
                    <label for="jenis_penawaran_ids">Jenis Penawaran</label>
                    <select name="jenis_penawaran_ids[]" id="jenis_penawaran_ids" class="form-control" multiple="multiple">
                        @foreach($jenisPenawarans as $jenis)
                            <option value="{{ $jenis->id }}">{{ $jenis->jenis_pekerjaan }}</option>
                        @endforeach
                    </select>
                </div>
                
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{ route('projectPenawarans.index') }}" class="btn btn-secondary">Back to List Projek Penawaran</a>
            </form>
        </div>
    </div>
</div>
@endsection

<!-- Tambahkan jQuery dan Select2 -->
@section('scripts')
    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Include Select2 CSS and JS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#jenis_penawaran_ids').select2({
                placeholder: "Pilih jenis penawaran",
                allowClear: true
            });
        });
    </script>
@endsection
