@extends('backend.layouts.master')

@section('title', 'Surat Penawaran')

@section('admin-content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Buat Pekerjaan</h1>
            <a href="{{ route('projectPenawarans.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left mr-1"></i>Back to List Projek Penawaran
            </a>
        </div>

        <!-- Form Card -->
        <div class="card shadow-lg mb-4 border-left-primary">
            <div class="card-header py-3 bg-primary text-white">
                <h6 class="m-0 font-weight-bold">Pekerjaan Form</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('penawarans.store') }}" method="POST">
                    @csrf

                    <!-- Project Penawaran Field -->
                    <div class="form-group">
                        <label for="project_penawaran_id" class="font-weight-bold">Project Penawaran</label>
                        <select name="project_penawaran_id" id="project_penawaran_id" class="form-control" disabled>
                            @foreach ($projects as $project)
                                <option value="{{ $project->id }}"
                                    {{ isset($selectedProjectId) && $selectedProjectId == $project->id ? 'selected' : '' }}>
                                    {{ $project->kepada }}
                                </option>
                            @endforeach
                        </select>
                        <input type="hidden" name="project_penawaran_id"
                            value="{{ isset($selectedProjectId) ? $selectedProjectId : '' }}">
                    </div>

                    <!-- Pekerjaan Field -->
                    <div class="form-group">
                        <label for="pekerjaan" class="font-weight-bold">Pekerjaan</label>
                        <input type="text" name="pekerjaan" id="pekerjaan" class="form-control"
                            placeholder="Enter pekerjaan name" required>
                    </div>

                    <!-- Jenis Penawaran Field with Search -->
                    <div class="form-group">
                        <label for="jenis_penawaran_ids" class="font-weight-bold">Jenis Penawaran</label>
                        <select name="jenis_penawaran_ids[]" id="jenis_penawaran_ids" class="form-control"
                            multiple="multiple">
                            @foreach ($jenisPenawarans as $jenis)
                                @php
                                    $uraianList = $jenis->uraianJenisPekerjaanPenawarans
                                        ->pluck('uraian')
                                        ->implode(', ');
                                @endphp
                                <option value="{{ $jenis->id }}">
                                    BID0{{ $jenis->id }} - {{ $jenis->jenis_pekerjaan }} | {{ $uraianList }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Action Buttons -->
                    <div class="form-group mt-4 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary mr-2">
                            <i class="fas fa-save mr-1"></i>Save
                        </button>
                        <a href="{{ route('projectPenawarans.index') }}" class="btn btn-outline-secondary">
                            Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

<!-- Add Scripts for Select2 -->
@section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#jenis_penawaran_ids').select2({
                placeholder: "Pilih jenis penawaran",
                allowClear: true,
                theme: 'bootstrap4'
            });
        });
    </script>
@endsection
