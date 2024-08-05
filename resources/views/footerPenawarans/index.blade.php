<!-- resources/views/footerPenawarans/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Footer Penawaran List</h1>

    <a href="{{ route('footerPenawarans.create') }}" class="btn btn-primary mb-3">Create Footer Penawaran</a>

    <table class="table">
        <thead>
            <tr>
                <th>Project Penawaran</th>
                <th>Nama</th>
                <th>Jabatan</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($footerPenawarans as $footerPenawaran)
                <tr>
                    <td>{{ $footerPenawaran->projectPenawaran->proyek }}</td>
                    <td>{{ $footerPenawaran->nama }}</td>
                    <td>{{ $footerPenawaran->jabatan }}</td>
                    <td>
                        <a href="{{ route('footerPenawarans.show', $footerPenawaran->id) }}" class="btn btn-info">Show</a>
                        <a href="{{ route('footerPenawarans.edit', $footerPenawaran->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('footerPenawarans.destroy', $footerPenawaran->id) }}" method="POST" style="display:inline;">
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
