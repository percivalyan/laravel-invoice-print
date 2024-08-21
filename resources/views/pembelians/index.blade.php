@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="h3 mb-4 text-gray-800">Daftar Pembelian</h1>

            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> {{ $message }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <!-- Display the bahan_pembelian_id -->
            <div class="card mb-4">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold text-primary">Bahan Pembelian ID</h6>
                </div>
                <div class="card-body">
                    <p><strong>Bahan Pembelian ID:</strong> {{ $bahanPembelianId }}</p>
                </div>
            </div>

            <!-- Button to create a new Pembelian with the bahan_pembelian_id -->
            <a class="btn btn-primary mb-4" href="{{ route('pembelians.create', ['bahan_pembelian_id' => $bahanPembelianId]) }}">
                <i class="fas fa-plus"></i> Tambah Pembelian
            </a>

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Daftar Pembelian</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama Bahan</th>
                                    <th>Jumlah</th>
                                    <th>Harga Satuan</th>
                                    <th>Keterangan</th>
                                    <th>Bahan Pembelian ID</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pembelians as $pembelian)
                                    <tr>
                                        <td>{{ $pembelian->id }}</td>
                                        <td>{{ $pembelian->nama_bahan }}</td>
                                        <td>{{ $pembelian->jumlah }}</td>
                                        <td>{{ number_format($pembelian->harga_satuan, 2, ',', '.') }}</td>
                                        <td>{{ $pembelian->keterangan }}</td>
                                        <td>{{ $pembelian->bahan_pembelian_id }}</td>
                                        <td>
                                            <a class="btn btn-warning btn-sm" href="{{ route('pembelians.edit', $pembelian->id) }}">
                                                <i class="fas fa-pencil-alt"></i> Edit
                                            </a>
                                            <form action="{{ route('pembelians.destroy', $pembelian->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">
                                                    <i class="fas fa-trash"></i> Delete
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
    </div>
</div>
@endsection
