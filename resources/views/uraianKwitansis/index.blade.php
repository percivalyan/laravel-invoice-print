@extends('backend.layouts.master')

@section('title')
    SP/INV/BAST
@endsection

@section('admin-content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <!-- Success Alert -->
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success!</strong> {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <!-- Button to create a new Uraian Kwitansi -->
                <a class="btn btn-primary mb-4"
                    href="{{ route('uraianKwitansis.create', ['batch_kwitansi_id' => $batchKwitansiId]) }}">
                    <i class="fas fa-plus"></i> Tambah Data
                </a>

                <!-- Back to Batch Kwitansi -->
                <a href="{{ route('batchKwitansis.index') }}" class="btn btn-secondary mb-4">
                    Kembali ke Batch Kwitansi
                </a>

                <!-- Card for displaying Uraian Kwitansi -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Daftar Uraian Kwitansi</h6>
                    </div>
                    <div class="card-body">
                        @if ($uraianKwitansis->isEmpty())
                            <p>Tidak ada uraian kwitansi untuk batch ini.</p>
                        @else
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Batch</th>
                                            <th>Nama Uraian</th>
                                            <th>Jumlah</th>
                                            <th>Satuan</th>
                                            <th>Keterangan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($uraianKwitansis as $uraianKwitansi)
                                            <tr>
                                                <td>Batch: {{ $uraianKwitansi->batchKwitansi->nama_batch }}</td>
                                                <td>{{ $uraianKwitansi->nama_uraian }}</td>
                                                <td>{{ $uraianKwitansi->jumlah_uraian }}</td>
                                                <td>{{ $uraianKwitansi->satuan_uraian }}</td>
                                                <td>{{ $uraianKwitansi->keterangan_uraian }}</td>
                                                <td>
                                                    <a href="{{ route('uraianKwitansis.edit', $uraianKwitansi->id) }}"
                                                        class="btn btn-warning btn-sm">
                                                        <i class="fas fa-pencil-alt"></i> Edit
                                                    </a>
                                                    <form
                                                        action="{{ route('uraianKwitansis.destroy', $uraianKwitansi->id) }}"
                                                        method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                            onclick="return confirm('Apakah Anda yakin ingin menghapus uraian kwitansi ini?');">
                                                            <i class="fas fa-trash"></i> Hapus
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
