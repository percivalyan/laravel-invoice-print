@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Bahan Pembelian</h1>

    <form action="{{ route('bahanPembelians.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="project_pembelian_id">Project Pembelian ID</label>
            <input type="number" name="project_pembelian_id" id="project_pembelian_id" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="pembelian">Pembelian</label>
            <input type="text" name="pembelian" id="pembelian" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection
