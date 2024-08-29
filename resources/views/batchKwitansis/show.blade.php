@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3 text-gray-800">Detail Batch Kwitansi</h1>
            <a href="{{ route('batchKwitansis.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali ke Daftar</a>
        </div>

        <div class="card shadow-sm mb-4">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">{{ $batchKwitansi->nama_batch }}</h5>
            </div>
            <div class="card-body">
                <dl class="row">
                    <dt class="col-sm-4">Jumlah Batch:</dt>
                    <dd class="col-sm-8">{{ $batchKwitansi->jumlah_batch }}</dd>

                    <dt class="col-sm-4">Satuan:</dt>
                    <dd class="col-sm-8">{{ $batchKwitansi->satuan_batch }}</dd>

                    <dt class="col-sm-4">Keterangan:</dt>
                    <dd class="col-sm-8">{{ $batchKwitansi->keterangan_batch }}</dd>

                    <dt class="col-sm-4">Dimensi Panjang:</dt>
                    <dd class="col-sm-8">{{ $batchKwitansi->dimensi_panjang }} cm</dd>

                    <dt class="col-sm-4">Dimensi Lebar:</dt>
                    <dd class="col-sm-8">{{ $batchKwitansi->dimensi_lebar }} cm</dd>

                    <dt class="col-sm-4">Dimensi Tinggi:</dt>
                    <dd class="col-sm-8">{{ $batchKwitansi->dimensi_tinggi }} cm</dd>

                    <dt class="col-sm-4">Dimensi Berat:</dt>
                    <dd class="col-sm-8">{{ $batchKwitansi->dimensi_berat }} kg</dd>

                    <dt class="col-sm-4">Dimensi (P x L x T):</dt>
                    <dd class="col-sm-8">{{ $batchKwitansi->dimensi_panjang }} x {{ $batchKwitansi->dimensi_lebar }} x {{ $batchKwitansi->dimensi_tinggi }} cm</dd>
                </dl>
            </div>
        </div>

        <!-- Uraian Kwitansi Section -->
        <div class="card shadow-sm">
            <div class="card-header bg-secondary text-white">
                <h5 class="mb-0">Uraian Kwitansi</h5>
            </div>
            <div class="card-body">
                @if ($batchKwitansi->uraianKwitansis->isEmpty())
                    <p>Tidak ada uraian kwitansi untuk batch ini.</p>
                @else
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Nama Uraian</th>
                                <th>Jumlah</th>
                                <th>Satuan</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($batchKwitansi->uraianKwitansis as $uraian)
                                <tr>
                                    <td>{{ $uraian->nama_uraian }}</td>
                                    <td>{{ $uraian->jumlah_uraian }}</td>
                                    <td>{{ $uraian->satuan_uraian }}</td>
                                    <td>{{ $uraian->keterangan_uraian }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
@endsection
