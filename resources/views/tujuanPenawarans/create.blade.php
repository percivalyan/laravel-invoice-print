@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Create Tujuan Penawaran</h1>
    </div>

    <!-- Form Card -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Create Tujuan Penawaran</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('tujuanPenawarans.store') }}" method="POST">
                @csrf
                <input type="hidden" name="project_penawaran_id" value="{{ $projectPenawaran->id }}">
                <div class="form-group">
                    <label for="pengajuan">Pengajuan</label>
                    <input type="text" class="form-control" id="pengajuan" name="pengajuan" value="{{ old('pengajuan') }}">
                </div>
                <div class="form-group">
                    <label for="tujuan">Tujuan</label>
                    <input type="text" class="form-control" id="tujuan" name="tujuan" value="{{ old('tujuan') }}">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
