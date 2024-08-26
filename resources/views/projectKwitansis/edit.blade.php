@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Project Kwitansi</h1>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row">
        <div class="col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-body">
                    <form action="{{ route('projectKwitansis.update', $projectKwitansi->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="project_pembelian_id">Project Pembelian:</label>
                            <select class="form-control" id="project_pembelian_id" name="project_pembelian_id_disabled" disabled>
                                <option value="">Pilih Project Pembelian</option>
                                @foreach ($projectPembelians as $projectPembelian)
                                    <option value="{{ $projectPembelian->id }}" {{ old('project_pembelian_id', $projectKwitansi->project_pembelian_id) == $projectPembelian->id ? 'selected' : '' }}>
                                        {{ $projectPembelian->nomor_po }}
                                    </option>
                                @endforeach
                            </select>
                            <!-- Hidden input to submit the value -->
                            <input type="hidden" name="project_pembelian_id" value="{{ old('project_pembelian_id', $projectKwitansi->project_pembelian_id) }}">
                        </div>

                        <div class="form-group">
                            <label for="kepada_yth">Kepada Yth:</label>
                            <input type="text" class="form-control" id="kepada_yth" name="kepada_yth" value="{{ old('kepada_yth', $projectKwitansi->kepada_yth) }}">
                        </div>

                        <div class="form-group">
                            <label for="nomor_surat_jalan">Nomor Surat Jalan:</label>
                            <input type="text" class="form-control" id="nomor_surat_jalan" name="nomor_surat_jalan" value="{{ old('nomor_surat_jalan', $projectKwitansi->nomor_surat_jalan) }}">
                        </div>

                        <div class="form-group">
                            <label for="proyek">Proyek:</label>
                            <input type="text" class="form-control" id="proyek" name="proyek" value="{{ old('proyek', $projectKwitansi->proyek) }}">
                        </div>

                        <div class="form-group">
                            <label for="lokasi">Lokasi:</label>
                            <input type="text" class="form-control" id="lokasi" name="lokasi" value="{{ old('lokasi', $projectKwitansi->lokasi) }}">
                        </div>

                        <div class="form-group">
                            <label for="kendaraan">Kendaraan:</label>
                            <input type="text" class="form-control" id="kendaraan" name="kendaraan" value="{{ old('kendaraan', $projectKwitansi->kendaraan) }}">
                        </div>

                        <div class="form-group">
                            <label for="nomor_polisi">Nomor Polisi:</label>
                            <input type="text" class="form-control" id="nomor_polisi" name="nomor_polisi" value="{{ old('nomor_polisi', $projectKwitansi->nomor_polisi) }}">
                        </div>

                        <div class="form-group">
                            <label for="tanggal_surat_jalan">Tanggal Surat Jalan:</label>
                            <input type="date" class="form-control" id="tanggal_surat_jalan" name="tanggal_surat_jalan" value="{{ old('tanggal_surat_jalan', $projectKwitansi->tanggal_surat_jalan) }}">
                        </div>

                        <div class="form-group">
                            <label for="nomor_invoice">Nomor Invoice:</label>
                            <input type="text" class="form-control" id="nomor_invoice" name="nomor_invoice" value="{{ old('nomor_invoice', $projectKwitansi->nomor_invoice) }}">
                        </div>

                        <div class="form-group">
                            <label for="nomor_bast">Nomor BAST:</label>
                            <input type="text" class="form-control" id="nomor_bast" name="nomor_bast" value="{{ old('nomor_bast', $projectKwitansi->nomor_bast) }}">
                        </div>

                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
