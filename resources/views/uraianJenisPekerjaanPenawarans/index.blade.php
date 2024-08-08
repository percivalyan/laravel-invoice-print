@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Uraian Jenis Pekerjaan Penawaran</h1>
    <a href="{{ route('uraianJenisPekerjaanPenawarans.create') }}" class="btn btn-primary">Add New</a>
    <table class="table mt-4">
        <thead>
            <tr>
                <th>ID</th>
                <th>Uraian</th>
                <th>Jenis Pekerjaan</th>
                <th>Quantitas</th>
                <th>Unit</th>
                <th>Harga Satuan</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($uraianJenisPekerjaanPenawarans as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->uraian }}</td>
                <td>{{ $item->jenis_pekerjaan }}</td>
                <td>{{ $item->quantitas }}</td>
                <td>{{ $item->unit }}</td>
                <td>{{ $item->harga_satuan }}</td>
                <td>
                    <a href="{{ route('uraianJenisPekerjaanPenawarans.show', $item->id) }}" class="btn btn-info">View</a>
                    <a href="{{ route('uraianJenisPekerjaanPenawarans.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('uraianJenisPekerjaanPenawarans.destroy', $item->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
