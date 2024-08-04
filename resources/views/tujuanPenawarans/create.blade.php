@extends('layouts.app')

@section('content')
    <h1>Create Tujuan Penawaran</h1>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('tujuanPenawarans.store') }}" method="POST">
        @csrf

        <label for="project_penawaran_id">Project Penawaran:</label>
        <select name="project_penawaran_id" id="project_penawaran_id">
            @foreach ($projectPenawarans as $projectPenawaran)
                <option value="{{ $projectPenawaran->id }}">{{ $projectPenawaran->proyek }}</option>
            @endforeach
        </select>

        <label for="pengajuan">Pengajuan:</label>
        <input type="text" name="pengajuan" id="pengajuan" value="{{ old('pengajuan') }}">

        <label for="tujuan">Tujuan:</label>
        <input type="text" name="tujuan" id="tujuan" value="{{ old('tujuan') }}">

        <button type="submit">Create</button>
    </form>
@endsection
