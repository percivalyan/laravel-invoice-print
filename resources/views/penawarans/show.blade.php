@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Penawaran Details</h1>
    
    <p><strong>Project:</strong> {{ $penawaran->projectPenawaran->name }}</p>
    <p><strong>Pekerjaan:</strong> {{ $penawaran->pekerjaan }}</p>
    <p><strong>Quantitas:</strong> {{ $penawaran->quantitas }}</p>
    <p><strong>Unit:</strong> {{ $penawaran->unit }}</p>
    <p><strong>Harga Satuan:</strong> {{ $penawaran->harga_satuan }}</p>
    <p><strong>Jenis Penawaran:</strong></p>
    <ul>
        @foreach($penawaran->jenisPenawarans as $jenis)
            <li>{{ $jenis->jenis_pekerjaan }}</li>
        @endforeach
    </ul>
    
    <a href="{{ route('penawarans.edit', $penawaran) }}" class="btn btn-warning">Edit</a>
    <form action="{{ route('penawarans.destroy', $penawaran) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
    <a href="{{ route('penawarans.index') }}" class="btn btn-secondary">Back to List</a>
</div>
@endsection
