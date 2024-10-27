@extends('backend.layouts.master')

@section('title')
    Pembelian List
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
                                <h4 class="page-title pull-left">Daftar Bahan Pembelian (PO)</h4>
                                <ul class="breadcrumbs pull-left">
                                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                                    <li><a href="{{ route('bahanPembelians.index', ['id' => $bahanPembelianId]) }}">Daftar
                                            Pekerjaan</a></li>
                                    <li><span>Daftar Bahan Pembelian (PO)</span></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-sm-6 clearfix">
                            @include('backend.layouts.partials.logout')
                        </div>
                    </div>
                </div>
                <!-- End Page Title Area -->

                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success!</strong> {{ $message }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <div class="py-3">
                    <!-- Button to open create modal -->
                    <button class="btn btn-primary mb-4" data-toggle="modal" data-target="#createModal">
                        <i class="fas fa-plus"></i> Tambah Pembelian
                    </button>
                    <a href="{{ route('projectPembelians.index') }}" class="btn btn-secondary text-white mb-4">Kembali ke
                        PO</a>
                </div>

                <!-- Pembelian List Table -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Daftar Pembelian</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            @if ($pembelians->isEmpty())
                                <p class="text-center">Tidak ada pembelian yang tersedia.</p>
                            @else
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Bahan Pembelian</th>
                                            <th>Nama Bahan</th>
                                            <th>Jumlah</th>
                                            <th>Harga Satuan</th>
                                            <th>Keterangan</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pembelians as $pembelian)
                                            <tr>
                                                <td>{{ $pembelian->id }}</td>
                                                <td>{{ $pembelian->bahanPembelian->projectPembelian->project }} -
                                                    {{ $pembelian->bahanPembelian->projectPembelian->nomor_po }}</td>
                                                <td>{{ $pembelian->nama_bahan }}</td>
                                                <td>{{ $pembelian->jumlah }}</td>
                                                <td>{{ number_format($pembelian->harga_satuan, 2, ',', '.') }}</td>
                                                <td>{{ $pembelian->keterangan }}</td>
                                                <td>
                                                    <button class="btn btn-warning btn-sm" data-toggle="modal"
                                                        data-target="#editModal-{{ $pembelian->id }}">
                                                        <i class="fas fa-pencil-alt"></i> Edit
                                                    </button>
                                                    <form action="{{ route('pembelians.destroy', $pembelian->id) }}"
                                                        method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"
                                                            onclick="return confirm('Are you sure?')">
                                                            <i class="fas fa-trash"></i> Delete
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>

                                            <!-- Edit Modal -->
                                            <div class="modal fade" id="editModal-{{ $pembelian->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="editModalLabel">Edit Pembelian</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="{{ route('pembelians.update', $pembelian->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label for="nama_bahan">Nama Bahan</label>
                                                                    <input type="text" class="form-control"
                                                                        name="nama_bahan"
                                                                        value="{{ $pembelian->nama_bahan }}" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="jumlah">Jumlah</label>
                                                                    <input type="number" class="form-control"
                                                                        name="jumlah" value="{{ $pembelian->jumlah }}"
                                                                        required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="harga_satuan">Harga Satuan</label>
                                                                    <input type="number" class="form-control"
                                                                        name="harga_satuan"
                                                                        value="{{ $pembelian->harga_satuan }}" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="keterangan">Keterangan</label>
                                                                    <textarea class="form-control" name="keterangan">{{ $pembelian->keterangan }}</textarea>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Save
                                                                    changes</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </tbody>
                                </table>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Create Modal -->
    <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createModalLabel">Tambah Pembelian</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('pembelians.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nama_bahan">Nama Bahan</label>
                            <input type="text" class="form-control" name="nama_bahan" required>
                        </div>
                        <div class="form-group">
                            <label for="jumlah">Jumlah</label>
                            <input type="number" class="form-control" name="jumlah" required>
                        </div>
                        <div class="form-group">
                            <label for="harga_satuan">Harga Satuan</label>
                            <input type="number" class="form-control" name="harga_satuan" required>
                        </div>
                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <textarea class="form-control" name="keterangan"></textarea>
                        </div>
                        <input type="hidden" name="bahan_pembelian_id" value="{{ $bahanPembelianId }}">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
