@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Jenis Penawaran List</h1>
    <a href="{{ route('jenisPenawarans.create') }}" class="btn btn-primary mb-3">Create New Jenis Penawaran</a>
    
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    
    <table class="table">
        <thead>
            <tr>
                <th>Jenis Pekerjaan</th>
                <th>Quantitas</th>
                <th>Unit</th>
                <th>Harga Satuan</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($jenisPenawarans as $jenisPenawaran)
                <tr>
                    <td>{{ $jenisPenawaran->jenis_pekerjaan }}</td>
                    <td>{{ $jenisPenawaran->quantitas }}</td>
                    <td>{{ $jenisPenawaran->unit }}</td>
                    <td>{{ $jenisPenawaran->harga_satuan }}</td>
                    <td>
                        <a href="{{ route('jenisPenawarans.show', $jenisPenawaran) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('jenisPenawarans.edit', $jenisPenawaran) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('jenisPenawarans.destroy', $jenisPenawaran) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
