@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card shadow-sm">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h2 class="h5 mb-0">Tambah Bahan Pembelian</h2>
                        {{-- <a href="{{ route('bahanPembelians.index') }}" class="btn btn-secondary btn-sm">
                            <i class="fas fa-arrow-left mr-1"></i> Kembali ke PO
                        </a> --}}
                        <a href="{{ route('projectPembelians.index') }}" class="btn btn-secondary text-white mb-3">
                            Kembali ke PO
                        </a> 
                    </div>
                    <div class="card-body">

                        <!-- Display validation errors -->
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <h6><strong>Whoops! Ada beberapa masalah dengan inputan Anda:</strong></h6>
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <!-- Form for creating new Bahan Pembelian -->
                        <form action="{{ route('bahanPembelians.store') }}" method="POST">
                            @csrf

                            <!-- Hidden field for project_pembelian_id -->
                            <input type="hidden" name="project_pembelian_id" value="{{ $projectPembelianId }}">

                            <!-- Pembelian Input Field -->
                            <div class="form-group">
                                <label for="pembelian" class="form-label"><strong>Pembelian:</strong></label>
                                <input type="text" name="pembelian" id="pembelian" class="form-control" placeholder="Masukkan nama pembelian" required>
                            </div>

                            <!-- Submit Button -->
                            <div class="text-right">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save mr-1"></i> Simpan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
