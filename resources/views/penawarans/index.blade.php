@extends('backend.layouts.master')

@section('title')
    Penawaran List
@endsection

@section('admin-content')
    <div class="container-fluid">

        <!-- Page Title Area -->
        <div class="page-title-area">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <div class="breadcrumbs-area clearfix">
                        <h4 class="page-title pull-left">List Pekerjaan</h4>
                        <ul class="breadcrumbs pull-left">
                            <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li><a href="{{ route('projectPenawarans.index') }}">Proyek Penawaran</a></li>
                            <li><span>List Pekerjaan</span></li>
                        </ul>
                    </div>
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

        <!-- Back Button -->
        <a href="{{ route('projectPenawarans.index') }}" class="btn btn-primary mb-3">Back to Project Penawaran</a>

        <!-- DataTable Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">Daftar Pekerjaan
                    {{ $penawarans->first()->projectPenawaran->kepada ?? 'N/A' }}</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Project</th>
                                <th>Pekerjaan</th>
                                <th>Jenis Penawaran</th> <!-- Added Column -->
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($penawarans as $penawaran)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $penawaran->projectPenawaran->kepada }}</td>
                                    <td>{{ $penawaran->pekerjaan }}</td>
                                    <td>
                                        @foreach ($penawaran->jenisPenawarans as $jenis)
                                            <span class="badge badge-primary">BID0{{ $jenis->id }} -
                                                {{ $jenis->jenis_pekerjaan }}</span><br>
                                        @endforeach
                                    </td> <!-- Displaying Jenis Penawaran -->
                                    <td class="text-center">
                                        <!-- View Button -->
                                        <a href="{{ route('penawarans.show', $penawaran) }}"
                                            class="btn btn-info btn-sm mb-2" data-toggle="tooltip" title="View Penawaran">
                                            <i class="fas fa-eye"></i> Lihat Penawaran
                                        </a>

                                        <!-- Edit Button -->
                                        <a href="{{ route('penawarans.edit', $penawaran) }}"
                                            class="btn btn-warning btn-sm mb-2" data-toggle="tooltip"
                                            title="Edit Penawaran">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>


                                        <!-- Delete Penawaran Button -->
                                        <form action="{{ route('penawarans.destroy', $penawaran->id) }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')

                                            <!-- Hidden input for project_penawaran_id -->
                                            @if (request()->has('project_penawaran_id'))
                                                <input type="hidden" name="project_penawaran_id"
                                                    value="{{ request('project_penawaran_id') }}">
                                            @endif

                                            <button type="submit" class="btn btn-danger btn-sm mb-2"
                                                onclick="return confirm('Are you sure you want to delete this item?')"
                                                data-toggle="tooltip" title="Delete">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>


                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">No Penawaran Found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable(); // Initialize DataTable
            $('[data-toggle="tooltip"]').tooltip(); // Initialize tooltips
        });
    </script>
@endsection
