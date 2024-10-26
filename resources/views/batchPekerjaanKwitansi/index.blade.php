@extends('backend.layouts.master')

@section('title')
    SP/INV/BAST
@endsection

@section('admin-content')
<div class="container-fluid">
    <!-- Page Title Area -->
    <div class="page-title-area">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <h4 class="page-title">Batch Pekerjaan Kwitansi</h4>
            </div>
            <div class="col-sm-6 clearfix">
                @include('backend.layouts.partials.logout')
            </div>
        </div>
    </div>
    <!-- End Page Title Area -->

    <!-- Success Message -->
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <!-- Search Form -->
    <form method="GET" action="{{ route('batchPekerjaanKwitansi.index') }}" class="mb-3 py-3">
        <div class="input-group">
            <input type="text" class="form-control" name="search" placeholder="Search Pekerjaan" value="{{ request('search') }}">
            <button class="btn btn-primary" type="submit">Search</button>
        </div>
    </form>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Batch Pekerjaan Kwitansi</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Proyek</th>
                            <th>Pekerjaan Kwitansi</th>
                            <th>Batch dan Uraian Kwitansi</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $rowNumber = 1; // Counter for row numbers
                            $lastProject = null; // To store the last project
                        @endphp

                        @forelse ($batchPekerjaanKwitansi->groupBy('pekerjaan_kwitansi_id') as $pekerjaanId => $items)
                            @php
                                $pekerjaan = $items->first()->pekerjaanKwitansi;
                                $currentProject = $pekerjaan->projectKwitansi;
                                $projectLink = route('projectKwitansis.index', ['id' => $currentProject->id]); // Assuming the route accepts an ID
                            @endphp
                            @if ($currentProject !== $lastProject)
                                <tr>
                                    <td>{{ $rowNumber++ }}</td>
                                    <td><a href="{{ $projectLink }}">{{ $currentProject->proyek . ' - ' . $currentProject->nomor_invoice }}</a></td>
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
                            @else
                                <tr>
                                    <td>{{ $rowNumber++ }}</td>
                                    <td></td> <!-- Leave this cell empty if project is the same -->
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
                            @endif

                            @php
                                $lastProject = $currentProject; // Update last project
                            @endphp
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">No data available.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Pagination -->
    {{ $batchPekerjaanKwitansi->links() }}
</div>
@endsection
