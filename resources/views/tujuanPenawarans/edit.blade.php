@extends('layouts.app')

@section('content')
    <h1>Edit Tujuan Penawaran</h1>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('tujuanPenawarans.update', $tujuanPenawaran->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="project_penawaran_id">Project Penawaran:</label>
        <select name="project_penawaran_id" id="project_penawaran_id">
            @foreach ($projectPenawarans as $projectPenawaran)
                <option value="{{ $projectPenawaran->id }}" {{ $tujuanPenawaran->project_penawaran_id == $projectPenawaran->id ? 'selected' : '' }}>
                    {{ $projectPenawaran->proyek }}
                </option>
            @endforeach
        </select>

        <label for="pengajuan">Pengajuan:</label>
        <input type="text" name="pengajuan" id="pengajuan" value="{{ old('pengajuan', $tujuanPenawaran->pengajuan) }}">

        <label for="tujuan">Tujuan:</label>
        <input type="text" name="tujuan" id="tujuan" value="{{ old('tujuan', $tujuanPenawaran->tujuan) }}">

        <button type="submit">Update</button>
    </form>

    <a href="{{ route('tujuanPenawarans.index') }}">Back to List</a>
@endsection
