@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Jenis Penawaran Details</h1>
    
    <p><strong>Jenis Pekerjaan:</strong> {{ $jenisPenawaran->jenis_pekerjaan }}</p>
    <p><strong>Quantitas:</strong> {{ $jenisPenawaran->quantitas }}</p>
    <p><strong>Unit:</strong> {{ $jenisPenawaran->unit }}</p>
    <p><strong>Harga Satuan:</strong> {{ $jenisPenawaran->harga_satuan }}</p>
    
    <a href="{{ route('jenisPenawarans.edit', $jenisPenawaran) }}" class="btn btn-warning">Edit</a>
    <form action="{{ route('jenisPenawarans.destroy', $jenisPenawaran) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
    <a href="{{ route('jenisPenawarans.index') }}" class="btn btn-secondary">Back to List</a>
</div>
@endsection
