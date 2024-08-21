@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h2>Bahan Pembelian</h2>
            {{-- <a class="btn btn-success mb-3" href="{{ route('bahanPembelians.create') }}">Tambah Bahan Pembelian</a> --}}

            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
            
            <p><strong>Project Pembelian ID:</strong> {{ $projectPembelianId }}</p>

            <a class="btn btn-success mb-3" href="{{ route('bahanPembelians.create', ['project_pembelian_id' => $projectPembelianId]) }}">Tambah Bahan</a>

            <table class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <th>Project Pembelian</th>
                    <th>Pembelian</th>
                    <th>Action</th>
                </tr>
                @foreach ($bahanPembelians as $bahanPembelian)
                    <tr>
                        <td>{{ $bahanPembelian->id }}</td>
                        <td>{{ $bahanPembelian->projectPembelian->project }}</td>
                        <td>{{ $bahanPembelian->pembelian }}</td>
                        <td>
                            <a class="btn btn-info" href="{{ route('bahanPembelians.show', $bahanPembelian->id) }}">Show</a>
                            <a class="btn btn-primary" href="{{ route('bahanPembelians.edit', $bahanPembelian->id) }}">Edit</a>
                            <form action="{{ route('bahanPembelians.destroy', $bahanPembelian->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                            <!-- Tombol Menuju ke pembelians.index dengan bahan_pembelian_id -->
                            <a class="btn btn-secondary" href="{{ route('pembelians.index', ['bahan_pembelian_id' => $bahanPembelian->id]) }}">Ke Pembelians</a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection
