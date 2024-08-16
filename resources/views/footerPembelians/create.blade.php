@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Footer Pembelian</h1>
    
    <form action="{{ route('footerPembelians.store') }}" method="POST">
        @csrf
        
        {{-- <div class="form-group">
            <label for="project_pembelian_id">Project Pembelian</label>
            <select id="project_pembelian_id" name="project_pembelian_id" class="form-control" required>
                <option value="">Select Project Pembelian</option>
                <option value="{{ $projectPembelian->id }}" selected>{{ $projectPembelian->name }}</option>
            </select>
        </div> --}}

        <h5>{{ $projectPembelian->nomor_po }} - {{ $projectPembelian->project }} - {{ $projectPembelian->tanggal_order }}</h5>
        <input type="hidden" name="project_pembelian_id" value="{{ $projectPembelian->id }}">
        
        <div class="form-group">
            <label for="diorder_oleh">Diorder Oleh</label>
            <input type="text" id="diorder_oleh" name="diorder_oleh" class="form-control" value="{{ old('diorder_oleh') }}">
        </div>
        
        <div class="form-group">
            <label for="diorder_oleh_jabatan">Diorder Oleh Jabatan</label>
            <input type="text" id="diorder_oleh_jabatan" name="diorder_oleh_jabatan" class="form-control" value="{{ old('diorder_oleh_jabatan') }}">
        </div>
        
        <div class="form-group">
            <label for="disetujui_oleh">Disetujui Oleh</label>
            <input type="text" id="disetujui_oleh" name="disetujui_oleh" class="form-control" value="{{ old('disetujui_oleh') }}">
        </div>
        
        <div class="form-group">
            <label for="disetujui_oleh_jabatan">Disetujui Oleh Jabatan</label>
            <input type="text" id="disetujui_oleh_jabatan" name="disetujui_oleh_jabatan" class="form-control" value="{{ old('disetujui_oleh_jabatan') }}">
        </div>
        
        <div class="form-group">
            <label for="order_diterima_oleh">Order Diterima Oleh</label>
            <input type="text" id="order_diterima_oleh" name="order_diterima_oleh" class="form-control" value="{{ old('order_diterima_oleh') }}">
        </div>
        
        <div class="form-group">
            <label for="order_diterima_oleh_jabatan">Order Diterima Oleh Jabatan</label>
            <input type="text" id="order_diterima_oleh_jabatan" name="order_diterima_oleh_jabatan" class="form-control" value="{{ old('order_diterima_oleh_jabatan') }}">
        </div>
        
        <button type="submit" class="btn btn-primary">Save</button>
        <a href="{{ route('footerPembelians.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
