@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3 mb-0 text-gray-800">Daftar Project Kwitansi</h1>
            <a href="{{ route('projectKwitansis.create') }}" class="btn btn-primary">Tambah Project Kwitansi</a>
        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                {{ $message }}
            </div>
        @endif

        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Client</th>
                                <th>Proyek</th>
                                <th>Reff PO No</th>
                                <th>Nomor Surat Jalan</th>
                                <th>Nomor Invoice</th>
                                <th>Nomor BAST</th>
                                <th>Lokasi</th>
                                <th>Surat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($projectKwitansis as $projectKwitansi)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $projectKwitansi->kepada_yth }}</td>
                                    <td>{{ $projectKwitansi->proyek }}</td>
                                    <td>{{ $projectKwitansi->projectPembelian ? $projectKwitansi->projectPembelian->nomor_po : 'N/A' }}
                                    </td>
                                    <td>{{ $projectKwitansi->nomor_surat_jalan }}</td>
                                    <td>{{ $projectKwitansi->nomor_invoice }}</td>
                                    <td>{{ $projectKwitansi->nomor_bast }}</td>
                                    <td>{{ $projectKwitansi->lokasi }}</td>
                                    <td class="text-center">
                                        <ul class="list-unstyled mb-0">
                                            <li class="mb-2">
                                                <a href="{{ route('projectKwitansis.show', $projectKwitansi->id) }}"
                                                    class="btn btn-info btn-sm">Surat Jalan</a>
                                            </li>
                                            <li class="mb-2">
                                                <a href="{{ route('projectKwitansis.showinvoice', $projectKwitansi->id) }}"
                                                    class="btn btn-info btn-sm">Invoice</a>
                                            </li>
                                            <li class="mb-2">
                                                <a href="{{ route('projectKwitansis.showbast', $projectKwitansi->id) }}"
                                                    class="btn btn-info btn-sm">BAST</a>
                                            </li>
                                        </ul>
                                    </td>
                                    <td class="text-center">
                                        <ul class="list-unstyled mb-0">
                                            <li class="mb-2">
                                                <a href="{{ route('projectKwitansis.edit', $projectKwitansi->id) }}"
                                                    class="btn btn-warning btn-sm">Edit</a>
                                            </li>
                                            <li>
                                                <form
                                                    action="{{ route('projectKwitansis.destroy', $projectKwitansi->id) }}"
                                                    method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"
                                                        onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                                                </form>
                                            </li>
                                        </ul>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
