@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Project Penawaran</h1>
        <div>
            <a href="{{ route('projectPenawarans.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-plus fa-sm text-white-50"></i> Projek SP Baru
            </a>
            {{-- <a href="{{ route('penawarans.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">
                <i class="fas fa-plus fa-sm text-white-50"></i> Membuat Penawaran
            </a>
            <a href="{{ route('jenisPenawarans.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm">
                <i class="fas fa-plus fa-sm text-white-50"></i> Membuat Jenis Penawaran
            </a>
            <a href="{{ route('uraianJenisPekerjaanPenawarans.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm">
                <i class="fas fa-plus fa-sm text-white-50"></i> Membuat Uraian Penawaran
            </a> --}}
        </div>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Project Penawaran</h6>
        </div>
        <div class="card-body">
            <!-- Desktop View -->
            <div class="table-responsive d-none d-md-block">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Kepada</th>
                            <th>Nomor</th>
                            <th>Tanggal</th>
                            <th>Proyek</th>
                            <th>Lokasi</th>
                            <th>Actions</th>
                            <th>Surat Penawaran</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($projectPenawarans as $projectPenawaran)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
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
                                    <a href="{{ route('tujuanPenawarans.create', ['project_penawaran_id' => $projectPenawaran->id]) }}" class="btn btn-success btn-sm">Keterangan SP</a>
                                    <a href="{{ route('footerPenawarans.create', ['project_penawaran_id' => $projectPenawaran->id]) }}" class="btn btn-primary btn-sm">Penanggungjawab</a>
                                </td>
                                <td>
                                    {{-- Langsung masuk create dengan id dari projectPenawarans --}}
                                    <a href="{{ route('penawarans.create', ['project_penawaran_id' => $projectPenawaran->id]) }}" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm">
                                        <i class="fas fa-plus fa-sm text-white-50"></i> Membuat Penawaran
                                    </a>                                    
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
