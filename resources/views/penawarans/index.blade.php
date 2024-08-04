<!-- resources/views/penawarans/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Penawaran</h1>
    <a href="{{ route('penawarans.create') }}" class="btn btn-primary mb-3">Create New Penawaran</a>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th>Project Penawaran</th>
                <th>Uraian</th>
                <th>Qty</th>
                <th>Unit</th>
                <th>Harga Satuan</th>
                <th>Jumlah</th>
                <th>Total</th>
                <th>Terbilang</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($penawarans as $penawaran)
                <tr>
                    <td>{{ $penawaran->projectPenawaran->proyek ?? 'N/A' }}</td>
                    <td>{{ $penawaran->uraian }}</td>
                    <td>{{ $penawaran->qty }}</td>
                    <td>{{ $penawaran->unit }}</td>
                    <td>{{ $penawaran->harga_satuan }}</td>
                    <td>{{ $penawaran->jumlah }}</td>
                    <td>{{ $penawaran->total }}</td>
                    <td>{{ $penawaran->terbilang }}</td>
                    <td>
                        <a href="{{ route('penawarans.show', $penawaran->id) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('penawarans.edit', $penawaran->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('penawarans.destroy', $penawaran->id) }}" method="POST" style="display:inline;">
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
