@extends('backend.layouts.master')

@section('title')
    Dashboard - Admin Panel
@endsection

@section('admin-content')
    <!-- Page title area start -->
    <div class="page-title-area mb-4">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <div class="breadcrumbs-area clearfix">
                    <h4 class="page-title pull-left">Dashboard</h4>
                    <ul class="breadcrumbs pull-left">
                        <li><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li><span>Dashboard</span></li>
                    </ul>
                </div>
            </div>
            <div class="col-sm-6 clearfix">
                @include('backend.layouts.partials.logout')
            </div>
        </div>
    </div>
    <!-- Page title area end -->

    <!-- Main content area start -->
    <div class="main-content-inner">
        <div class="row">
            <!-- Roles Section -->
            <div class="col-md-4 mt-3 mb-4">
                <div class="card shadow-sm rounded hover-effect">
                    <a href="{{ route('admin.roles.index') }}" class="text-decoration-none">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div>
                                <i class="fa fa-users icon-lg mb-3"></i>
                                <h5 class="card-title">Roles</h5>
                            </div>
                            <div>
                                <h2>{{ $total_roles }}</h2>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Admins Section -->
            <div class="col-md-4 mt-3 mb-4">
                <div class="card shadow-sm rounded hover-effect">
                    <a href="{{ route('admin.admins.index') }}" class="text-decoration-none">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div>
                                <i class="fa fa-user icon-lg mb-3"></i>
                                <h5 class="card-title">Admins</h5>
                            </div>
                            <div>
                                <h2>{{ $total_admins }}</h2>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Permissions Section -->
            <div class="col-md-4 mt-3 mb-4">
                <div class="card shadow-sm rounded hover-effect">
                    <a href="#" class="text-decoration-none">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div>
                                <i class="fa fa-lock icon-lg mb-3"></i>
                                <h5 class="card-title">Permissions</h5>
                            </div>
                            <div>
                                <h2>{{ $total_permissions }}</h2>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            {{-- <!-- Custom Sections -->
            <!-- Teras Section -->
            <div class="col-md-4 mt-3 mb-4">
                <div class="card shadow-sm rounded hover-effect">
                    <a href="{{ route('teras.index') }}" class="text-decoration-none">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div>
                                <i class="fa fa-tree icon-lg mb-3"></i>
                                <h5 class="card-title">Cores</h5>
                            </div>
                            <div>
                                <h2>{{ $total_teras }}</h2>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Komponen Section -->
            <div class="col-md-4 mt-3 mb-4">
                <div class="card shadow-sm rounded hover-effect">
                    <a href="{{ route('komponen.index') }}" class="text-decoration-none">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div>
                                <i class="fa fa-cogs icon-lg mb-3"></i>
                                <h5 class="card-title">Key - Component</h5>
                            </div>
                            <div>
                                <h2>{{ $total_komponen }}</h2>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Waktu Ops Komponen Section -->
            <div class="col-md-4 mt-3 mb-4">
                <div class="card shadow-sm rounded hover-effect">
                    <a href="{{ route('waktu_ops_komponen.index') }}" class="text-decoration-none">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div>
                                <i class="fa fa-clock icon-lg mb-3"></i>
                                <h5 class="card-title">Operational Time Component</h5>
                            </div>
                            <div>
                                <h2>{{ $total_waktu_ops_komponen }}</h2>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Gangguan Section -->
            <div class="col-md-4 mt-3 mb-4">
                <div class="card shadow-sm rounded hover-effect">
                    <a href="{{ route('gangguan.index') }}" class="text-decoration-none">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div>
                                <i class="fa fa-exclamation-triangle icon-lg mb-3"></i>
                                <h5 class="card-title">Failure and Repair</h5>
                            </div>
                            <div>
                                <h2>{{ $total_gangguan }}</h2>
                            </div>
                        </div>
                    </a>
                </div>
            </div> --}}

            <!-- Chart Section -->
            <div class="col-md-12 mt-3 mb-4">
                <div class="card shadow-sm rounded hover-effect">
                    <div class="card-body">
                        <h5 class="card-title">Reliability and Safety Chart</h5>
                        <canvas id="myChart" width="400" height="200"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main content area end -->

    <!-- Chart Initialization Script -->
    {{-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            var ctx = document.getElementById('myChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'line', // Modify chart type as needed (e.g., 'bar', 'line')
                data: {
                    labels: ['Komponen', 'Gangguan', 'Waktu Ops Komponen', 'Teras'], // Updated labels
                    datasets: [{
                        label: 'Data Overview',
                        data: [
                            {{ $total_komponen }},
                            {{ $total_gangguan }},
                            {{ $total_waktu_ops_komponen }},
                            {{ $total_teras }}
                        ], // Data from backend
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
    </script> --}}
@endsection
