@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h2>Detail Bahan Pembelian</h2>
            
            <div class="card mb-4">
                <div class="card-header">
                    <strong>Bahan Pembelian ID: </strong> {{ $bahanPembelian->id }}
                </div>
                <div class="card-body">
                    <p><strong>Project Pembelian:</strong> {{ $bahanPembelian->projectPembelian->project }}</p>
                    <p><strong>Pembelian:</strong> {{ $bahanPembelian->pembelian }}</p>
                </div>
            </div>

            <h3>Pembelian Terkait</h3>
            <table class="table table-bordered">
                <thead>
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
                            <td>{{ $pembelian->harga_satuan }}</td>
                            <td>{{ $pembelian->keterangan }}</td>
                            <td>
                                <a class="btn btn-primary" href="{{ route('pembelians.edit', $pembelian->id) }}">Edit</a>
                                <form action="{{ route('pembelians.destroy', $pembelian->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <a class="btn btn-secondary" href="{{ route('bahanPembelians.index') }}">Kembali ke Bahan Pembelian</a>
        </div>
    </div>
</div>
@endsection
