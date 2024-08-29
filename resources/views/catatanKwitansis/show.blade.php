@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Catatan Kwitansi Details</h1>

    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="row">
                <!-- Bank Details on the left -->
                <div class="col-md-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h6 class="m-0 font-weight-bold text-primary">Bank Details</h6>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th>Bank Pembayaran</th>
                                        <td>{{ $catatanKwitansi->bank_pembayaran }}</td>
                                    </tr>
                                    <tr>
                                        <th>Cabang</th>
                                        <td>{{ $catatanKwitansi->cabang }}</td>
                                    </tr>
                                    <tr>
                                        <th>Nomor Rekening</th>
                                        <td>{{ $catatanKwitansi->nomor_rekening }}</td>
                                    </tr>
                                    <tr>
                                        <th>Atas Nama</th>
                                        <td>{{ $catatanKwitansi->atas_nama }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Orang Details on the right -->
                <div class="col-md-6">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h6 class="m-0 font-weight-bold text-primary">Orang Details</h6>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th>Nama Penerima</th>
                                        <td>{{ $catatanKwitansi->nama_penerima }}</td>
                                    </tr>
                                    <tr>
                                        <th>Tanggal Diterima Penerima</th>
                                        <td>
                                            {{ $catatanKwitansi->tanggal_diterima_penerima ? $catatanKwitansi->tanggal_diterima_penerima->format('d/m/Y') : '-' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Waktu Diterima Penerima</th>
                                        <td>{{ $catatanKwitansi->waktu_diterima_penerima }}</td>
                                    </tr>
                                    <tr>
                                        <th>Nama Driver</th>
                                        <td>{{ $catatanKwitansi->nama_driver }}</td>
                                    </tr>
                                    <tr>
                                        <th>Tanggal Diterima Driver</th>
                                        <td>
                                            {{ $catatanKwitansi->tanggal_diterima_driver ? $catatanKwitansi->tanggal_diterima_driver->format('d/m/Y') : '-' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Waktu Diterima Driver</th>
                                        <td>{{ $catatanKwitansi->waktu_diterima_driver }}</td>
                                    </tr>
                                    <tr>
                                        <th>Nama ADM Kantor</th>
                                        <td>{{ $catatanKwitansi->nama_adm_kantor }}</td>
                                    </tr>
                                    <tr>
                                        <th>Tanggal Diterima ADM Kantor</th>
                                        <td>
                                            {{ $catatanKwitansi->tanggal_diterima_adm_kantor ? $catatanKwitansi->tanggal_diterima_adm_kantor->format('d/m/Y') : '-' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Waktu Diterima ADM Kantor</th>
                                        <td>{{ $catatanKwitansi->waktu_diterima_adm_kantor }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Penanggung Jawab Details below -->
            <div class="card">
                <div class="card-header">
                    <h6 class="m-0 font-weight-bold text-primary">Penanggung Jawab Details</h6>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th>Penanggung Jawab</th>
                                <td>{{ $catatanKwitansi->penanggung_jawab }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Footer with action buttons -->
        <div class="card-footer text-end">
            <a href="{{ route('catatanKwitansis.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left me-2"></i>Masuk ke Semua Daftar Catatan
            </a>
            <a href="{{ route('projectKwitansis.index') }}" class="btn btn-warning ms-2">
                <i class="fas fa-arrow-left me-2"></i>Kembali ke Daftar Surat Jalan/INV/BAST
            </a>
            <a href="{{ route('catatanKwitansis.edit', $catatanKwitansi->id) }}" class="btn btn-warning ms-2">
                <i class="fas fa-edit me-2"></i>Edit
            </a>
            <form action="{{ route('catatanKwitansis.destroy', $catatanKwitansi->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure you want to delete this record?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger ms-2">
                    <i class="fas fa-trash me-2"></i>Delete
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
