@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Bahan Pembelian</h1>

        <form action="{{ route('bahanPembelians.store') }}" method="POST">
            @csrf

            <input type="hidden" name="project_pembelian_id" value="{{ $projectPembelianId }}">

            <div class="form-group">
                <label for="pembelian">Pembelian</label>
                <input type="text" name="pembelian" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
@endsection
