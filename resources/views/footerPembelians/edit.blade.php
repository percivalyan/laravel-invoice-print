@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Edit Footer Pembelian</h1>
    
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
            <form action="{{ route('footerPembelians.update', $footerPembelian->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="form-group">
                    <label for="project_pembelian_id">Project Pembelian</label>
                    <select id="project_pembelian_id" name="project_pembelian_id" class="form-control" required>
                        @foreach ($projectPembelians as $project)
                            <option value="{{ $project->id }}" {{ $project->id == $footerPembelian->project_pembelian_id ? 'selected' : '' }}>
                                {{ $project->project }}
                            </option>
                        @endforeach
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="diorder_oleh">Diorder Oleh</label>
                    <input type="text" id="diorder_oleh" name="diorder_oleh" class="form-control" value="{{ old('diorder_oleh', $footerPembelian->diorder_oleh) }}">
                </div>
                
                <div class="form-group">
                    <label for="diorder_oleh_jabatan">Diorder Oleh Jabatan</label>
                    <input type="text" id="diorder_oleh_jabatan" name="diorder_oleh_jabatan" class="form-control" value="{{ old('diorder_oleh_jabatan', $footerPembelian->diorder_oleh_jabatan) }}">
                </div>
                
                <div class="form-group">
                    <label for="disetujui_oleh">Disetujui Oleh</label>
                    <input type="text" id="disetujui_oleh" name="disetujui_oleh" class="form-control" value="{{ old('disetujui_oleh', $footerPembelian->disetujui_oleh) }}">
                </div>
                
                <div class="form-group">
                    <label for="disetujui_oleh_jabatan">Disetujui Oleh Jabatan</label>
                    <input type="text" id="disetujui_oleh_jabatan" name="disetujui_oleh_jabatan" class="form-control" value="{{ old('disetujui_oleh_jabatan', $footerPembelian->disetujui_oleh_jabatan) }}">
                </div>
                
                <div class="form-group">
                    <label for="order_diterima_oleh">Order Diterima Oleh</label>
                    <input type="text" id="order_diterima_oleh" name="order_diterima_oleh" class="form-control" value="{{ old('order_diterima_oleh', $footerPembelian->order_diterima_oleh) }}">
                </div>
                
                <div class="form-group">
                    <label for="order_diterima_oleh_jabatan">Order Diterima Oleh Jabatan</label>
                    <input type="text" id="order_diterima_oleh_jabatan" name="order_diterima_oleh_jabatan" class="form-control" value="{{ old('order_diterima_oleh_jabatan', $footerPembelian->order_diterima_oleh_jabatan) }}">
                </div>
                
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('footerPembelians.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
