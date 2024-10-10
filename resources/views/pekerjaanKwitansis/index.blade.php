@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Pekerjaan Kwitansi</h1>
            <div class="d-flex">
                <!-- Button with a 'file-invoice' icon -->
                <a href="{{ route('pekerjaanKwitansis.create', ['project_kwitansi_id' => $projectKwitansiId]) }}"
                    class="btn btn-sm btn-primary shadow-sm mr-3">
                    <i class="fas fa-file-invoice fa-sm text-white-50 mr-2"></i> Tambah Pekerjaan Kwitansi
                </a>
            </div>
        </div>

        <div class="py-2">
            <a href="{{ route('projectKwitansis.index') }}" class="btn btn-sm btn-secondary shadow-sm">
                <i class="fas fa-arrow-circle-left fa-sm text-white-50 mr-2"></i> Kembali ke Surat Jalan/INV/BAST
            </a>
        </div>

        <!-- Success Message -->
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <!-- Data Table -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Daftar Pekerjaan Kwitansi</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama Pekerjaan</th>
                                <th>Project Kwitansi</th>
                                <th>Aksi</th>
                                <th>Batch Pekerjaan</th> <!-- New Column -->
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($pekerjaanKwitansis as $pekerjaanKwitansi)
                                <tr>
                                    <td>{{ $pekerjaanKwitansi->id }}</td>
                                    <td>{{ $pekerjaanKwitansi->pekerjaan }}</td>
                                    <td>{{ $pekerjaanKwitansi->projectKwitansi->proyek }}</td>
                                    <td>
                                        <a href="{{ route('pekerjaanKwitansis.edit', $pekerjaanKwitansi->id) }}"
                                            class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>

                                        <form action="{{ route('pekerjaanKwitansis.destroy', $pekerjaanKwitansi->id) }}"
                                            method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus Pekerjaan Kwitansi ini?')"><i
                                                    class="fas fa-trash"></i> Delete</button>
                                        </form>
                                    </td>
                                    <td>
                                        <a href="{{ route('batchPekerjaanKwitansi.create', ['pekerjaan_kwitansi_id' => $pekerjaanKwitansi->id]) }}"
                                           class="btn btn-info btn-sm"><i class="fas fa-plus"></i> Tambah Batch</a>
                                    </td>
                                    
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">Tidak ada data Pekerjaan Kwitansi.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
