@extends('backend.layouts.master')

@section('title')
    Surat Penawaran
@endsection

@section('admin-content')
    <div class="container-fluid">

        <!-- Page Title Area -->
        <div class="page-title-area">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <div class="breadcrumbs-area clearfix">
                        <h4 class="page-title pull-left">Uraian Jenis Penawaran</h4>
                        <ul class="breadcrumbs pull-left">
                            <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li><a href="{{ route('jenisPenawarans.index') }}">Daftar Jenis Penawaran</a></li>
                            <li><span>Daftar Uraian</span></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 clearfix">
                    @include('backend.layouts.partials.logout')
                </div>
            </div>
        </div>
        <!-- End Page Title Area -->

        <!-- Success Message -->
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <!-- Search Form -->
        <form method="GET" action="{{ route('uraianJenisPekerjaanPenawarans.index') }}" class="py-3">
            <input type="hidden" name="jenis_penawaran_id" value="{{ request()->query('jenis_penawaran_id') }}">
            <div class="form-group d-flex align-items-center">
                <input type="text" name="search" class="form-control mr-2"
                    placeholder="Cari Uraian, Quantitas, Unit, atau Harga" value="{{ request()->query('search') }}">
                <button type="submit" class="btn btn-sm btn-primary shadow-sm">Search</button>
            </div>
        </form>

        <!-- Back Button -->
        <div class="d-sm-flex justify-content-between mb-4">
            <button class="btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#createModal">
                <i class="fas fa-plus fa-sm text-white-50"></i> Uraian Baru
            </button>
            <a href="{{ route('jenisPenawarans.index') }}" class="btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-arrow-left"></i> Back to Jenis Penawaran
            </a>
        </div>

        <!-- DataTable Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">
                    Daftar Uraian Jenis Penawaran
                    @if ($uraianJenisPekerjaanPenawarans->first() && $uraianJenisPekerjaanPenawarans->first()->jenisPenawaran)
                        {{ $uraianJenisPekerjaanPenawarans->first()->jenisPenawaran->jenis_pekerjaan }}
                    @else
                        Jenis Penawaran Tidak Tersedia
                    @endif
                </h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Jenis Penawaran</th>
                                <th>Uraian</th>
                                <th>Quantitas</th>
                                <th>Unit</th>
                                <th>Harga Satuan</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($uraianJenisPekerjaanPenawarans as $uraian)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        @if ($uraian->jenisPenawaran)
                                            {{ $uraian->jenisPenawaran->jenis_pekerjaan }}
                                        @else
                                            <span class="text-danger">Jenis Penawaran Tidak Ditemukan</span>
                                        @endif
                                    </td>
                                    <td>{{ $uraian->uraian }}</td>
                                    <td>{{ $uraian->quantitas }}</td>
                                    <td>{{ $uraian->unit }}</td>
                                    <td>{{ $uraian->harga_satuan }}</td>
                                    <td class="text-center">
                                        <button class="btn btn-warning btn-sm mb-2" data-toggle="modal" data-target="#editModal{{ $uraian->id }}">
                                            <i class="fas fa-pencil-alt"></i>
                                        </button>

                                        <form action="{{ route('uraianJenisPekerjaanPenawarans.destroy', $uraian->id) }}"
                                            method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')

                                            <!-- Hidden input for jenis_penawaran_id -->
                                            @if (request()->has('jenis_penawaran_id'))
                                                <input type="hidden" name="jenis_penawaran_id"
                                                    value="{{ request('jenis_penawaran_id') }}">
                                            @endif

                                            <button type="submit" class="btn btn-danger btn-sm mb-2"
                                                onclick="return confirm('Are you sure you want to delete this item?')" data-toggle="tooltip"
                                                title="Hapus Uraian">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>

                                <!-- Edit Modal -->
                                <div class="modal fade" id="editModal{{ $uraian->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{ $uraian->id }}" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <form action="{{ route('uraianJenisPekerjaanPenawarans.update', $uraian->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editModalLabel{{ $uraian->id }}">Edit Uraian</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <input type="hidden" name="jenis_penawaran_id" value="{{ $uraian->jenis_penawaran_id }}">
                                                    <div class="form-group">
                                                        <label for="uraian">Uraian</label>
                                                        <input type="text" class="form-control" name="uraian" value="{{ $uraian->uraian }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="quantitas">Quantitas</label>
                                                        <input type="number" class="form-control" name="quantitas" value="{{ $uraian->quantitas }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="unit">Unit</label>
                                                        <input type="text" class="form-control" name="unit" value="{{ $uraian->unit }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="harga_satuan">Harga Satuan</label>
                                                        <input type="number" class="form-control" name="harga_satuan" value="{{ $uraian->harga_satuan }}">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Create Modal -->
        <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="{{ route('uraianJenisPekerjaanPenawarans.store') }}" method="POST">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="createModalLabel">Buat Uraian Baru</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" name="jenis_penawaran_id" value="{{ request()->query('jenis_penawaran_id') }}">
                            <div class="form-group">
                                <label for="uraian">Uraian</label>
                                <input type="text" class="form-control" name="uraian" required>
                            </div>
                            <div class="form-group">
                                <label for="quantitas">Quantitas</label>
                                <input type="number" class="form-control" name="quantitas">
                            </div>
                            <div class="form-group">
                                <label for="unit">Unit</label>
                                <input type="text" class="form-control" name="unit">
                            </div>
                            <div class="form-group">
                                <label for="harga_satuan">Harga Satuan</label>
                                <input type="number" class="form-control" name="harga_satuan">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
