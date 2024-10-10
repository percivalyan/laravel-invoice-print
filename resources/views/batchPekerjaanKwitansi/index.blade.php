@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Batch Pekerjaan Kwitansi</h1>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Search Form -->
    <form method="GET" action="{{ route('batchPekerjaanKwitansi.index') }}" class="mb-3">
        <div class="input-group">
            <input type="text" class="form-control" name="search" placeholder="Search Pekerjaan" value="{{ request('search') }}">
            <button class="btn btn-primary" type="submit">Search</button>
        </div>
    </form>

    <!-- Add New Button -->
    <a href="{{ route('batchPekerjaanKwitansi.create') }}" class="btn btn-success mb-3">Add New</a>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>Proyek</th>
                    <th>Pekerjaan Kwitansi</th>
                    <th>Batch dan Uraian Kwitansi</th> <!-- Combined column header -->
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $rowNumber = 1; // Counter for row numbers
                @endphp

                @forelse ($batchPekerjaanKwitansi->groupBy('pekerjaan_kwitansi_id') as $pekerjaanId => $items)
                    @php
                        $pekerjaan = $items->first()->pekerjaanKwitansi;
                    @endphp
                    <tr>
                        <td>{{ $rowNumber++ }}</td>
                        <td>{{ $pekerjaan->projectKwitansi->proyek }} - {{ $pekerjaan->projectKwitansi->nomor_invoice }}</td>
                        <td>{{ $pekerjaan->pekerjaan }}</td>
                        <td>
                            <ul class="list-unstyled">
                                @foreach ($items as $item)
                                    <li>
                                        <strong>{{ $item->batchKwitansi->nama_batch }}</strong>
                                        <ul>
                                            @foreach ($item->batchKwitansi->uraianKwitansis as $uraianKwitansi)
                                                <li>
                                                    <small>{{ $uraianKwitansi->nama_uraian }} - {{ $uraianKwitansi->jumlah_uraian }} {{ $uraianKwitansi->satuan_uraian }}</small>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                @endforeach
                            </ul>
                        </td>
                        <td>
                            <a href="{{ route('batchPekerjaanKwitansi.edit', $items->first()->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('batchPekerjaanKwitansi.destroy', $items->first()->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">No data available.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
