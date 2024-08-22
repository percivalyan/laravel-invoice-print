@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="h3 mb-4 text-gray-800">Bahan Pembelian</h1>
            
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> {{ $message }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div class="card mb-4">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold text-primary">Project Pembelian ID</h6>
                </div>
            </div>

            <a class="btn btn-success mb-3" href="{{ route('bahanPembelians.create', ['project_pembelian_id' => $projectPembelianId]) }}">
                <i class="fas fa-plus"></i> Tambah Bahan
            </a>

            <a href="{{ route('projectPembelians.index') }}" class="btn btn-secondary mb-3">
                Kembali ke PO
            </a> 

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Daftar Bahan Pembelian</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Project Pembelian</th>
                                    <th>Pembelian</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bahanPembelians as $bahanPembelian)
                                    <tr>
                                        <td>{{ $bahanPembelian->id }}</td>
                                        <td>  {{ $bahanPembelian->projectPembelian->project }} - {{ $bahanPembelian->projectPembelian->nomor_po }} - {{ $bahanPembelian->projectPembelian->tanggal_order }}</td>
                                        <td>{{ $bahanPembelian->pembelian }}</td>
                                        <td>
                                            <a class="btn btn-info btn-sm" href="{{ route('bahanPembelians.show', $bahanPembelian->id) }}">
                                                <i class="fas fa-eye"></i> Melihat Daftar Pembelian
                                            </a>
                                            <a class="btn btn-primary btn-sm" href="{{ route('bahanPembelians.edit', $bahanPembelian->id) }}">
                                                <i class="fas fa-pencil-alt"></i> Edit
                                            </a>
                                            <form action="{{ route('bahanPembelians.destroy', $bahanPembelian->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">
                                                    <i class="fas fa-trash"></i> Delete
                                                </button>
                                            </form>
                                            <a class="btn btn-secondary btn-sm" href="{{ route('pembelians.index', ['bahan_pembelian_id' => $bahanPembelian->id]) }}">
                                                <i class="fas fa-arrow-right"></i> Buat Daftar PO
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
    </div>
</div>
@endsection
