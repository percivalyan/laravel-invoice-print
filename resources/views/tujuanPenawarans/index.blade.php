<!-- resources/views/tujuanPenawarans/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tujuan Penawaran</h1>
    <a href="{{ route('tujuanPenawarans.create') }}" class="btn btn-primary mb-3">Create New Tujuan Penawaran</a>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>Project Penawaran</th>
                <th>Pengajuan</th>
                <th>Tujuan</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tujuanPenawarans as $tujuanPenawaran)
                <tr>
                    <td>{{ $tujuanPenawaran->projectPenawaran->proyek }} - {{ $tujuanPenawaran->projectPenawaran->nomor }}</td>
                    <td>{{ $tujuanPenawaran->pengajuan }}</td>
                    <td>{{ $tujuanPenawaran->tujuan }}</td>
                    <td>
                        <a href="{{ route('tujuanPenawarans.show', $tujuanPenawaran->id) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('tujuanPenawarans.edit', $tujuanPenawaran->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('tujuanPenawarans.destroy', $tujuanPenawaran->id) }}" method="POST" style="display:inline;">
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
