@extends('backend.layouts.master')

@section('title')
    Pembelian List
@endsection

@section('admin-content')
<div class="container">
    <div class="row mb-4">
        <div class="col-lg-12">
            <h2 class="mb-4">Detail Bahan Pembelian</h2>
            
            <!-- Bahan Pembelian Details -->
            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                    <strong>Bahan Pembelian ID: </strong> {{ $bahanPembelian->id }}
                </div>
                <div class="card-body">
                    <dl class="row">
                        <dt class="col-sm-4">Project Pembelian:</dt>
                        <dd class="col-sm-8">{{ $bahanPembelian->projectPembelian->project }}</dd>

                        <dt class="col-sm-4">Pembelian:</dt>
                        <dd class="col-sm-8">{{ $bahanPembelian->pembelian }}</dd>
                    </dl>
                </div>
            </div>

            <!-- Related Pembelian Records -->
            <h3 class="mb-3">Pembelian Terkait</h3>
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th>ID</th>
                                <th>Nama Bahan</th>
                                <th>Jumlah</th>
                                <th>Harga Satuan</th>
                                <th>Keterangan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bahanPembelian->pembelians as $pembelian)
                                <tr>
                                    <td>{{ $pembelian->id }}</td>
                                    <td>{{ $pembelian->nama_bahan }}</td>
                                    <td>{{ $pembelian->jumlah }}</td>
                                    <td>{{ number_format($pembelian->harga_satuan, 2) }}</td>
                                    <td>{{ $pembelian->keterangan }}</td>
                                    <td>
                                        <a class="btn btn-primary btn-sm" href="{{ route('pembelians.edit', $pembelian->id) }}">Edit</a>
                                        <form action="{{ route('pembelians.destroy', $pembelian->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Back Button -->
            <a class="btn btn-secondary mt-3" href="{{ route('bahanPembelians.index') }}"><i class="fas fa-arrow-left"></i> Kembali ke Bahan Pembelian</a>
        </div>
    </div>
</div>
@endsection
