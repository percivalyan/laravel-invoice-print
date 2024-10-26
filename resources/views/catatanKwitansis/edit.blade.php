@extends('backend.layouts.master')

@section('title')
    SP/INV/BAST
@endsection

@section('admin-content')
    <div class="container">
        <h1 class="h3 mb-4 text-gray-800">Edit Catatan Kwitansi</h1>

        <form action="{{ route('catatanKwitansis.update', $catatanKwitansi->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Catatan Kwitansi Details</h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <h5 class="card-title mb-4 text-primary">
                            {{ $projectKwitansi->proyek }} - {{ $projectKwitansi->nomor_surat_jalan }} -
                            {{ $projectKwitansi->nomor_invoice }} -
                            {{ $projectKwitansi->nomor_bast }}
                        </h5>
                        <input type="hidden" name="project_kwitansi_id" value="{{ $projectKwitansi->id }}">
                    </div>

                    <!-- Bank Details -->
                    <div class="form-group">
                        <h5 class="card-title mb-4 text-primary">Bank Details</h5>
                        <div class="row">
                            @foreach ([
                                'bank_pembayaran' => 'Bank Pembayaran',
                                'cabang' => 'Cabang',
                                'nomor_rekening' => 'Nomor Rekening',
                                'atas_nama' => 'Atas Nama'
                            ] as $field => $label)
                                <div class="col-md-6 mb-3">
                                    <label for="{{ $field }}">{{ $label }}</label>
                                    <input type="text" 
                                        name="{{ $field }}" 
                                        id="{{ $field }}" 
                                        class="form-control @error($field) is-invalid @enderror" 
                                        value="{{ old($field, $catatanKwitansi->$field) }}">
                                    @error($field)
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Penanggung Jawab -->
                    <div class="form-group">
                        <h5 class="card-title mb-4 text-primary">Penanggung Jawab</h5>
                        <div class="row">
                            @foreach ([
                                'penanggung_jawab' => 'Penanggung Jawab'
                            ] as $field => $label)
                                <div class="col-md-12 mb-3">
                                    <label for="{{ $field }}">{{ $label }}</label>
                                    <input type="text" 
                                        name="{{ $field }}" 
                                        id="{{ $field }}" 
                                        class="form-control @error($field) is-invalid @enderror" 
                                        value="{{ old($field, $catatanKwitansi->$field) }}">
                                    @error($field)
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Catatan -->
                    <div class="form-group">
                        <h5 class="card-title mb-4 text-primary">Catatan</h5>
                        <div class="row">
                            @foreach ([
                                'nama_penerima' => 'Nama Penerima',
                                'tanggal_diterima_penerima' => 'Tanggal Diterima Penerima',
                                'waktu_diterima_penerima' => 'Waktu Diterima Penerima',
                                'nama_driver' => 'Nama Driver',
                                'tanggal_diterima_driver' => 'Tanggal Diterima Driver',
                                'waktu_diterima_driver' => 'Waktu Diterima Driver',
                                'nama_adm_kantor' => 'Nama ADM Kantor',
                                'tanggal_diterima_adm_kantor' => 'Tanggal Diterima ADM Kantor',
                                'waktu_diterima_adm_kantor' => 'Waktu Diterima ADM Kantor'
                            ] as $field => $label)
                                <div class="col-md-4 mb-3">
                                    <label for="{{ $field }}">{{ $label }}</label>
                                    <input type="{{ in_array($field, ['tanggal_diterima_penerima', 'tanggal_diterima_driver', 'tanggal_diterima_adm_kantor']) ? 'date' : (in_array($field, ['waktu_diterima_penerima', 'waktu_diterima_driver', 'waktu_diterima_adm_kantor']) ? 'time' : 'text') }}"
                                        name="{{ $field }}" 
                                        id="{{ $field }}" 
                                        class="form-control @error($field) is-invalid @enderror" 
                                        value="{{ old($field, $catatanKwitansi->$field) }}">
                                    @error($field)
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('catatanKwitansis.show', $catatanKwitansi->id) }}" class="btn btn-secondary">Cancel</a>
                </div>
            </div>
        </form>
    </div>
@endsection
