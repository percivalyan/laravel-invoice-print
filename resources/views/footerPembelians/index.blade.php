@extends('backend.layouts.master')

@section('title')
    Pembelian List
@endsection

@section('admin-content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Daftar Footer Pembelian</h1>
        <a href="{{ route('projectPembelians.index') }}" class="btn btn-secondary text-white mb-3">
            Kembali ke PO
        </a>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="row">
            @foreach ($footerPembelians as $footerPembelian)
                <div class="col-lg-12 col-md-12 mb-4">
                    <div class="card shadow h-100 py-2">
                        <div class="card-body">
                            <h5 class="card-title">ID: {{ $footerPembelian->id }}</h5>
                            <h5 class="card-title mb-4">
                                {{ $footerPembelian->projectPembelian->nomor_po }} -
                                {{ $footerPembelian->projectPembelian->project }} -
                                {{ $footerPembelian->projectPembelian->tanggal_order }}
                            </h5>
                            <h6 class="card-subtitle mb-2 text-muted">Project Pembelian</h6>
                            <p class="card-text">{{ $footerPembelian->projectPembelian->project }}</p>
                            <h6 class="card-subtitle mb-2 text-muted">Diorder Oleh</h6>
                            <p class="card-text">{{ $footerPembelian->diorder_oleh }}</p>
                            <div class="mt-3">
                                <a href="{{ route('footerPembelians.edit', $footerPembelian->id) }}"
                                    class="btn btn-warning btn-sm">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('footerPembelians.destroy', $footerPembelian->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Anda yakin ingin menghapus footer pembelian ini?');">
                                        <i class="fas fa-trash"></i> Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
