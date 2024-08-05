{{-- @extends('layouts.app')

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
@endsection --}}

<!-- resources/views/footerPenawarans/create.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Penanggungjawab</h1>
    <form action="{{ route('footerPenawarans.store') }}" method="POST">
        @csrf
        <input type="hidden" name="project_penawaran_id" value="{{ $projectPenawaran->id }}">
        <!-- other fields... -->
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama') }}">
        </div>
        <div class="form-group">
            <label for="jabatan">Jabatan</label>
            <input type="text" class="form-control" id="jabatan" name="jabatan" value="{{ old('jabatan') }}">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection

