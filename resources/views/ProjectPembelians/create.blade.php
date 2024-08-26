@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Create Project Pembelian</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card shadow mb-4">
            <div class="card-body">
                <form action="{{ route('projectPembelians.store') }}" method="POST">
                    @csrf

                    <!-- Removed the Nomor PO input field -->
                    <!-- <div class="form-group">
                        <label for="nomor_po">Nomor PO:</label>
                        <input type="text" name="nomor_po" class="form-control" value="{{ old('nomor_po') }}">
                    </div> -->

                    <div class="form-group">
                        <label for="project">Project:</label>
                        <input type="text" name="project" class="form-control" value="{{ old('project') }}">
                    </div>
                    <div class="form-group">
                        <label for="tanggal_order">Tanggal Order:</label>
                        <input type="date" name="tanggal_order" class="form-control" value="{{ old('tanggal_order') }}">
                    </div>
                    <div class="form-group">
                        <label for="metode_pembayaran">Metode Pembayaran:</label>
                        <select id="metode_pembayaran" name="metode_pembayaran" class="form-control"
                            onchange="toggleInput(this)">
                            <option value="">Pilih Metode Pembayaran</option>
                            <option value="Transfer">Transfer</option>
                            <option value="Cash">Cash</option>
                            <option value="Dicicil Cash">Dicicil Cash</option>
                            <option value="Dicicil Transfer">Dicicil Transfer</option>
                            <option value="Dicicil Cash & Transfer">Dicicil Cash & Transfer</option>
                            <option value="Lainnya">Lainnya</option>
                        </select>
                        <input type="text" id="manual_metode" name="metode_pembayaran" class="form-control mt-2 d-none"
                            placeholder="Masukkan metode pembayaran lainnya" value="{{ old('metode_pembayaran') }}">
                    </div>

                    <script>
                        function toggleInput(select) {
                            var input = document.getElementById('manual_metode');
                            if (select.value === 'Lainnya') {
                                input.classList.remove('d-none');
                                input.focus();
                            } else {
                                input.classList.add('d-none');
                                input.value = select.value; // Set the value of the input to the selected option
                            }
                        }

                        // Ensure correct input visibility on page load based on selected value
                        document.addEventListener('DOMContentLoaded', function() {
                            var select = document.getElementById('metode_pembayaran');
                            toggleInput(select);
                        });
                    </script>

                    <div class="form-group">
                        <label for="po_ditunjukan_kepada">PO Ditunjukan Kepada:</label>
                        <input type="text" name="po_ditunjukan_kepada" class="form-control"
                            value="{{ old('po_ditunjukan_kepada') }}">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat:</label>
                        <input type="text" name="alamat" class="form-control" value="{{ old('alamat') }}">
                    </div>
                    <div class="form-group">
                        <label for="kontak">Kontak:</label>
                        <input type="text" name="kontak" class="form-control" value="{{ old('kontak') }}">
                    </div>
                    <div class="form-group">
                        <label for="email_mobile_number">Email/Mobile Number:</label>
                        <input type="text" name="email_mobile_number" class="form-control"
                            value="{{ old('email_mobile_number') }}">
                    </div>

                    <button type="submit" class="btn btn-primary">Create</button>
                    <a href="{{ route('projectPembelians.index') }}" class="btn btn-secondary text-white">
                        Kembali ke PO
                    </a>
                </form>
            </div>
        </div>
    </div>
@endsection
