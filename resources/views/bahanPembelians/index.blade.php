@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Bahan Pembelian List</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Menampilkan pembelian_id dengan h3 -->
        <h3>Pembelian ID: {{ request()->pembelian_id }}</h3>

        <a href="{{ route('bahanPembelians.create', ['pembelian_id' => request()->pembelian_id]) }}"
            class="btn btn-primary">Add New Bahan Pembelian</a>

        <table class="table mt-4">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Project Pembelian ID</th>
                    <th>Pembelian</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bahanPembelians as $bahanPembelian)
                    <tr>
                        <td>{{ $bahanPembelian->id }}</td>
                        <td>{{ $bahanPembelian->project_pembelian_id }}</td>
                        <td>{{ $bahanPembelian->pembelian }}</td>
                        <td>
                            <a href="{{ route('bahanPembelians.show', ['bahanPembelian' => $bahanPembelian->id, 'pembelian_id' => request()->pembelian_id]) }}"
                                class="btn btn-info btn-sm">View</a>

                            <a href="{{ route('bahanPembelians.edit', ['bahanPembelian' => $bahanPembelian->id, 'pembelian_id' => request()->pembelian_id]) }}"
                                class="btn btn-warning btn-sm">Edit</a>

                            <form
                                action="{{ route('bahanPembelians.destroy', ['bahanPembelian' => $bahanPembelian->id, 'pembelian_id' => request()->pembelian_id]) }}"
                                method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
