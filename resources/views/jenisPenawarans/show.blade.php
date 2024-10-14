@extends('backend.layouts.master')

@section('title')
    Surat Penawaran Pages
@endsection

@section('admin-content')
<div class="container">
    <h1>Jenis Penawaran Details</h1>
    
    <p><strong>Jenis Pekerjaan:</strong> {{ $jenisPenawaran->jenis_pekerjaan }}</p>
    <p><strong>Quantitas:</strong> {{ $jenisPenawaran->quantitas }}</p>
    <p><strong>Unit:</strong> {{ $jenisPenawaran->unit }}</p>
    <p><strong>Harga Satuan:</strong> {{ $jenisPenawaran->harga_satuan }}</p>

    <h3>Uraian Details:</h3>
    @if($uraianJenisPekerjaanPenawarans->isEmpty())
        <p>No Uraian found for this Jenis Penawaran.</p>
    @else
        <ul>
            @foreach($uraianJenisPekerjaanPenawarans as $uraian)
                <li>
                    <strong>Uraian:</strong> {{ $uraian->uraian }} <br>
                    <strong>Jenis Pekerjaan:</strong> {{ $uraian->jenis_pekerjaan }} <br>
                    <strong>Quantitas:</strong> {{ $uraian->quantitas }} <br>
                    <strong>Unit:</strong> {{ $uraian->unit }} <br>
                    <strong>Harga Satuan:</strong> {{ $uraian->harga_satuan }} <br>
                </li>
            @endforeach
        </ul>
    @endif

    <a href="{{ route('jenisPenawarans.edit', $jenisPenawaran) }}" class="btn btn-warning">Edit</a>
    <form action="{{ route('jenisPenawarans.destroy', $jenisPenawaran) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
    <a href="{{ route('jenisPenawarans.index') }}" class="btn btn-secondary">Back to List</a>
</div>
@endsection
