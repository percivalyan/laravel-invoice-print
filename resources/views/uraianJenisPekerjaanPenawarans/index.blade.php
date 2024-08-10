@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Uraian Jenis Pekerjaan Penawaran</h1>
    <a href="{{ route('uraianJenisPekerjaanPenawarans.create') }}" class="btn btn-primary mb-3">Tambah Uraian Jenis Pekerjaan</a>
    <table class="table table-bordered">
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
@endsection
