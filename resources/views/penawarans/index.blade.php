@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Penawaran</h1>
    <a href="{{ route('penawarans.create') }}" class="btn btn-primary">Add New</a>
    <table class="table mt-4">
        <thead>
            <tr>
                <th>ID</th>
                <th>Project</th>
                <th>Jenis Pekerjaan</th>
                <th>Pekerjaan</th>
                <th>Quantitas</th>
                <th>Unit</th>
                <th>Harga Satuan</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($penawarans as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->projectPenawaran->kepada ?? 'N/A' }}</td>
                <td>{{ $item->jenisPenawaran->jenis_pekerjaan ?? 'N/A' }}</td>
                <td>{{ $item->pekerjaan }}</td>
                <td>{{ $item->quantitas }}</td>
                <td>{{ $item->unit }}</td>
                <td>{{ $item->harga_satuan }}</td>
                <td>
                    <a href="{{ route('penawarans.show', $item->id) }}" class="btn btn-info">View</a>
                    <a href="{{ route('penawarans.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('penawarans.destroy', $item->id) }}" method="POST" style="display:inline;">
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
