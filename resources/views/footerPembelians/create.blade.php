@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Create Footer Pembelian</h1>

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
                <form action="{{ route('footerPembelians.store') }}" method="POST">
                    @csrf

                    <h5 class="mb-4">{{ $projectPembelian->nomor_po }} - {{ $projectPembelian->project }} -
                        {{ $projectPembelian->tanggal_order }}</h5>
                    <input type="hidden" name="project_pembelian_id" value="{{ $projectPembelian->id }}">

                    <div class="form-group">
                        <label for="diorder_oleh">Diorder Oleh</label>
                        <input type="text" id="diorder_oleh" name="diorder_oleh" class="form-control"
                            value="{{ old('diorder_oleh') }}" required>
                    </div>

                    <div class="form-group">
                        <label for="diorder_oleh_jabatan">Diorder Oleh Jabatan</label>
                        <input type="text" id="diorder_oleh_jabatan" name="diorder_oleh_jabatan" class="form-control"
                            value="{{ old('diorder_oleh_jabatan') }}" required>
                    </div>

                    <div class="form-group">
                        <label for="disetujui_oleh">Disetujui Oleh</label>
                        <input type="text" id="disetujui_oleh" name="disetujui_oleh" class="form-control"
                            value="{{ old('disetujui_oleh') }}" required>
                    </div>

                    <div class="form-group">
                        <label for="disetujui_oleh_jabatan">Disetujui Oleh Jabatan</label>
                        <input type="text" id="disetujui_oleh_jabatan" name="disetujui_oleh_jabatan" class="form-control"
                            value="{{ old('disetujui_oleh_jabatan') }}" required>
                    </div>

                    <div class="form-group">
                        <label for="order_diterima_oleh">Order Diterima Oleh</label>
                        <input type="text" id="order_diterima_oleh" name="order_diterima_oleh" class="form-control"
                            value="{{ old('order_diterima_oleh') }}" required>
                    </div>

                    <div class="form-group">
                        <label for="order_diterima_oleh_jabatan">Order Diterima Oleh Jabatan</label>
                        <input type="text" id="order_diterima_oleh_jabatan" name="order_diterima_oleh_jabatan"
                            class="form-control" value="{{ old('order_diterima_oleh_jabatan') }}" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Save</button>
                    <a href="{{ route('projectPembelians.index') }}" class="btn btn-secondary text-white">
                        Kembali ke PO
                    </a>
                </form>
            </div>
        </div>
    </div>
@endsection
