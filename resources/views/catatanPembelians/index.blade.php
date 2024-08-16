@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Daftar Catatan Pembelian</h1>
    <a href="{{ route('catatanPembelians.create') }}" class="btn btn-primary mb-3">Tambah Catatan Pembelian</a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Proyek Pembelian</th>
                <th>Waktu Pengiriman</th>
                <th>Alamat Pengiriman</th>
                <th>Contact Person</th>
                <th>Pembayaran</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($catatanPembelians as $catatan)
                <tr>
                    <td>{{ $catatan->id }}</td>
                    <td>{{ $catatan->projectPembelian->project ?? '-' }}</td>
                    <td>{{ $catatan->waktu_pengiriman }}</td>
                    <td>{{ $catatan->alamat_pengiriman }}</td>
                    <td>{{ $catatan->contact_person }}</td>
                    <td>{{ $catatan->pembayaran }}</td>
                    <td>
                        <a href="{{ route('catatanPembelians.show', $catatan->id) }}" class="btn btn-info btn-sm">Lihat</a>
                        <a href="{{ route('catatanPembelians.edit', $catatan->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('catatanPembelians.destroy', $catatan->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus catatan pembelian ini?');">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
