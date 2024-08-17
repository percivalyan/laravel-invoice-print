@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Bahan Pembelian</h1>

        <form action="{{ route('bahanPembelians.update', $bahanPembelian->id) }}" method="POST">
            @csrf
            @method('PUT')

            <input type="hidden" name="project_pembelian_id" value="{{ $bahanPembelian->project_pembelian_id }}">

            <div class="form-group">
                <label for="pembelian">Pembelian</label>
                <input type="text" name="pembelian" class="form-control" value="{{ $bahanPembelian->pembelian }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
