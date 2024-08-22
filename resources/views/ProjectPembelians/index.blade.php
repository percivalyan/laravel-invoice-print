@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Project Pembelians</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('projectPembelians.create') }}" class="btn btn-primary mb-3">Create Project Pembelian</a>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Project Pembelian List</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nomor PO</th>
                            <th>Project</th>
                            <th>Tanggal Order</th>
                            <th>Metode Pembayaran</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($projectPembelians as $projectPembelian)
                            <tr>
                                <td>{{ $projectPembelian->nomor_po }}</td>
                                <td>{{ $projectPembelian->project }}</td>
                                <td>{{ $projectPembelian->tanggal_order }}</td>
                                <td>{{ $projectPembelian->metode_pembayaran }}</td>
                                <td>
                                    <a href="{{ route('projectPembelians.show', $projectPembelian->id) }}" class="btn btn-info btn-sm">Lihat Surat PO</a>
                                    <a href="{{ route('projectPembelians.edit', $projectPembelian->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('projectPembelians.destroy', $projectPembelian->id) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                    <a href="{{ route('catatanPembelians.create', ['project_pembelian_id' => $projectPembelian->id]) }}" class="btn btn-success btn-sm">Catatan</a>
                                    <a href="{{ route('footerPembelians.create', ['project_pembelian_id' => $projectPembelian->id]) }}" class="btn btn-primary btn-sm">Penanggungjawab</a>
                                    <a href="{{ route('bahanPembelians.index', ['project_pembelian_id' => $projectPembelian->id]) }}" class="btn btn-secondary btn-sm">Buat Bahan Pembelian</a>
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
