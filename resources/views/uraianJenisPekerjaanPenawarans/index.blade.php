@extends('backend.layouts.master')

@section('title')
    Uraian Jenis Pekerjaan Penawaran
@endsection

@section('admin-content')
    <div class="container-fluid">

        <!-- Page Title Area -->
        <div class="page-title-area">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <div class="breadcrumbs-area clearfix">
                        <h4 class="page-title pull-left">Uraian Jenis Pekerjaan Penawaran</h4>
                        <ul class="breadcrumbs pull-left">
                            <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li><a href="{{ route('jenisPenawarans.index') }}">Jenis Penawaran</a></li>
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

        <!-- Back Button -->
        <div class="d-sm-flex justify-content-between mb-4">
            <a href="{{ route('jenisPenawarans.index') }}" class="btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-arrow-left"></i> Back to Jenis Penawaran
            </a>
        </div>

        <!-- DataTable Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">Daftar Uraian Jenis Pekerjaan {{ $jenisPenawaran->jenis_pekerjaan }}</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Jenis Penawaran</th>
                                <th>Uraian</th>
                                <th>Quantitas</th>
                                <th>Unit</th>
                                <th>Harga Satuan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($uraianJenisPekerjaanPenawarans as $uraian)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $uraian->jenisPenawaran->jenis_pekerjaan }}</td>
                                    <td>{{ $uraian->uraian }}</td>
                                    <td>{{ $uraian->quantitas }}</td>
                                    <td>{{ $uraian->unit }}</td>
                                    <td>{{ $uraian->harga_satuan }}</td>
                                    <td class="text-center">
                                        <!-- Edit Button -->
                                        <a href="{{ route('uraianJenisPekerjaanPenawarans.edit', $uraian->id) }}"
                                            class="btn btn-warning btn-sm mb-2" data-toggle="tooltip" title="Edit Uraian">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>

                                        <!-- Delete Button -->
                                        <form action="{{ route('uraianJenisPekerjaanPenawarans.destroy', $uraian->id) }}"
                                            method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm mb-2"
                                                onclick="return confirm('Apakah Anda yakin?')" data-toggle="tooltip"
                                                title="Hapus Uraian">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
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
