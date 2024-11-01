@extends('backend.layouts.master')

@section('title')
    Surat Penawaran
@endsection

@section('admin-content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Buat Project Penawaran</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('projectPenawarans.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="kepada">Kepada</label>
                    <input type="text" name="kepada" class="form-control" id="kepada" value="{{ old('kepada') }}">
                    @error('kepada')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="nomor">Nomor</label>
                    <input type="text" name="nomor" class="form-control" id="nomor" value="{{ old('nomor') }}" readonly>
                    @error('nomor')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>                
                <div class="form-group">
                    <label for="tanggal">Tanggal</label>
                    <input type="date" name="tanggal" class="form-control" id="tanggal" value="{{ old('tanggal') }}">
                    @error('tanggal')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="proyek">Proyek</label>
                    <input type="text" name="proyek" class="form-control" id="proyek" value="{{ old('proyek') }}">
                    @error('proyek')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="lokasi">Lokasi</label>
                    <input type="text" name="lokasi" class="form-control" id="lokasi" value="{{ old('lokasi') }}">
                    @error('lokasi')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
                <a href="{{ route('projectPenawarans.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
