@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Bahan Pembelian</h1>

    <form action="{{ route('bahanPembelians.update', $bahanPembelian->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="project_pembelian_id">Project Pembelian ID</label>
            <input type="number" name="project_pembelian_id" id="project_pembelian_id" class="form-control" value="{{ $bahanPembelian->project_pembelian_id }}" required>
        </div>
        <div class="form-group">
            <label for="pembelian">Pembelian</label>
            <input type="text" name="pembelian" id="pembelian" class="form-control" value="{{ $bahanPembelian->pembelian }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
