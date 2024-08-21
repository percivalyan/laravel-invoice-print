@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Edit Project Pembelian</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('projectPembelians.update', $projectPembelian->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="nomor_po">Nomor PO:</label>
                    <input type="text" name="nomor_po" class="form-control" value="{{ $projectPembelian->nomor_po }}">
                </div>
                <div class="form-group">
                    <label for="project">Project:</label>
                    <input type="text" name="project" class="form-control" value="{{ $projectPembelian->project }}">
                </div>
                <div class="form-group">
                    <label for="tanggal_order">Tanggal Order:</label>
                    <input type="date" name="tanggal_order" class="form-control" value="{{ $projectPembelian->tanggal_order }}">
                </div>
                <div class="form-group">
                    <label for="metode_pembayaran">Metode Pembayaran:</label>
                    <input type="text" name="metode_pembayaran" class="form-control" value="{{ $projectPembelian->metode_pembayaran }}">
                </div>
                <div class="form-group">
                    <label for="po_ditunjukan_kepada">PO Ditunjukan Kepada:</label>
                    <input type="text" name="po_ditunjukan_kepada" class="form-control" value="{{ $projectPembelian->po_ditunjukan_kepada }}">
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat:</label>
                    <input type="text" name="alamat" class="form-control" value="{{ $projectPembelian->alamat }}">
                </div>
                <div class="form-group">
                    <label for="kontak">Kontak:</label>
                    <input type="text" name="kontak" class="form-control" value="{{ $projectPembelian->kontak }}">
                </div>
                <div class="form-group">
                    <label for="email_mobile_number">Email/Mobile Number:</label>
                    <input type="text" name="email_mobile_number" class="form-control" value="{{ $projectPembelian->email_mobile_number }}">
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection
