@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h2>Pembelian List</h2>
            <a class="btn btn-success mb-3" href="{{ route('pembelians.create') }}">Tambah Pembelian</a>

            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif

            <table class="table table-bordered">
                <tr>
                    <th>No</th>
                    <th>Nama Bahan</th>
                    <th>Jumlah</th>
                    <th>Harga Satuan</th>
                    <th>Keterangan</th>
                    <th width="280px">Action</th>
                </tr>
                @foreach ($pembelians as $pembelian)
                <tr>
                    <td>{{ ++$loop->index }}</td>
                    <td>{{ $pembelian->nama_bahan }}</td>
                    <td>{{ $pembelian->jumlah }}</td>
                    <td>{{ $pembelian->harga_satuan }}</td>
                    <td>{{ $pembelian->keterangan }}</td>
                    <td>
                        <a class="btn btn-info" href="{{ route('pembelians.show', $pembelian->id) }}">Show</a>
                        <a class="btn btn-primary" href="{{ route('pembelians.edit', $pembelian->id) }}">Edit</a>
                        <form action="{{ route('pembelians.destroy', $pembelian->id) }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection
