@extends('backend.layouts.master')

@section('title')
    Purchase Order
@endsection

@section('admin-content')
    <div class="container-fluid">

        <!-- Page Title Area -->
        <div class="page-title-area">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <div class="breadcrumbs-area clearfix">
                        <h4 class="page-title pull-left">Daftar Pekerjaan (PO)</h4>
                        <ul class="breadcrumbs pull-left">
                            <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li><span>Daftar Pekerjaan PO</span></li>
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
                <strong>Success!</strong> {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <!-- Search Form -->
        <form method="GET" action="{{ route('bahanPembelians.index') }}" class="py-3">
            <input type="hidden" name="project_pembelian_id" value="{{ $projectPembelianId }}">
            <div class="form-group d-flex align-items-center">
                <input type="text" name="search" class="form-control mr-2" placeholder="Cari Bahan Pembelian"
                    value="{{ request('search') }}">
                <button type="submit" class="btn btn-sm btn-primary shadow-sm">
                    <i class="fas fa-search"></i> Cari
                </button>
            </div>
        </form>

        <!-- Add and Back Buttons -->
        <div class="d-flex justify-content-between mb-3">
            <button class="btn btn-success" data-toggle="modal" data-target="#createModal">
                <i class="fas fa-plus"></i> Tambah Pekerjaan PO
            </button>
            <a href="{{ route('projectPembelians.index') }}" class="btn btn-secondary">
                Kembali ke PO
            </a>
        </div>

        <!-- DataTable Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">
                    Daftar Pekerjaan PO @if ($bahanPembelians->isNotEmpty())
                        {{ $bahanPembelians->first()->projectPembelian->project }}
                    @else
                        {{ 'N/A' }}
                    @endif
                </h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Project Pembelian</th>
                                <th>Pembelian</th>
                                <th>Actions</th>
                                <th>Bahan Pembelian</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bahanPembelians as $bahanPembelian)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        {{ $bahanPembelian->projectPembelian->project }} -
                                        {{ $bahanPembelian->projectPembelian->nomor_po }} -
                                        {{ $bahanPembelian->projectPembelian->tanggal_order }}
                                    </td>
                                    <td>{{ $bahanPembelian->pembelian }}</td>
                                    <td class="text-center">
                                        <!-- View Bahan Pembelian Button -->
                                        <a class="btn btn-info btn-sm mb-2"
                                            href="{{ route('bahanPembelians.show', $bahanPembelian->id) }}"
                                            data-toggle="tooltip" title="Melihat Daftar Pembelian"
                                            aria-label="View Bahan Pembelian">
                                            <i class="fas fa-eye"></i>
                                        </a>

                                        <!-- Edit Bahan Pembelian Button -->
                                        <button class="btn btn-primary btn-sm mb-2" data-toggle="modal"
                                            data-target="#editModal{{ $bahanPembelian->id }}" data-toggle="tooltip"
                                            title="Edit" aria-label="Edit Bahan Pembelian">
                                            <i class="fas fa-pencil-alt"></i>
                                        </button>

                                        <!-- Delete Bahan Pembelian Button -->
                                        <form action="{{ route('bahanPembelians.destroy', $bahanPembelian->id) }}"
                                            method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')

                                            <!-- Hidden input for project_pembelian_id -->
                                            @if (request()->has('project_pembelian_id'))
                                                <input type="hidden" name="project_pembelian_id"
                                                    value="{{ request('project_pembelian_id') }}">
                                            @endif

                                            <button type="submit" class="btn btn-danger btn-sm mb-2"
                                                onclick="return confirm('Are you sure you want to delete this item?')"
                                                data-toggle="tooltip" title="Delete" aria-label="Delete Bahan Pembelian">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>

                                    <td>
                                        <!-- Create PO Button -->
                                        <a class="btn btn-secondary btn-sm mb-2"
                                            href="{{ route('pembelians.index', ['bahan_pembelian_id' => $bahanPembelian->id]) }}"
                                            data-toggle="tooltip" title="Buat Daftar PO">
                                            <i class="fas fa-arrow-right"></i> Bahan Pembelian
                                        </a>
                                    </td>
                                </tr>

                                <!-- Edit Modal -->
                                <div class="modal fade" id="editModal{{ $bahanPembelian->id }}" tabindex="-1"
                                    role="dialog" aria-labelledby="editModalLabel{{ $bahanPembelian->id }}"
                                    aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editModalLabel{{ $bahanPembelian->id }}">Edit
                                                   Pekerjaan</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('bahanPembelians.update', $bahanPembelian->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PUT')

                                                    <!-- Hidden field for project_pembelian_id -->
                                                    <input type="hidden" name="project_pembelian_id"
                                                        value="{{ $bahanPembelian->project_pembelian_id }}">

                                                    <!-- Pembelian Input Field -->
                                                    <div class="form-group">
                                                        <label for="pembelian"
                                                            class="form-label"><strong>Nama Pekerjaan:</strong></label>
                                                        <input type="text" name="pembelian" id="pembelian"
                                                            class="form-control" value="{{ $bahanPembelian->pembelian }}"
                                                            placeholder="Masukkan nama pembelian" required>
                                                    </div>

                                                    <!-- Submit Button -->
                                                    <div class="text-right">
                                                        <button type="submit" class="btn btn-primary">
                                                            <i class="fas fa-save mr-1"></i> Simpan Perubahan
                                                        </button>
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
            </div>
        </div>
    </div>

    <!-- Create Modal -->
    <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createModalLabel">Tambah Pekerjaan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('bahanPembelians.store') }}" method="POST">
                        @csrf

                        <!-- Hidden field for project_pembelian_id -->
                        <input type="hidden" name="project_pembelian_id" value="{{ $projectPembelianId }}">

                        <!-- Pembelian Input Field -->
                        <div class="form-group">
                            <label for="pembelian" class="form-label"><strong>Nama Pekerjaan:</strong></label>
                            <input type="text" name="pembelian" id="pembelian" class="form-control"
                                placeholder="Masukkan nama pembelian" required>
                        </div>

                        <!-- Submit Button -->
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save mr-1"></i> Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
@endsection
