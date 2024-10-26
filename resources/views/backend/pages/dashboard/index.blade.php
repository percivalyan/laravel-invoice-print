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

            <!-- Custom Sections -->
            <div class="col-md-4 mt-3 mb-4">
                <div class="card shadow-sm rounded hover-effect">
                    <a href="{{ route('projectPembelians.index') }}" class="text-decoration-none">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div>
                                <i class="fa fa-shopping-cart icon-lg mb-3"></i>
                                <h5 class="card-title">Purchase Order</h5>
                            </div>
                            <div>
                                <h2>{{ $total_pembelian }}</h2>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-md-4 mt-3 mb-4">
                <div class="card shadow-sm rounded hover-effect">
                    <a href="{{ route('projectPenawarans.index') }}" class="text-decoration-none">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div>
                                <i class="fa fa-envelope icon-lg mb-3"></i>
                                <h5 class="card-title">Surat Penawaran</h5>
                            </div>
                            <div>
                                <h2>{{ $total_penawaran }}</h2>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-md-4 mt-3 mb-4">
                <div class="card shadow-sm rounded hover-effect">
                    <a href="{{ route('projectKwitansis.index') }}" class="text-decoration-none">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <div>
                                <i class="fa fa-file-invoice icon-lg mb-3"></i>
                                <h5 class="card-title">Surat Pembelian / Invoice / BAST</h5>
                            </div>
                            <div>
                                <h2>{{ $total_kwitansi }}</h2>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Chart Section -->
            <div class="col-md-12 mt-3 mb-4">
                <div class="card shadow-sm rounded hover-effect">
                    <div class="card-body">
                        <h5 class="card-title">Data Chart</h5>
                        <canvas id="myChart" width="400" height="200"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main content area end -->

    <!-- Chart Initialization Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var ctx = document.getElementById('myChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'line', // Modify chart type as needed (e.g., 'bar', 'line')
                data: {
                    labels: ['Surat Pembelian', 'Surat Pemawaran',
                    'Surat Pembelian / Invoice / BAST'], // Updated labels
                    datasets: [{
                        label: 'Data Overview',
                        data: [
                            {{ $total_kwitansi }},
                            {{ $total_penawaran }},
                            {{ $total_pembelian }},
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
    </script>
@endsection
