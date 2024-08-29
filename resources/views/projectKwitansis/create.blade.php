@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Project Kwitansi</h1>
    </div>

    <!-- Error Messages -->
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Whoops!</strong> There were some problems with your input.<br>
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Form for Adding Project Kwitansi -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <form action="{{ route('projectKwitansis.store') }}" method="POST">
                        @csrf
                        <!-- Purchase Order Selection -->
                        <div class="form-group mb-3">
                            <label for="project_pembelian_id">Purchase Order:</label>
                            <select class="form-control" id="project_pembelian_id" name="project_pembelian_id" required>
                                <option value="">Pilih Project Pembelian</option>
                                @foreach ($projectPembelians as $projectPembelian)
                                    <option value="{{ $projectPembelian->id }}"
                                        {{ old('project_pembelian_id') == $projectPembelian->id ? 'selected' : '' }}>
                                        {{ $projectPembelian->nomor_po }} - {{ $projectPembelian->po_ditunjukan_kepada }} - {{ $projectPembelian->project }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Kepada Yth Field -->
                        <div class="form-group mb-3">
                            <label for="kepada_yth">Kepada Yth:</label>
                            <input type="text" class="form-control" id="kepada_yth" name="kepada_yth" value="{{ old('kepada_yth') }}" placeholder="Enter recipient's name">
                        </div>

                        <!-- Proyek Field -->
                        <div class="form-group mb-3">
                            <label for="proyek">Proyek:</label>
                            <input type="text" class="form-control" id="proyek" name="proyek" value="{{ old('proyek') }}" placeholder="Enter project name">
                        </div>

                        <!-- Lokasi Field -->
                        <div class="form-group mb-3">
                            <label for="lokasi">Lokasi:</label>
                            <input type="text" class="form-control" id="lokasi" name="lokasi" value="{{ old('lokasi') }}" placeholder="Enter location">
                        </div>

                        <!-- Kendaraan Field -->
                        <div class="form-group mb-3">
                            <label for="kendaraan">Kendaraan:</label>
                            <input type="text" class="form-control" id="kendaraan" name="kendaraan" value="{{ old('kendaraan') }}" placeholder="Enter vehicle details">
                        </div>

                        <!-- Nomor Polisi Field -->
                        <div class="form-group mb-3">
                            <label for="nomor_polisi">Nomor Polisi:</label>
                            <input type="text" class="form-control" id="nomor_polisi" name="nomor_polisi" value="{{ old('nomor_polisi') }}" placeholder="Enter license plate number">
                        </div>

                        <!-- Tanggal Surat Jalan Field -->
                        <div class="form-group mb-3">
                            <label for="tanggal_surat_jalan">Tanggal Surat Jalan:</label>
                            <input type="date" class="form-control" id="tanggal_surat_jalan" name="tanggal_surat_jalan" value="{{ old('tanggal_surat_jalan') }}">
                        </div>

                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                        <a href="{{ route('projectKwitansis.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
