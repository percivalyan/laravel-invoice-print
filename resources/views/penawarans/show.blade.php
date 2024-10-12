@extends('backend.layouts.master')

@section('title')
    Detail Penawaran untuk Pekerjaan: {{ $penawaran->pekerjaan }}
@endsection

@section('admin-content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Penawaran</h1>
    </div>

    <!-- Detail Penawaran -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Detail Penawaran - {{ $penawaran->pekerjaan }}</h6>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>Project</th>
                    <td>{{ $penawaran->projectPenawaran->kepada }}</td>
                </tr>
                <tr>
                    <th>Pekerjaan</th>
                    <td>{{ $penawaran->pekerjaan }}</td>
                </tr>
                <tr>
                    <th>Quantitas</th>
                    <td>{{ $penawaran->quantitas }}</td>
                </tr>
                <tr>
                    <th>Unit</th>
                    <td>{{ $penawaran->unit }}</td>
                </tr>
                <tr>
                    <th>Harga Satuan</th>
                    <td>{{ $penawaran->harga_satuan }}</td>
                </tr>
                
                <!-- Menampilkan Jenis Penawaran -->
                <tr>
                    <th>Jenis Penawaran</th>
                    <td>
                        @foreach($penawaran->jenisPenawarans as $jenis)
                            <span class="badge badge-info">{{ $jenis->jenis_pekerjaan }}</span>
                        @endforeach
                    </td>
                </tr>
            </table>
        </div>
    </div>

    <!-- List Penawaran lain dalam pekerjaan yang sama (optional) -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Penawaran Lain dalam Pekerjaan yang Sama</h6>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Pekerjaan</th>
                        <th>Quantitas</th>
                        <th>Harga Satuan</th>
                        <th>Total Harga</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($relatedPenawarans as $index => $relatedPenawaran)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $relatedPenawaran->pekerjaan }}</td>
                        <td>{{ $relatedPenawaran->quantitas }}</td>
                        <td>{{ $relatedPenawaran->harga_satuan }}</td>
                        <td>{{ $relatedPenawaran->quantitas * $relatedPenawaran->harga_satuan }}</td>
                        <td>
                            <a href="{{ route('penawarans.show', $relatedPenawaran->id) }}" class="btn btn-info btn-sm">View</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
