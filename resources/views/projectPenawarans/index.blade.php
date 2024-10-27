@extends('backend.layouts.master')

@section('title')
    Surat Penawaran Pages
@endsection

@section('admin-content')
    <div class="container-fluid">

        <!-- Page Title Area -->
        <div class="page-title-area">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <div class="breadcrumbs-area clearfix">
                        <h4 class="page-title pull-left">Surat Penawaran</h4>
                        <ul class="breadcrumbs pull-left">
                            <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li><span>Project Surat Penawaran</span></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6 text-right">
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
        <form method="GET" action="{{ route('projectPenawarans.index') }}" class="py-3">
            <div class="form-group d-flex align-items-center">
                <input type="text" id="search" name="search" class="form-control mr-2"
                    value="{{ request('search') }}" placeholder="Search all...">
                <button type="submit" class="btn btn-sm btn-primary">Search</button>
            </div>
        </form>

        <!-- DataTable Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">Daftar Project Penawaran</h6>
                <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#createModal">
                    <i class="fas fa-plus fa-sm text-white-50"></i> Buat Project Surat Penawaran
                </button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Kepada <br> (Recipient)</th>
                                <th>Nomor <br> Surat Penawaran</th>
                                <th>Tanggal</th>
                                <th>Proyek</th>
                                <th>Lokasi</th>
                                <th class="text-center">Actions <br> (Pengaturan Spesifik Surat)</th>
                                <th class="text-center">Membuat Pekerjaan</th>
                                <th class="text-center">Preview <br> Surat Penawaran</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($projectPenawarans as $projectPenawaran)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $projectPenawaran->kepada }}</td>
                                    <td>{{ $projectPenawaran->nomor }}</td>
                                    <td>{{ $projectPenawaran->tanggal }}</td>
                                    <td>{{ $projectPenawaran->proyek }}</td>
                                    <td>{{ $projectPenawaran->lokasi }}</td>
                                    <td class="text-center">
                                        <button class="btn btn-warning btn-sm mb-2" data-toggle="modal" 
                                            data-target="#editModal{{ $projectPenawaran->id }}" data-toggle="tooltip"
                                            title="Ubah Data Projek">
                                            <i class="fas fa-pencil-alt"></i>
                                        </button>

                                        <form action="{{ route('projectPenawarans.destroy', $projectPenawaran->id) }}"
                                            method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm mb-2"
                                                onclick="return confirm('Are you sure you want to delete this item?')"
                                                data-toggle="tooltip" title="Hapus Data Projek">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>

                                        <a href="{{ route('tujuanPenawarans.create', ['project_penawaran_id' => $projectPenawaran->id]) }}"
                                            class="btn btn-success btn-sm mb-2" data-toggle="tooltip" title="Keterangan SP">
                                            <i class="fas fa-info"></i> Ket.
                                        </a>

                                        <a href="{{ route('footerPenawarans.create', ['project_penawaran_id' => $projectPenawaran->id]) }}"
                                            class="btn btn-primary btn-sm mb-2" data-toggle="tooltip" title="Atur TTD">
                                            <i class="fas fa-signature"></i> Atur TTD
                                        </a>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('penawarans.create', ['project_penawaran_id' => $projectPenawaran->id]) }}"
                                            class="btn btn-success btn-sm mb-2" data-toggle="tooltip"
                                            title="Input Pekerjaan">
                                            <i class="fas fa-tasks"></i> Input Pekerjaan
                                        </a>

                                        <a href="{{ route('penawarans.index', ['project_penawaran_id' => $projectPenawaran->id]) }}"
                                            class="btn btn-info btn-sm mb-2" data-toggle="tooltip"
                                            title="List Pekerjaan">
                                            <i class="fas fa-list"></i> List Pekerjaan
                                        </a>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('projectPenawarans.show', $projectPenawaran) }}"
                                            class="btn btn-info btn-sm mb-2" data-toggle="tooltip"
                                            title="Preview Surat Penawaran"><i class="fas fa-eye"></i></a>
                                    </td>
                                </tr>

                                <!-- Edit Modal -->
                                <div class="modal fade" id="editModal{{ $projectPenawaran->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{ $projectPenawaran->id }}" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editModalLabel{{ $projectPenawaran->id }}">Edit Project Penawaran</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('projectPenawarans.update', $projectPenawaran->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="form-group">
                                                        <label for="kepada">Kepada</label>
                                                        <input type="text" class="form-control" id="kepada" name="kepada" value="{{ $projectPenawaran->kepada }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="nomor">Nomor Surat Penawaran</label>
                                                        <input type="text" class="form-control" id="nomor" name="nomor" value="{{ $projectPenawaran->nomor }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="tanggal">Tanggal</label>
                                                        <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ $projectPenawaran->tanggal }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="proyek">Proyek</label>
                                                        <input type="text" class="form-control" id="proyek" name="proyek" value="{{ $projectPenawaran->proyek }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="lokasi">Lokasi</label>
                                                        <input type="text" class="form-control" id="lokasi" name="lokasi" value="{{ $projectPenawaran->lokasi }}">
                                                    </div>
                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Create Modal -->
    <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createModalLabel">Buat Project Penawaran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('projectPenawarans.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="kepada">Kepada</label>
                            <input type="text" class="form-control" id="kepada" name="kepada" required>
                        </div>
                        <div class="form-group">
                            <label for="nomor">Nomor Surat Penawaran</label>
                            <input type="text" class="form-control" id="nomor" name="nomor">
                        </div>
                        <div class="form-group">
                            <label for="tanggal">Tanggal</label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal">
                        </div>
                        <div class="form-group">
                            <label for="proyek">Proyek</label>
                            <input type="text" class="form-control" id="proyek" name="proyek">
                        </div>
                        <div class="form-group">
                            <label for="lokasi">Lokasi</label>
                            <input type="text" class="form-control" id="lokasi" name="lokasi">
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
