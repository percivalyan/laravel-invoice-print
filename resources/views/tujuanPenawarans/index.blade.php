@extends('layouts.app')

@section('content')
    <h1>Tujuan Penawaran</h1>
    <a href="{{ route('tujuanPenawarans.create') }}">Create New Tujuan Penawaran</a>

    @if ($message = Session::get('success'))
        <div>{{ $message }}</div>
    @endif

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Project Penawaran ID</th>
                <th>Pengajuan</th>
                <th>Tujuan</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tujuanPenawarans as $tujuanPenawaran)
                <tr>
                    <td>{{ $tujuanPenawaran->id }}</td>
                    <td>{{ $tujuanPenawaran->project_penawaran_id }}</td>
                    <td>{{ $tujuanPenawaran->pengajuan }}</td>
                    <td>{{ $tujuanPenawaran->tujuan }}</td>
                    <td>
                        <a href="{{ route('tujuanPenawarans.show', $tujuanPenawaran->id) }}">Show</a>
                        <a href="{{ route('tujuanPenawarans.edit', $tujuanPenawaran->id) }}">Edit</a>
                        <form action="{{ route('tujuanPenawarans.destroy', $tujuanPenawaran->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
