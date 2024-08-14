@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Penawaran List</h1>
        <div>
            <a href="{{ route('penawarans.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-plus fa-sm text-white-50"></i> Penawaran Baru
            </a>
            <a href="{{ route('jenisPenawarans.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm">
                <i class="fas fa-plus fa-sm text-white-50"></i> Membuat Jenis Penawaran
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
            <h6 class="m-0 font-weight-bold text-primary">Penawaran List</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Project</th>
                            <th>Pekerjaan</th>
                            <th>Quantitas</th>
                            <th>Unit</th>
                            <th>Harga Satuan</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($penawarans as $penawaran)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $penawaran->projectPenawaran->kepada }}</td>
                                <td>{{ $penawaran->pekerjaan }}</td>
                                <td>{{ $penawaran->quantitas }}</td>
                                <td>{{ $penawaran->unit }}</td>
                                <td>{{ $penawaran->harga_satuan }}</td>
                                <td>
                                    <a href="{{ route('penawarans.show', $penawaran) }}" class="btn btn-info btn-sm">View</a>
                                    <a href="{{ route('penawarans.edit', $penawaran) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('penawarans.destroy', $penawaran) }}" method="POST" style="display:inline;">
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
