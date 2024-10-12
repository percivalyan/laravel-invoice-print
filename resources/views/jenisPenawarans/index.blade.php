@extends('backend.layouts.master')

@section('title')
    Jenis Penawaran List
@endsection

@section('admin-content')
    <div class="container-fluid">

        <!-- Page Title Area -->
        <div class="page-title-area">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <div class="breadcrumbs-area clearfix">
                        <h4 class="page-title pull-left">Jenis Penawaran List</h4>
                        <ul class="breadcrumbs pull-left">
                            <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li><span>List Jenis Penawaran</span></li>
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

        <!-- Add Button -->
        <div class="d-sm-flex justify-content-between mb-4">
            <a href="{{ route('jenisPenawarans.create') }}" class="btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-plus fa-sm text-white-50"></i> Jenis Penawaran Baru
            </a>
        </div>

        <!-- DataTable Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">Uraian Penawaran List</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Jenis Penawaran</th>
                                <th>Quantitas</th>
                                <th>Unit</th>
                                <th>Harga Satuan</th>
                                <th>Actions</th>
                                <th>Uraian Penawaran</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jenisPenawarans as $jenisPenawaran)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $jenisPenawaran->jenis_pekerjaan }}</td>
                                    <td>{{ $jenisPenawaran->quantitas }}</td>
                                    <td>{{ $jenisPenawaran->unit }}</td>
                                    <td>{{ $jenisPenawaran->harga_satuan }}</td>
                                    <td class="text-center">
                                        <!-- Edit Button -->
                                        <a href="{{ route('jenisPenawarans.edit', $jenisPenawaran) }}"
                                            class="btn btn-warning btn-sm mb-2" data-toggle="tooltip"
                                            title="Edit Jenis Penawaran">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>

                                        <!-- Delete Button -->
                                        <form action="{{ route('jenisPenawarans.destroy', $jenisPenawaran) }}"
                                            method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm mb-2"
                                                onclick="return confirm('Are you sure you want to delete this item?')"
                                                data-toggle="tooltip" title="Delete Jenis Penawaran">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                    <td class="text-center">
                                        <!-- Uraian Pekerjaan Buttons -->
                                        <a href="{{ route('uraianJenisPekerjaanPenawarans.create', ['jenis_penawaran_id' => $jenisPenawaran->id]) }}"
                                            class="btn btn-secondary btn-sm mb-2" data-toggle="tooltip" title="Buat Uraian">
                                            <i class="fas fa-plus"></i> Buat Uraian
                                        </a>

                                        <a href="{{ route('uraianJenisPekerjaanPenawarans.index', ['jenis_penawaran_id' => $jenisPenawaran->id]) }}"
                                            class="btn btn-secondary btn-sm mb-2" data-toggle="tooltip"
                                            title="Lihat Uraian">
                                            <i class="fas fa-list"></i> Lihat Uraian
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
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
