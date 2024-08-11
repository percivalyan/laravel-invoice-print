@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tujuan Penawaran</h1>
        <a href="{{ route('tujuanPenawarans.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50"></i> Create New Tujuan Penawaran
        </a>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tujuan Penawaran List</h6>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Project Penawaran</th>
                            <th>Pengajuan</th>
                            <th>Tujuan</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tujuanPenawarans as $tujuanPenawaran)
                            <tr>
                                <td>{{ $tujuanPenawaran->projectPenawaran->proyek }} - {{ $tujuanPenawaran->projectPenawaran->nomor }}</td>
                                <td>{{ $tujuanPenawaran->pengajuan }}</td>
                                <td>{{ $tujuanPenawaran->tujuan }}</td>
                                <td>
                                    <a href="{{ route('tujuanPenawarans.show', $tujuanPenawaran->id) }}" class="btn btn-info btn-sm">View</a>
                                    <a href="{{ route('tujuanPenawarans.edit', $tujuanPenawaran->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('tujuanPenawarans.destroy', $tujuanPenawaran->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
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
