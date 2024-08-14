@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Footer Penawaran List</h1>
        <a href="{{ route('footerPenawarans.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50"></i> Create Footer Penawaran
        </a>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Footer Penawaran List</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Project Penawaran</th>
                            <th>Nama</th>
                            <th>Jabatan</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($footerPenawarans as $footerPenawaran)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $footerPenawaran->projectPenawaran->proyek }}</td>
                                <td>{{ $footerPenawaran->nama }}</td>
                                <td>{{ $footerPenawaran->jabatan }}</td>
                                <td>
                                    <a href="{{ route('footerPenawarans.show', $footerPenawaran->id) }}" class="btn btn-info btn-sm">Show</a>
                                    <a href="{{ route('footerPenawarans.edit', $footerPenawaran->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('footerPenawarans.destroy', $footerPenawaran->id) }}" method="POST" style="display:inline;">
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
