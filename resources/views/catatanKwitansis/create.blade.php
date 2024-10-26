@extends('backend.layouts.master')

@section('title')
    SP/INV/BAST
@endsection

@section('admin-content')
    <div class="container">
        <h1 class="h3 mb-4 text-gray-800">Create Catatan Kwitansi</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Catatan Kwitansi Form</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('catatanKwitansis.store') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <h5 class="card-title mb-4 text-primary">
                            {{ $projectKwitansi->proyek }} - {{ $projectKwitansi->nomor_surat_jalan }} -
                            {{ $projectKwitansi->nomor_invoice }} -
                            {{ $projectKwitansi->nomor_bast }}
                        </h5>
                        <input type="hidden" name="project_kwitansi_id" value="{{ $projectKwitansi->id }}">
                    </div>

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
                                    <input 
                                        type="{{ $field === 'tanggal_diterima_penerima' || $field === 'tanggal_diterima_driver' || $field === 'tanggal_diterima_adm_kantor' ? 'date' : 'text' }}" 
                                        name="{{ $field }}" 
                                        id="{{ $field }}" 
                                        class="form-control @error($field) is-invalid @enderror" 
                                        value="{{ old($field) }}"
                                    >
                                    @error($field)
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="form-group">
                        <h5 class="card-title mb-4 text-primary">Penanggung Jawab</h5>
                        <div class="row">
                            @foreach ([
                                'penanggung_jawab' => 'Penanggung Jawab'
                            ] as $field => $label)
                                <div class="col-md-12 mb-3">
                                    <label for="{{ $field }}">{{ $label }}</label>
                                    <input 
                                        type="text" 
                                        name="{{ $field }}" 
                                        id="{{ $field }}" 
                                        class="form-control @error($field) is-invalid @enderror" 
                                        value="{{ old($field) }}"
                                    >
                                    @error($field)
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            @endforeach
                        </div>
                    </div>

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
                                    <input 
                                        type="{{ in_array($field, ['tanggal_diterima_penerima', 'tanggal_diterima_driver', 'tanggal_diterima_adm_kantor']) ? 'date' : (in_array($field, ['waktu_diterima_penerima', 'waktu_diterima_driver', 'waktu_diterima_adm_kantor']) ? 'time' : 'text') }}" 
                                        name="{{ $field }}" 
                                        id="{{ $field }}" 
                                        class="form-control @error($field) is-invalid @enderror" 
                                        value="{{ old($field) }}"
                                    >
                                    @error($field)
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="form-group mt-4">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <a href="{{ route('projectKwitansis.index') }}" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
