@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Uraian Jenis Pekerjaan Penawaran</h1>
        <a href="{{ route('uraianJenisPekerjaanPenawarans.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50"></i> Uraian Penawaran Baru
        </a>
    </div>
    
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Uraian Jenis Pekerjaan</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Jenis Penawaran</th>
                            <th>Uraian</th>
                            <th>Jenis Pekerjaan</th>
                            <th>Quantitas</th>
                            <th>Unit</th>
                            <th>Harga Satuan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($uraianJenisPekerjaanPenawarans as $uraian)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $uraian->jenisPenawaran->jenis_pekerjaan }}</td>
                                <td>{{ $uraian->uraian }}</td>
                                <td>{{ $uraian->jenis_pekerjaan }}</td>
                                <td>{{ $uraian->quantitas }}</td>
                                <td>{{ $uraian->unit }}</td>
                                <td>{{ $uraian->harga_satuan }}</td>
                                <td>
                                    <a href="{{ route('uraianJenisPekerjaanPenawarans.show', $uraian->id) }}" class="btn btn-info btn-sm">Lihat</a>
                                    <a href="{{ route('uraianJenisPekerjaanPenawarans.edit', $uraian->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('uraianJenisPekerjaanPenawarans.destroy', $uraian->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin?')">Hapus</button>
                                    </form>
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
