@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Footer Pembelians</h1>
    <a href="{{ route('footerPembelians.create') }}" class="btn btn-primary mb-3">Add New Footer Pembelian</a>
    
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Project Pembelian</th>
                <th>Diorder Oleh</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($footerPembelians as $footerPembelian)
                <tr>
                    <td>{{ $footerPembelian->id }}</td>
                    <td>{{ $footerPembelian->projectPembelian->project }}</td>
                    <td>{{ $footerPembelian->diorder_oleh }}</td>
                    <td>
                        <a href="{{ route('footerPembelians.show', $footerPembelian->id) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('footerPembelians.edit', $footerPembelian->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('footerPembelians.destroy', $footerPembelian->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
