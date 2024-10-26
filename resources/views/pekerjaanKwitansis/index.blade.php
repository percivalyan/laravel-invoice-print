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
                    <h4 class="page-title">Pekerjaan Kwitansi</h4>
                </div>
                <div class="col-sm-6 clearfix">
                    @include('backend.layouts.partials.logout')
                </div>
            </div>
        </div>

        <div class="py-2">
            <a href="{{ route('projectKwitansis.index') }}" class="btn btn-sm btn-secondary shadow-sm">
                <i class="fas fa-arrow-circle-left fa-sm text-white-50 mr-2"></i> Kembali ke Surat Jalan/INV/BAST
            </a>
            <button class="btn btn-sm btn-primary shadow-sm ml-3" data-toggle="modal" data-target="#createPekerjaanModal">
                <i class="fas fa-file-invoice fa-sm text-white-50 mr-2"></i> Tambah Pekerjaan Kwitansi
            </button>
        </div>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Daftar Pekerjaan Kwitansi</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama Pekerjaan</th>
                                <th>Project Kwitansi</th>
                                <th>Nama Batch</th> <!-- New Column Header -->
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($pekerjaanKwitansis as $pekerjaanKwitansi)
                                <tr>
                                    <td>{{ $pekerjaanKwitansi->id }}</td>
                                    <td>{{ $pekerjaanKwitansi->pekerjaan }}</td>
                                    <td>{{ $pekerjaanKwitansi->projectKwitansi->proyek }}</td>
                                    <td>
                                        @if ($pekerjaanKwitansi->batchKwitansis->isNotEmpty())
                                            {{ $pekerjaanKwitansi->batchKwitansis->pluck('nama_batch')->implode(', ') }}
                                            <!-- Display connected batch names -->
                                        @else
                                            Tidak ada batch
                                        @endif
                                    </td>
                                    <td>
                                        <button class="btn btn-warning btn-sm" data-toggle="modal"
                                            data-target="#editPekerjaanModal" data-id="{{ $pekerjaanKwitansi->id }}"
                                            data-pekerjaan="{{ $pekerjaanKwitansi->pekerjaan }}"
                                            data-project="{{ $pekerjaanKwitansi->project_kwitansi_id }}"
                                            data-batches="{{ $pekerjaanKwitansi->batchKwitansis->pluck('id') }}">
                                            <i class="fas fa-edit"></i> Edit
                                        </button>

                                        <form action="{{ route('pekerjaanKwitansis.destroy', $pekerjaanKwitansi->id) }}"
                                            method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus Pekerjaan Kwitansi ini?')"><i
                                                    class="fas fa-trash"></i> Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">Tidak ada data Pekerjaan Kwitansi.</td>
                                    <!-- Adjusted colspan -->
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                </div>
            </div>
        </div>

        <!-- Create Modal -->
        <div class="modal fade" id="createPekerjaanModal" tabindex="-1" role="dialog"
            aria-labelledby="createPekerjaanModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createPekerjaanModalLabel">Tambah Pekerjaan Kwitansi</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('pekerjaanKwitansis.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="project_kwitansi_id" value="{{ $projectKwitansiId }}">

                            <div class="form-group">
                                <label for="pekerjaan" class="form-label">Nama Pekerjaan</label>
                                <input type="text" class="form-control @error('pekerjaan') is-invalid @enderror"
                                    id="pekerjaan" name="pekerjaan" value="{{ old('pekerjaan') }}">
                                @error('pekerjaan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="batch_kwitansi_ids" class="form-label">Pilih Batch Kwitansi</label>
                                <select class="form-control @error('batch_kwitansi_ids') is-invalid @enderror"
                                    id="batch_kwitansi_ids" name="batch_kwitansi_ids[]" multiple>
                                    @foreach ($allBatches as $batch)
                                        <option value="{{ $batch->id }}">{{ $batch->nama_batch }}</option>
                                    @endforeach
                                </select>
                                @error('batch_kwitansi_ids')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit Modal -->
        <div class="modal fade" id="editPekerjaanModal" tabindex="-1" role="dialog"
            aria-labelledby="editPekerjaanModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editPekerjaanModalLabel">Edit Pekerjaan Kwitansi</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="editPekerjaanForm" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="project_kwitansi_id" id="editProjectKwitansiId">

                            <div class="form-group">
                                <label for="editPekerjaan" class="form-label">Nama Pekerjaan</label>
                                <input type="text" class="form-control @error('pekerjaan') is-invalid @enderror"
                                    id="editPekerjaan" name="pekerjaan">
                                @error('pekerjaan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="editBatchKwitansiIds" class="form-label">Pilih Batch Kwitansi</label>
                                <select class="form-control @error('batch_kwitansi_ids') is-invalid @enderror"
                                    id="editBatchKwitansiIds" name="batch_kwitansi_ids[]" multiple>
                                    @foreach ($allBatches as $batch)
                                        <option value="{{ $batch->id }}">{{ $batch->nama_batch }}</option>
                                    @endforeach
                                </select>
                                @error('batch_kwitansi_ids')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

    @section('scripts')
        <script>
            $('#editPekerjaanModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var id = button.data('id');
                var pekerjaan = button.data('pekerjaan');
                var projectKwitansiId = button.data('project');
                var batchIds = button.data('batches');

                var modal = $(this);
                modal.find('.modal-body #editPekerjaan').val(pekerjaan);
                modal.find('.modal-body #editProjectKwitansiId').val(projectKwitansiId);

                // Set selected batch options
                $('#editBatchKwitansiIds').val(batchIds).trigger('change');

                modal.find('#editPekerjaanForm').attr('action', '/pekerjaanKwitansis/' + id);
            });
        </script>
    @endsection
@endsection
