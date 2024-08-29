@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3 text-gray-800">Daftar Batch Kwitansi</h1>
            <a href="{{ route('batchKwitansis.create') }}" class="btn btn-primary"><i class="fas fa-plus-circle mr-1"></i> Tambah Batch Kwitansi</a>
        </div>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card shadow">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Batch Kwitansi List</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="table-light">
                            <tr>
                                <th>Nama Batch</th>
                                <th>Jumlah Batch</th>
                                <th>Satuan</th>
                                <th>Keterangan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($batchKwitansis as $batchKwitansi)
                                <tr>
                                    <td>{{ $batchKwitansi->nama_batch }}</td>
                                    <td>{{ $batchKwitansi->jumlah_batch }}</td>
                                    <td>{{ $batchKwitansi->satuan_batch }}</td>
                                    <td>{{ $batchKwitansi->keterangan_batch }}</td>
                                    <td>
                                        <div class="d-flex justify-content-start">
                                            <a href="{{ route('batchKwitansis.show', $batchKwitansi->id) }}"
                                                class="btn btn-info btn-sm me-2">
                                                <i class="fas fa-eye"></i> Detail
                                            </a>
                                            <a href="{{ route('batchKwitansis.edit', $batchKwitansi->id) }}"
                                                class="btn btn-warning btn-sm me-2">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>
                                            <form action="{{ route('batchKwitansis.destroy', $batchKwitansi->id) }}" method="POST"
                                                style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm me-2"
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus batch kwitansi ini?')">
                                                    <i class="fas fa-trash-alt"></i> Hapus
                                                </button>
                                            </form>
                                            <a class="btn btn-secondary btn-sm"
                                                href="{{ route('uraianKwitansis.index', ['batch_kwitansi_id' => $batchKwitansi->id]) }}">
                                                <i class="fas fa-arrow-right"></i> Buat Data Uraian
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
