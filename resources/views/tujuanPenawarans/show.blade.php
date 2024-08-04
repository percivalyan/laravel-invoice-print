@extends('layouts.app')

@section('content')
    <h1>Tujuan Penawaran Details</h1>

    <div>
        <strong>ID:</strong> {{ $tujuanPenawaran->id }}
    </div>
    <div>
        <strong>Project Penawaran ID:</strong> {{ $tujuanPenawaran->project_penawaran_id }}
    </div>
    <div>
        <strong>Pengajuan:</strong> {{ $tujuanPenawaran->pengajuan }}
    </div>
    <div>
        <strong>Tujuan:</strong> {{ $tujuanPenawaran->tujuan }}
    </div>

    <a href="{{ route('tujuanPenawarans.edit', $tujuanPenawaran->id) }}">Edit</a>
    <form action="{{ route('tujuanPenawarans.destroy', $tujuanPenawaran->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>

    <a href="{{ route('tujuanPenawarans.index') }}">Back to List</a>
@endsection
