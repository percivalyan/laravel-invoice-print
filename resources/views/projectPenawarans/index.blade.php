<!-- resources/views/projectPenawarans/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Project Penawaran</h1>
    <a href="{{ route('projectPenawarans.create') }}" class="btn btn-primary mb-3">Create New Project Penawaran</a>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>Kepada</th>
                <th>Nomor</th>
                <th>Tanggal</th>
                <th>Proyek</th>
                <th>Lokasi</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($projectPenawarans as $projectPenawaran)
                <tr>
                    <td>{{ $projectPenawaran->kepada }}</td>
                    <td>{{ $projectPenawaran->nomor }}</td>
                    <td>{{ $projectPenawaran->tanggal }}</td>
                    <td>{{ $projectPenawaran->proyek }}</td>
                    <td>{{ $projectPenawaran->lokasi }}</td>
                    <td>
                        <a href="{{ route('projectPenawarans.edit', $projectPenawaran->id) }}" class="btn btn-warning btn-sm">Ubah Data Projek</a>
                        <a href="{{ route('projectPenawarans.show', $projectPenawaran->id) }}" class="btn btn-info btn-sm">Lihat Surat Penawaran</a>
                        <form action="{{ route('projectPenawarans.destroy', $projectPenawaran->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                        <a href="{{ route('tujuanPenawarans.create', ['project_penawaran_id' => $projectPenawaran->id]) }}" class="btn btn-success btn-sm">Keterangan Surat Penawaran</a>
                        <a href="{{ route('footerPenawarans.create', ['project_penawaran_id' => $projectPenawaran->id]) }}" class="btn btn-primary btn-sm">Penanggungjawab</a>
                    </td>
                    
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
