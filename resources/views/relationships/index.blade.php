@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Batch Kwitansi - Project Kwitansi Relationships</h1>
    
    <!-- Search Form -->
    <form action="{{ route('relationships.index') }}" method="GET" class="mb-3">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Search by Project Kwitansi" value="{{ request()->query('search') }}">
            <button type="submit" class="btn btn-primary">Search</button>
        </div>
    </form>

    {{-- Back to projectKwitansis.index --}}
    <a href="{{ route('projectKwitansis.index') }}" class="btn btn-primary mb-3">Back to Project Kwitansi</a>
    {{-- <a href="{{ route('relationships.create') }}" class="btn btn-primary mb-3">Add New Relationship</a> --}}

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Project Kwitansi</th>
                <th>Batch Kwitansi</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($relationships->groupBy('project_kwitansi_id') as $projectKwitansiId => $groupedRelationships)
                @php
                    $projectKwitansi = $groupedRelationships->first()->projectKwitansi;
                @endphp
                <tr>
                    <td>{{ $projectKwitansi->nomor_surat_jalan }}</td>
                    <td>
                        <ul>
                            @foreach($groupedRelationships as $relationship)
                                <li>
                                    {{ $relationship->batchKwitansi->nama_batch }}<br>
                                    <small>Uraian Kwitansi:</small><br>
                                    @foreach($relationship->batchKwitansi->uraianKwitansis as $uraianKwitansi)
                                        <small>{{ $uraianKwitansi->nama_uraian }} - {{ $uraianKwitansi->jumlah_uraian }} {{ $uraianKwitansi->satuan_uraian }}</small><br>
                                    @endforeach
                                </li>
                            @endforeach
                        </ul>
                    </td>
                    <td>
                        <a href="{{ route('relationships.edit', $groupedRelationships->first()->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('relationships.destroy', $groupedRelationships->first()->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">No relationships found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
