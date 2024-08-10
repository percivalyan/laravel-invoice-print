@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Penawaran List</h1>
    <a href="{{ route('penawarans.create') }}" class="btn btn-primary mb-3">Create New Penawaran</a>
    
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    
    <table class="table">
        <thead>
            <tr>
                <th>Project</th>
                <th>Pekerjaan</th>
                <th>Quantitas</th>
                <th>Unit</th>
                <th>Harga Satuan</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($penawarans as $penawaran)
                <tr>
                    <td>{{ $penawaran->projectPenawaran->kepada }}</td>
                    <td>{{ $penawaran->pekerjaan }}</td>
                    <td>{{ $penawaran->quantitas }}</td>
                    <td>{{ $penawaran->unit }}</td>
                    <td>{{ $penawaran->harga_satuan }}</td>
                    <td>
                        <a href="{{ route('penawarans.show', $penawaran) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('penawarans.edit', $penawaran) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('penawarans.destroy', $penawaran) }}" method="POST" style="display:inline;">
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
