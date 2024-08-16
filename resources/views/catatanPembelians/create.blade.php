@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tambah Catatan Pembelian</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('catatanPembelians.store') }}" method="POST">
        @csrf
        {{-- <div class="form-group">
            <label for="project_pembelian_id">Proyek Pembelian</label>
            <select name="project_pembelian_id" id="project_pembelian_id" class="form-control">
                @foreach($projectPembelians as $project)
                    <option value="{{ $project->id }}">{{ $project->nama_proyek }}</option>
                @endforeach
            </select>
        </div> --}}
        <h5>{{ $projectPembelian->nomor_po }} - {{ $projectPembelian->project }} - {{ $projectPembelian->tanggal_order }}</h5>
        <input type="hidden" name="project_pembelian_id" value="{{ $projectPembelian->id }}">

        <div class="form-group">
            <label for="waktu_pengiriman">Waktu Pengiriman</label>
            <input type="date" name="waktu_pengiriman" id="waktu_pengiriman" class="form-control" value="{{ old('waktu_pengiriman') }}">
        </div>

        <div class="form-group">
            <label for="alamat_pengiriman">Alamat Pengiriman</label>
            <input type="text" name="alamat_pengiriman" id="alamat_pengiriman" class="form-control" value="{{ old('alamat_pengiriman') }}">
        </div>

        <div class="form-group">
            <label for="contact_person">Contact Person</label>
            <input type="text" name="contact_person" id="contact_person" class="form-control" value="{{ old('contact_person') }}">
        </div>

        <div class="form-group">
            <label for="pembayaran">Pembayaran</label>
            <input type="text" name="pembayaran" id="pembayaran" class="form-control" value="{{ old('pembayaran') }}">
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
