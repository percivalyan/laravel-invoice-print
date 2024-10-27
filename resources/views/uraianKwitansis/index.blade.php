@extends('backend.layouts.master')

@section('title')
    SP/INV/BAST
@endsection

@section('admin-content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">

                <!-- Page Title Area -->
                <div class="page-title-area">
                    <div class="row align-items-center">
                        <div class="col-sm-6">
                            <div class="breadcrumbs-area clearfix">
                                <h4 class="page-title pull-left">Daftar Pekerjaan (PO)</h4>
                                <ul class="breadcrumbs pull-left">
                                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                                    <li><a href="{{ route('batchKwitansis.index') }}">Batch Barang</a></li>
                                    <li><span>Uraian Batch</span></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-6 clearfix">
                            @include('backend.layouts.partials.logout')
                        </div>
                    </div>
                </div>
                <!-- End Page Title Area -->

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
                <button class="btn btn-primary mb-4" data-toggle="modal" data-target="#createModal">
                    <i class="fas fa-plus"></i> Tambah Data
                </button>

                <!-- Back to Batch Kwitansi -->
                <a href="{{ route('batchKwitansis.index') }}" class="btn btn-secondary mb-4">
                    Kembali ke Batch Kwitansi
                </a>

                <!-- Search Form -->
                <form method="GET" action="{{ route('uraianKwitansis.index') }}" class="mb-4">
                    <input type="hidden" name="batch_kwitansi_id" value="{{ $batchKwitansiId }}">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Cari Uraian..."
                            value="{{ request('search') }}">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit">Cari</button>
                        </div>
                    </div>
                </form>

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
                                            <th>Actions</th>
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
                                                    <!-- Button to trigger edit modal -->
                                                    <button class="btn btn-warning btn-sm" data-toggle="modal"
                                                        data-target="#editModal{{ $uraianKwitansi->id }}">
                                                        <i class="fas fa-pencil-alt"></i> Edit
                                                    </button>

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

                                            <!-- Edit Modal -->
                                            <div class="modal fade" id="editModal{{ $uraianKwitansi->id }}" tabindex="-1"
                                                aria-labelledby="editModalLabel{{ $uraianKwitansi->id }}"
                                                aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title"
                                                                id="editModalLabel{{ $uraianKwitansi->id }}">Edit Uraian
                                                                Kwitansi</h5>
                                                            <button type="button" class="btn-close" data-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form
                                                                action="{{ route('uraianKwitansis.update', $uraianKwitansi->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('PUT')
                                                                <input type="hidden" name="batch_kwitansi_id"
                                                                    value="{{ $uraianKwitansi->batch_kwitansi_id }}">
                                                                <div class="mb-3">
                                                                    <label for="nama_uraian">Nama Uraian</label>
                                                                    <input type="text" class="form-control"
                                                                        id="nama_uraian" name="nama_uraian"
                                                                        value="{{ $uraianKwitansi->nama_uraian }}"
                                                                        required>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="jumlah_uraian">Jumlah</label>
                                                                    <input type="number" class="form-control"
                                                                        id="jumlah_uraian" name="jumlah_uraian"
                                                                        value="{{ $uraianKwitansi->jumlah_uraian }}"
                                                                        required>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="satuan_uraian">Satuan</label>
                                                                    <input type="text" class="form-control"
                                                                        id="satuan_uraian" name="satuan_uraian"
                                                                        value="{{ $uraianKwitansi->satuan_uraian }}"
                                                                        required>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="keterangan_uraian">Keterangan</label>
                                                                    <textarea class="form-control" id="keterangan_uraian" name="keterangan_uraian">{{ $uraianKwitansi->keterangan_uraian }}</textarea>
                                                                </div>
                                                                <button type="submit"
                                                                    class="btn btn-primary">Update</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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

    <!-- Create Modal -->
    <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createModalLabel">Tambah Uraian Kwitansi</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('uraianKwitansis.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="batch_kwitansi_id" value="{{ $batchKwitansiId }}">
                        <div class="mb-3">
                            <label for="nama_uraian">Nama Uraian</label>
                            <input type="text" class="form-control" id="nama_uraian" name="nama_uraian" required>
                        </div>
                        <div class="mb-3">
                            <label for="jumlah_uraian">Jumlah</label>
                            <input type="number" class="form-control" id="jumlah_uraian" name="jumlah_uraian" required>
                        </div>
                        <div class="mb-3">
                            <label for="satuan_uraian">Satuan</label>
                            <input type="text" class="form-control" id="satuan_uraian" name="satuan_uraian" required>
                        </div>
                        <div class="mb-3">
                            <label for="keterangan_uraian">Keterangan</label>
                            <textarea class="form-control" id="keterangan_uraian" name="keterangan_uraian"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
