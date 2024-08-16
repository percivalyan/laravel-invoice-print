@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Pembelian List</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('pembelians.create') }}" class="btn btn-primary">Add New Pembelian</a>

    <table class="table mt-4">
        <thead>
            <tr>
                <th>ID</th>
                <th>Project Pembelian ID</th>
                <th>Nama Bahan</th>
                <th>Keterangan</th>
                <th>Jumlah</th>
                <th>Harga Satuan</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pembelians as $pembelian)
                <tr>
                    <td>{{ $pembelian->id }}</td>
                    <td>{{ $pembelian->project_pembelian_id }}</td>
                    <td>{{ $pembelian->nama_bahan }}</td>
                    <td>{{ $pembelian->keterangan }}</td>
                    <td>{{ $pembelian->jumlah }}</td>
                    <td>{{ $pembelian->harga_satuan }}</td>
                    <td>
                        <a href="{{ route('pembelians.show', $pembelian->id) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('pembelians.edit', $pembelian->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('pembelians.destroy', $pembelian->id) }}" method="POST" style="display:inline;">
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
@endsection
