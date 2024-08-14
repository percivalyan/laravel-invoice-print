@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Jenis Penawaran List</h1>
        <div>
            <a href="{{ route('jenisPenawarans.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-plus fa-sm text-white-50"></i> Jenis Penawaran Baru
            </a>
            <a href="{{ route('uraianJenisPekerjaanPenawarans.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm">
                <i class="fas fa-plus fa-sm text-white-50"></i> Membuat Uraian Penawaran
            </a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Jenis Penawaran List</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Jenis Pekerjaan</th>
                            <th>Quantitas</th>
                            <th>Unit</th>
                            <th>Harga Satuan</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($jenisPenawarans as $jenisPenawaran)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $jenisPenawaran->jenis_pekerjaan }}</td>
                                <td>{{ $jenisPenawaran->quantitas }}</td>
                                <td>{{ $jenisPenawaran->unit }}</td>
                                <td>{{ $jenisPenawaran->harga_satuan }}</td>
                                <td>
                                    <a href="{{ route('jenisPenawarans.show', $jenisPenawaran) }}" class="btn btn-info btn-sm">View</a>
                                    <a href="{{ route('jenisPenawarans.edit', $jenisPenawaran) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('jenisPenawarans.destroy', $jenisPenawaran) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
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
@endsection
