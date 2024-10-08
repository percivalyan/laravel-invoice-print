<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">

    <!-- Icons (e.g., Font Awesome) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    @stack('styles')
</head>

<body>
    <div id="app" class="d-flex flex-column min-vh-100">
        @include('layouts.navigation')

        <div class="d-flex flex-grow-1">
            <!-- Sidebar -->
            <nav id="sidebar" class="sidebar">
                <button class="btn btn-white" id="menu-toggles">
                    <i class="fas fa-bars"></i>
                </button>

                <div class="list-group list-group-flush">

                    {{-- Dashboard --}}
                    <a href="{{ route('dashboard') }}"
                        class="list-group-item list-group-item-action d-flex align-items-center">
                        <i class="fas fa-home icon"></i> Dashboard
                    </a>

                    {{-- Surat Penawaran --}}
                    <a href="#dataPenawaranSubmenu" data-bs-toggle="collapse"
                        class="list-group-item list-group-item-action d-flex align-items-center">
                        <i class="fas fa-file-alt icon"></i> Surat Penawaran
                        <span class="sub-menu-indicator"><i class="fas fa-chevron-down"></i></span>
                    </a>
                    <div id="dataPenawaranSubmenu" class="collapse">
                        <a href="{{ route('projectPenawarans.index') }}"
                            class="list-group-item list-group-item-action d-flex align-items-center sub-menu-item">
                            <i class="fas fa-folder-open sub-menu-icon"></i> Data Surat Penawaran
                        </a>
                        <a href="{{ route('penawarans.index') }}"
                            class="list-group-item list-group-item-action d-flex align-items-center sub-menu-item">
                            <i class="fas fa-file-alt sub-menu-icon"></i> Data Penawaran
                        </a>
                        <a href="{{ route('jenisPenawarans.index') }}"
                            class="list-group-item list-group-item-action d-flex align-items-center sub-menu-item">
                            <i class="fas fa-briefcase sub-menu-icon"></i> Jenis Penawaran
                        </a>
                        <a href="{{ route('uraianJenisPekerjaanPenawarans.index') }}"
                            class="list-group-item list-group-item-action d-flex align-items-center sub-menu-item">
                            <i class="fas fa-list sub-menu-icon"></i> Uraian dari Jenis Penawaran
                        </a>
                    </div>

                    {{-- Purchase Order --}}
                    <a href="#dataPembelianSubmenu" data-bs-toggle="collapse"
                        class="list-group-item list-group-item-action d-flex align-items-center">
                        <i class="fas fa-file-invoice-dollar icon"></i> Purchase Order
                        <span class="sub-menu-indicator"><i class="fas fa-chevron-down"></i></span>
                    </a>
                    <div id="dataPembelianSubmenu" class="collapse">
                        <a href="{{ route('projectPembelians.index') }}"
                            class="list-group-item list-group-item-action d-flex align-items-center sub-menu-item">
                            <i class="fas fa-tags sub-menu-icon"></i> Data Purchase Order (PO)
                        </a>
                        <a href="{{ route('catatanPembelians.index') }}"
                            class="list-group-item list-group-item-action d-flex align-items-center sub-menu-item">
                            <i class="fas fa-clipboard-list sub-menu-icon"></i> Data Catatan PO
                        </a>
                        <a href="{{ route('footerPembelians.index') }}"
                            class="list-group-item list-group-item-action d-flex align-items-center sub-menu-item">
                            <i class="fas fa-signature sub-menu-icon"></i> Data Penandatangan PO
                        </a>
                        <a href="{{ route('bahanPembelians.index') }}"
                            class="list-group-item list-group-item-action d-flex align-items-center sub-menu-item">
                            <i class="fas fa-clipboard-check sub-menu-icon"></i> Semua Data Order
                        </a>
                        <a href="{{ route('pembelians.index') }}"
                            class="list-group-item list-group-item-action d-flex align-items-center sub-menu-item">
                            <i class="fas fa-shopping-cart sub-menu-icon"></i> Semua Data Pembelian
                        </a>
                    </div>

                    {{-- Surat Jalan - Invoice - BAST --}}
                    <a href="#dataKwitansiSubmenu" data-bs-toggle="collapse"
                        class="list-group-item list-group-item-action d-flex align-items-center">
                        <i class="fas fa-file-invoice icon"></i> Surat Jalan/INV/BAST
                        <span class="sub-menu-indicator"><i class="fas fa-chevron-down"></i></span>
                    </a>
                    <div id="dataKwitansiSubmenu" class="collapse">
                        <a href="{{ route('projectKwitansis.index') }}"
                            class="list-group-item list-group-item-action d-flex align-items-center sub-menu-item">
                            <i class="fas fa-file-alt sub-menu-icon"></i> Data SJ/INV/BAST
                        </a>
                        <a href="{{ route('catatanKwitansis.index') }}"
                            class="list-group-item list-group-item-action d-flex align-items-center sub-menu-item">
                            <i class="fas fa-sticky-note sub-menu-icon"></i> Catatan SJ/INV/BAST
                        </a>
                        <a href="{{ route('batchKwitansis.index') }}"
                            class="list-group-item list-group-item-action d-flex align-items-center sub-menu-item">
                            <i class="fas fa-boxes sub-menu-icon"></i> Data Batch
                        </a>
                        <a href="{{ route('uraianKwitansis.index') }}"
                            class="list-group-item list-group-item-action d-flex align-items-center sub-menu-item">
                            <i class="fas fa-align-left sub-menu-icon"></i> Data Uraian Batch
                        </a>
                    </div>
                </div>
            </nav>

            <div id="page-content-wrapper" class="flex-grow-1">
                <main class="py-4">
                    @yield('content')
                </main>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>

    <style>
        .d-flex {
            display: flex;
        }

        #sidebar {
            width: 250px;
            min-width: 250px;
            background-color: #ffffff;
            border-right: 1px solid #e0e0e0;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            transition: width 0.3s, transform 0.3s;
            overflow: auto;
        }

        #page-content-wrapper {
            flex-grow: 1;
            padding: 20px;
        }

        @media (max-width: 1200px) {
            #sidebar {
                width: 200px;
            }
        }

        @media (max-width: 992px) {
            #sidebar {
                transform: translateX(-100%);
                position: fixed;
                top: 0;
                left: 0;
                height: 100%;
                z-index: 1000;
            }

            #sidebar.show {
                transform: translateX(0);
            }
        }

        .sidebar .list-group-item {
            padding: 10px 15px;
            transition: background-color 0.3s, color 0.3s;
        }

        .sidebar .list-group-item:hover {
            background-color: #f0f8ff;
            color: #007bff;
        }

        .sidebar .icon {
            margin-right: 15px;
            font-size: 1.25rem;
        }

        .sidebar .sub-menu-indicator {
            margin-left: auto;
            font-size: 0.9rem;
        }

        .sidebar .collapse {
            padding-left: 15px;
            background-color: #f9f9f9;
            border-left: 4px solid #007bff;
            box-shadow: inset 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .sidebar .sub-menu-item {
            padding: 8px 15px;
            font-size: 0.9rem;
            color: #333;
            border-radius: 0.25rem;
        }

        .sidebar .sub-menu-item:hover {
            background-color: #e9ecef;
        }

        .sidebar .sub-menu-icon {
            margin-right: 10px;
        }

        /* Tombol hanya terlihat pada layar dengan lebar maksimum 768px (contoh untuk mobile) */
        #menu-toggles {
            display: none;
            /* Default tidak terlihat */
        }

        @media (max-width: 768px) {
            #menu-toggles {
                display: block;
                /* Tampil di layar mobile */
            }
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var sidebar = document.querySelector('#sidebar');
            var toggleBtn = document.querySelector('#menu-toggles');
            toggleBtn.addEventListener('click', function() {
                sidebar.classList.toggle('show');
            });
        });
    </script>

</body>


</html>
