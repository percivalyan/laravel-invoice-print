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
                        <h4 class="page-title pull-left">Purchase Order</h4>
                        <ul class="breadcrumbs pull-left">
                            <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li><span>Daftar Project Purchase Order</span></li>
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
        <form method="GET" action="{{ route('projectPembelians.index') }}" class="py-3">
            <div class="form-group d-flex align-items-center">
                <input type="text" id="search" name="search" class="form-control mr-2"
                    value="{{ request('search') }}" placeholder="Search all...">
                <button type="submit" class="btn btn-sm btn-primary shadow-sm">Search</button>
            </div>
        </form>

        <!-- DataTable Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">Project Purchase Order</h6>
                <!-- Create New Project Pembelian Button -->
                <a href="{{ route('projectPembelians.create') }}" class="btn btn-sm btn-primary shadow-sm"
                    data-toggle="tooltip" title="Tambah Project Pembelian Baru">
                    <i class="fas fa-plus fa-sm text-white-50"></i> Buat Project Purchase Order
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr class="text-center">
                                <th>No.</th>
                                <th>Nomor PO</th>
                                <th>Project</th>
                                <th>Tanggal Order</th>
                                <th>Metode Pembayaran</th>
                                <th>PO Ditunjukan <br> Kepada </th>
                                <th>Kontak</th>
                                <th>Actions <br> (Pengaturan Spesifik Surat)</th>
                                <th>Pekerjaan</th>
                                <th>Preview <br> Purchase Order</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($projectPembelians as $projectPembelian)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $projectPembelian->nomor_po }}</td>
                                    <td>{{ $projectPembelian->project }}</td>
                                    <td>{{ $projectPembelian->tanggal_order }}</td>
                                    <td>{{ $projectPembelian->metode_pembayaran }}</td>
                                    <td>{{ $projectPembelian->po_ditunjukan_kepada }}</td>
                                    <td>{{ $projectPembelian->kontak }} | {{ $projectPembelian->email_mobile_number }}
                                    </td>
                                    <td class="text-center">
                                        <!-- Edit Button -->
                                        <a href="{{ route('projectPembelians.edit', $projectPembelian->id) }}"
                                            class="btn btn-warning btn-sm mb-2" data-toggle="tooltip"
                                            title="Edit Project Pembelian">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>

                                        <!-- Delete Button -->
                                        <form action="{{ route('projectPembelians.destroy', $projectPembelian->id) }}"
                                            method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm mb-2"
                                                onclick="return confirm('Are you sure you want to delete this item?')"
                                                data-toggle="tooltip" title="Delete Project Pembelian">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>

                                        <!-- Add Note Button -->
                                        <a href="{{ route('catatanPembelians.create', ['project_pembelian_id' => $projectPembelian->id]) }}"
                                            class="btn btn-success btn-sm mb-2" data-toggle="tooltip" title="Add Note">
                                            <i class="fas fa-sticky-note"></i> Ket.
                                        </a>

                                        <!-- Set TTD Button -->
                                        <a href="{{ route('footerPembelians.create', ['project_pembelian_id' => $projectPembelian->id]) }}"
                                            class="btn btn-primary btn-sm mb-2" data-toggle="tooltip"
                                            title="Set Penanggungjawab">
                                            <i class="fas fa-user-tie"></i> Atur TTD
                                        </a>
                                    </td>
                                    <td class="text-center">
                                        <!-- Input Pekerjaan Button -->
                                        <a href="{{ route('bahanPembelians.create', ['project_pembelian_id' => $projectPembelian->id]) }}"
                                            class="btn btn-sm btn-success mb-2" data-toggle="tooltip"
                                            title="Input Pekerjaan">
                                            <i class="fas fa-box"></i> Input Pekerjaan
                                        </a>

                                        <!-- List Pekerjaan Button -->
                                        <a href="{{ route('bahanPembelians.index', ['project_pembelian_id' => $projectPembelian->id]) }}"
                                            class="btn btn-sm btn-info mb-2" data-toggle="tooltip" title="List Pekerjaan">
                                            <i class="fas fa-list"></i> Daftar Pekerjaan
                                        </a>
                                    </td>
                                    <td class="text-center">
                                        <!-- View PO Button -->
                                        <a href="{{ route('projectPembelians.show', $projectPembelian->id) }}"
                                            class="btn btn-info btn-sm mb-2" data-toggle="tooltip" title="View PO">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $projectPembelians->links() }}
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
