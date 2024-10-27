@extends('backend.layouts.master')

@section('title')
    SP/INV/BAST
@endsection

@section('admin-content')
    <div class="container-fluid">
        <!-- Page Title Area -->
        <div class="page-title-area">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <h4 class="page-title">Daftar Batch Barang / Jasa</h4>
                </div>
                <div class="col-sm-6 clearfix">
                    @include('backend.layouts.partials.logout')
                </div>
            </div>
        </div>
        <!-- End Page Title Area -->

        <!-- Search Form -->
        <div class="py-2">
            <form action="{{ route('batchKwitansis.index') }}" method="GET" class="d-flex">
                <div class="mb-2 flex-grow-1 mr-2">
                    <input type="text" id="search" name="search" class="form-control" placeholder="Cari Nama Batch"
                        value="{{ request('search') }}" aria-label="Cari Nama Batch">
                </div>
                <div class="ms-2">
                    <button type="submit" class="btn btn-sm btn-primary shadow-sm">Search</button>
                </div>
            </form>
        </div>

        <div class="py-2">
            <button class="btn btn-sm btn-primary shadow-sm" data-bs-toggle="modal" data-bs-target="#createModal">
                <i class="fas fa-plus-circle fa-sm text-white-50 mr-2"></i> Buat Data
            </button>
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
                <h6 class="m-0 font-weight-bold text-primary">Daftar Batch Barang / Jasa</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Batch</th>
                                <th>Jumlah Batch</th>
                                <th>Satuan</th>
                                <th>Keterangan</th>
                                <th>Actions</th>
                                <th>Detail</th>
                                <th>Membuat Uraian</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($batchKwitansis as $batchKwitansi)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $batchKwitansi->nama_batch }}</td>
                                    <td>{{ $batchKwitansi->jumlah_batch }}</td>
                                    <td>{{ $batchKwitansi->satuan_batch }}</td>
                                    <td>{{ $batchKwitansi->keterangan_batch }}</td>
                                    <td>
                                        <div class="d-flex justify-content-start">
                                            <button class="btn btn-warning btn-sm me-2 mr-2" data-bs-toggle="modal"
                                                data-bs-target="#editModal{{ $batchKwitansi->id }}">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <form action="{{ route('batchKwitansis.destroy', $batchKwitansi->id) }}"
                                                method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm me-2"
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus batch kwitansi ini?')">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="{{ route('batchKwitansis.show', $batchKwitansi->id) }}"
                                            class="btn btn-info btn-sm me-2 mr-2">
                                            <i class="fas fa-eye"></i> Detail Batch
                                        </a>
                                    </td>
                                    <td>
                                        <a class="btn btn-secondary btn-sm"
                                            href="{{ route('uraianKwitansis.index', ['batch_kwitansi_id' => $batchKwitansi->id]) }}">
                                            <i class="fas fa-arrow-right"></i> Buat Data Uraian
                                        </a>
                                    </td>
                                </tr>

                                <!-- Edit Modal -->
                                <div class="modal fade" id="editModal{{ $batchKwitansi->id }}" tabindex="-1"
                                    aria-labelledby="editModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editModalLabel">Edit Batch Kwitansi</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('batchKwitansis.update', $batchKwitansi->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <!-- Include your form fields here -->
                                                    <div class="mb-3">
                                                        <label for="nama_batch" class="form-label">Nama Batch</label>
                                                        <input type="text" class="form-control" id="nama_batch"
                                                            name="nama_batch" value="{{ $batchKwitansi->nama_batch }}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="jumlah_batch" class="form-label">Jumlah Batch</label>
                                                        <input type="number" class="form-control" id="jumlah_batch"
                                                            name="jumlah_batch" value="{{ $batchKwitansi->jumlah_batch }}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="satuan_batch" class="form-label">Satuan</label>
                                                        <input type="text" class="form-control" id="satuan_batch"
                                                            name="satuan_batch"
                                                            value="{{ $batchKwitansi->satuan_batch }}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="keterangan_batch"
                                                            class="form-label">Keterangan</label>
                                                        <textarea class="form-control" id="keterangan_batch" name="keterangan_batch">{{ $batchKwitansi->keterangan_batch }}</textarea>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="dimensi_panjang" class="form-label">Dimensi
                                                            Panjang</label>
                                                        <input type="number" step="0.01" class="form-control"
                                                            id="dimensi_panjang" name="dimensi_panjang"
                                                            value="{{ $batchKwitansi->dimensi_panjang }}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="dimensi_lebar" class="form-label">Dimensi
                                                            Lebar</label>
                                                        <input type="number" step="0.01" class="form-control"
                                                            id="dimensi_lebar" name="dimensi_lebar"
                                                            value="{{ $batchKwitansi->dimensi_lebar }}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="dimensi_tinggi" class="form-label">Dimensi
                                                            Tinggi</label>
                                                        <input type="number" step="0.01" class="form-control"
                                                            id="dimensi_tinggi" name="dimensi_tinggi"
                                                            value="{{ $batchKwitansi->dimensi_tinggi }}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="dimensi_berat" class="form-label">Dimensi
                                                            Berat</label>
                                                        <input type="number" step="0.01" class="form-control"
                                                            id="dimensi_berat" name="dimensi_berat"
                                                            value="{{ $batchKwitansi->dimensi_berat }}">
                                                    </div>
                                                    <div class="d-flex justify-content-end mt-4">
                                                        <button type="submit" class="btn btn-primary">Perbarui</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Pagination links -->
                <div class="d-flex justify-content-center">
                    {{ $batchKwitansis->links() }}
                </div>
            </div>
        </div>
    </div>

    <!-- Create Modal -->
    <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createModalLabel">Tambah Batch Kwitansi Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('batchKwitansis.store') }}" method="POST">
                        @csrf
                        <!-- Include your form fields here -->
                        <div class="mb-3">
                            <label for="nama_batch" class="form-label">Nama Batch</label>
                            <input type="text" class="form-control" id="nama_batch" name="nama_batch"
                                placeholder="Masukkan nama batch">
                        </div>
                        <div class="mb-3">
                            <label for="jumlah_batch" class="form-label">Jumlah Batch</label>
                            <input type="number" class="form-control" id="jumlah_batch" name="jumlah_batch"
                                placeholder="Masukkan jumlah batch">
                        </div>
                        <div class="mb-3">
                            <label for="satuan_batch" class="form-label">Satuan</label>
                            <input type="text" class="form-control" id="satuan_batch" name="satuan_batch"
                                placeholder="Masukkan satuan">
                        </div>
                        <div class="mb-3">
                            <label for="keterangan_batch" class="form-label">Keterangan</label>
                            <textarea class="form-control" id="keterangan_batch" name="keterangan_batch" placeholder="Masukkan keterangan"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="dimensi_panjang" class="form-label">Dimensi Panjang</label>
                            <input type="number" step="0.01" class="form-control" id="dimensi_panjang"
                                name="dimensi_panjang" placeholder="Masukkan dimensi panjang">
                        </div>
                        <div class="mb-3">
                            <label for="dimensi_lebar" class="form-label">Dimensi Lebar</label>
                            <input type="number" step="0.01" class="form-control" id="dimensi_lebar"
                                name="dimensi_lebar" placeholder="Masukkan dimensi lebar">
                        </div>
                        <div class="mb-3">
                            <label for="dimensi_tinggi" class="form-label">Dimensi Tinggi</label>
                            <input type="number" step="0.01" class="form-control" id="dimensi_tinggi"
                                name="dimensi_tinggi" placeholder="Masukkan dimensi tinggi">
                        </div>
                        <div class="mb-3">
                            <label for="dimensi_berat" class="form-label">Dimensi Berat</label>
                            <input type="number" step="0.01" class="form-control" id="dimensi_berat"
                                name="dimensi_berat" placeholder="Masukkan dimensi berat">
                        </div>
                        <div class="d-flex justify-content-end mt-4">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
