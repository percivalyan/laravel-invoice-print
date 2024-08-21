@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Project Pembelians</h1>
        <a href="{{ route('projectPembelians.create') }}" class="btn btn-primary mb-3">Create Project Pembelian</a>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nomor PO</th>
                    <th>Project</th>
                    <th>Tanggal Order</th>
                    <th>Metode Pembayaran</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projectPembelians as $projectPembelian)
                    <tr>
                        <td>{{ $projectPembelian->nomor_po }}</td>
                        <td>{{ $projectPembelian->project }}</td>
                        <td>{{ $projectPembelian->tanggal_order }}</td>
                        <td>{{ $projectPembelian->metode_pembayaran }}</td>
                        <td>
                            <a href="{{ route('projectPembelians.show', $projectPembelian->id) }}"
                                class="btn btn-info">Show</a>
                            <a href="{{ route('projectPembelians.edit', $projectPembelian->id) }}"
                                class="btn btn-warning">Edit</a>
                            <form action="{{ route('projectPembelians.destroy', $projectPembelian->id) }}" method="POST"
                                style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                            <a href="{{ route('catatanPembelians.create', ['project_pembelian_id' => $projectPembelian->id]) }}"
                                class="btn btn-success btn-sm">Catatan</a>
                            <a href="{{ route('footerPembelians.create', ['project_pembelian_id' => $projectPembelian->id]) }}"
                                class="btn btn-primary btn-sm">Penanggungjawab</a>
                            <a class="btn btn-secondary"
                                href="{{ route('bahanPembelians.index', ['project_pembelian_id' => $projectPembelian->id]) }}">Ke
                                Bahans</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
