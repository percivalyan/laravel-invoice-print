<!doctype html>
<html lang="en">

<head>
    <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title', 'Laravel Role Admin')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- External Stylesheets -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- Internal Stylesheets -->
    @include('backend.layouts.partials.styles')
    @yield('styles')

    <style>
        /* General Styles for Sidebar */
        body,
        html {
            margin: 0;
            padding: 0;
            overflow-x: hidden;
            /* Prevent horizontal scrolling */
            box-sizing: border-box;
            /* Include padding and border in element's total width and height */
        }

        *,
        *::before,
        *::after {
            box-sizing: inherit;
            /* Apply box-sizing to all elements */
        }

        .sidenavbar {
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            background-color: #343a40;
            padding-top: 20px;
            overflow-x: hidden;
            transition: all 0.3s ease;
            z-index: 999;
        }

        .sidenavbar.hide {
            transform: translateX(-100%);
        }

        .sidenavbar a {
            padding: 10px 15px;
            text-decoration: none;
            font-size: 18px;
            color: #f1f1f1;
            display: block;
            transition: 0.3s;
        }

        .sidenavbar a:hover {
            background-color: #575d63;
        }

        /* Main Content */
        .main-content {
            margin-left: 250px;
            padding: 20px;
            transition: margin-left 0.3s;
            width: calc(100% - 250px);
        }

        .main-content.full-width {
            margin-left: 0;
            width: 100%;
        }

        /* Media Query for Mobile and Tablet */
        @media (max-width: 1024px) {
            .sidenavbar {
                transform: translateX(-100%);
            }

            .sidenavbar.show {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
                width: 100%;
                padding: 10px;
            }

            .floating-toggle {
                bottom: 20px;
                right: 20px;
                z-index: 1000;
            }

            .overlay {
                display: block;
                z-index: 998;
            }
        }

        /* Adjustments for small screens including 1024x600 */
        @media (max-width: 1024px) {
            .sidenavbar {
                transform: translateX(-100%);
            }

            .sidenavbar.show {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
                width: 100%;
                padding: 10px;
            }

            .floating-toggle {
                bottom: 20px;
                right: 20px;
                z-index: 1000;
            }

            .overlay {
                display: block;
                z-index: 998;
            }
        }

        /* Floating Toggle Button */
        .floating-toggle {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #007bff;
            border: none;
            color: white;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
            cursor: pointer;
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }

        .floating-toggle:hover {
            background-color: #0056b3;
        }

        .floating-toggle i {
            font-size: 20px;
        }
    </style>
</head>

<body>
    <section class="desktop-page">
        <!-- Page Container -->
        <div class="page-container">
            <!-- Sidebar -->
            <div class="sidenavbar hide" id="sidebar" style="background-color: #343a40;">
                <div class="sidebar-header text-center py-3">
                    <div class="logo">
                        <a class="navbar-brand d-flex align-items-center" href="#">
                            {{-- Uncomment the logo if needed --}}
                            {{-- <img src="{{ asset('images/brin.png') }}" alt="Logo" class="img-fluid rounded"
                    style="height: 50px; width: auto; max-height: 40px; padding: 2px; border-radius: 5px; background: #fff;" />
                <span class="ms-2 text-light" style="font-size: 14px; line-height: 1.2;">
                    System Information of <br> Reliability and Safety
                </span> --}}
                        </a>
                    </div>
                </div>

                <!-- Sidebar Links -->
                <ul class="nav flex-column">
                    @php $usr = Auth::guard('admin')->user(); @endphp

                    @if ($usr->can('dashboard.view'))
                        <li class="nav-item">
                            <a class="nav-link text-light" href="{{ route('admin.dashboard') }}">
                                <i class="fas fa-tachometer-alt me-2"></i> Dashboard
                            </a>
                        </li>
                    @endif

                    @if ($usr->can('role.create') || $usr->can('role.view') || $usr->can('role.edit') || $usr->can('role.delete'))
                        <li class="nav-item">
                            <a class="nav-link text-light" href="{{ route('admin.roles.index') }}">
                                <i class="fa fa-tasks me-2"></i> Roles & Permissions
                            </a>
                        </li>
                    @endif

                    @if ($usr->can('admin.create') || $usr->can('admin.view') || $usr->can('admin.edit') || $usr->can('admin.delete'))
                        <li class="nav-item">
                            <a class="nav-link text-light" href="{{ route('admin.admins.index') }}">
                                <i class="fa fa-user me-2"></i> Admins
                            </a>
                        </li>
                    @endif

                    <li class="nav-item">
                        <a class="nav-link dropdown-toggle text-light" href="#" id="dropdownSuratKeluarPenawaran"
                            data-bs-toggle="collapse" data-bs-target="#submenuSuratKeluarPenawaran"
                            aria-expanded="false" aria-controls="submenuSuratKeluarPenawaran">
                            <i class="fa fa-paper-plane me-2"></i> Surat Keluar <br>| Surat Penawaran
                        </a>
                        <div class="collapse" id="submenuSuratKeluarPenawaran">
                            <ul class="list-unstyled ps-3">
                                <li><a class="dropdown-item text-light" href="{{ route('projectPenawarans.index') }}">
                                        <i class="fa fa-file-alt me-2"></i> Surat Penawaran</a></li>
                                <li><a class="dropdown-item text-light" href="{{ route('jenisPenawarans.index') }}">
                                        <i class="fa fa-tags me-2"></i> Jenis Penawaran</a></li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link dropdown-toggle text-light" href="#" id="dropdownSuratMasukPO"
                            data-bs-toggle="collapse" data-bs-target="#submenuSuratMasukPO" aria-expanded="false"
                            aria-controls="submenuSuratMasukPO">
                            <i class="fa fa-envelope me-2"></i> Surat Masuk <br>| Purchase Order
                        </a>
                        <div class="collapse" id="submenuSuratMasukPO">
                            <ul class="list-unstyled ps-3">
                                <li><a class="dropdown-item text-light" href="{{ route('projectPembelians.index') }}">
                                        <i class="fa fa-file-invoice me-2"></i> Purchase Orders</a></li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link dropdown-toggle text-light" href="#" id="dropdownSuratKeluarSPINVBAST"
                            data-bs-toggle="collapse" data-bs-target="#submenuSuratKeluarSPINVBAST"
                            aria-expanded="false" aria-controls="submenuSuratKeluarSPINVBAST">
                            <i class="fa fa-paper-plane me-2"></i> Surat Keluar <br>| SP/INV/BAST
                        </a>
                        <div class="collapse" id="submenuSuratKeluarSPINVBAST">
                            <ul class="list-unstyled ps-3">
                                <li><a class="dropdown-item text-light" href="{{ route('projectKwitansis.index') }}">
                                        <i class="fa fa-file-contract me-2"></i> SP/INV/BAST</a></li>
                                <li><a class="dropdown-item text-light" href="{{ route('batchKwitansis.index') }}">
                                        <i class="fa fa-boxes me-2"></i> Batch Barang</a></li>
                            </ul>
                        </div>
                    </li>

                    {{-- <li class="nav-item">
                        <a class="nav-link dropdown-toggle text-light" href="#" id="dropdownSuratMasuk"
                            data-bs-toggle="collapse" data-bs-target="#submenuSuratMasuk" aria-expanded="false"
                            aria-controls="submenuSuratMasuk">
                            <i class="fa fa-envelope me-2"></i> Surat Masuk <br>| Purchase Order
                        </a>
                        <div class="collapse" id="submenuSuratMasuk">
                            <ul class="list-unstyled ps-3">
                                <li><a class="dropdown-item text-light" href="{{ route('projectPenawarans.index') }}">
                                        <i class="fa fa-file-alt me-2"></i> Purchase Order</a></li>
                                <li><a class="dropdown-item text-light" href="{{ route('jenisPenawarans.index') }}">
                                        <i class="fa fa-tags me-2"></i> Jenis Penawaran</a></li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link dropdown-toggle text-light" href="#" id="dropdownSuratMasuk"
                            data-bs-toggle="collapse" data-bs-target="#submenuSuratMasuk" aria-expanded="false"
                            aria-controls="submenuSuratMasuk">
                            <i class="fa fa-envelope me-2"></i> Surat Keluar <br>| Surat Jalan/INV/BAST
                        </a>
                        <div class="collapse" id="submenuSuratMasuk">
                            <ul class="list-unstyled ps-3">
                                <li><a class="dropdown-item text-light" href="{{ route('projectPenawarans.index') }}">
                                        <i class="fa fa-file-alt me-2"></i> Surat Penawaran</a></li>
                                <li><a class="dropdown-item text-light" href="{{ route('jenisPenawarans.index') }}">
                                        <i class="fa fa-tags me-2"></i> Jenis Penawaran</a></li>
                            </ul>
                        </div>
                    </li> --}}
                </ul>

                <!-- Bootstrap JS for the dropdown -->
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
            </div>

            <!-- Overlay for mobile -->
            <div class="overlay" id="overlay"></div>

            <!-- Main Content -->
            <div class="main-content full-width" id="mainContent">
                @yield('admin-content')
            </div>
        </div>

        <!-- Floating Toggle Button -->
        <button class="floating-toggle" id="sidebarToggle">
            <i class="fas fa-bars"></i>
        </button>

        <!-- Footer -->
        @include('backend.layouts.partials.footer')

        <!-- Scripts -->
        @include('backend.layouts.partials.scripts')
        @yield('scripts')

        <!-- Sidebar Toggle Script -->
        <script>
            document.getElementById('sidebarToggle').addEventListener('click', function() {
                const sidebar = document.getElementById('sidebar');
                const mainContent = document.getElementById('mainContent');
                const overlay = document.getElementById('overlay');

                if (window.innerWidth <= 1024) {
                    // Show or hide sidebar on mobile/tablet view
                    sidebar.classList.toggle('show');
                    overlay.classList.toggle('show');
                } else {
                    // For desktop, toggle sidebar visibility
                    sidebar.classList.toggle('hide');
                    if (sidebar.classList.contains('hide')) {
                        mainContent.style.marginLeft = "0";
                        mainContent.style.width = "100%";
                    } else {
                        mainContent.style.marginLeft = "250px";
                        mainContent.style.width = "calc(100% - 250px)";
                    }
                }
            });

            document.getElementById('overlay').addEventListener('click', function() {
                const sidebar = document.getElementById('sidebar');
                const overlay = document.getElementById('overlay');
                sidebar.classList.remove('show');
                overlay.classList.remove('show');
            });

            function checkWindowSize() {
                const sidebar = document.getElementById('sidebar');
                const mainContent = document.getElementById('mainContent');
                if (window.innerWidth <= 1024) {
                    // Hide sidebar by default on small screens
                    sidebar.classList.add('hide');
                    mainContent.style.marginLeft = "0";
                    mainContent.style.width = "100%";
                } else {
                    // Show sidebar on larger screens
                    sidebar.classList.remove('hide');
                    mainContent.style.marginLeft = "250px";
                    mainContent.style.width = "calc(100% - 250px)";
                }
            }

            window.addEventListener('resize', checkWindowSize);
            window.addEventListener('load', checkWindowSize);
        </script>

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        {{-- <script>
            window.addEventListener('load', function() {
                let timerInterval;

                // SweetAlert2 pop-up with close button at the top-right corner and left-aligned text
                Swal.fire({
                    position: 'top-end',
                    icon: 'info',
                    html: `
                <div style="position: relative;">
                    <button id="closeButton" style="
                        position: absolute; 
                        top: 0; 
                        right: 0; 
                        background: none; 
                        border: none; 
                        font-size: 20px; 
                        color: #000; 
                        cursor: pointer;">&times;</button>
                    <p style="text-align: left; margin-top: 20px;">
                        Untuk menampilkan atau <br> menutup menu navigasi samping, dapat menekan tombol berwarna biru di samping kanan bawah
                    </p>
                </div>
            `,
                    showConfirmButton: false,
                    timer: 7000,
                    toast: true,
                    timerProgressBar: true,
                    didOpen: () => {
                        // Close the alert when the "X" button is clicked
                        document.getElementById('closeButton').addEventListener('click', function() {
                            Swal.close();
                        });

                        // Start the timer interval
                        timerInterval = setInterval(() => {
                            const content = Swal.getHtmlContainer();
                            if (content) {
                                const b = content.querySelector('b');
                                if (b) {
                                    b.textContent = Swal.getTimerLeft();
                                }
                            }
                        }, 100);
                    },
                    willClose: () => {
                        clearInterval(timerInterval); // Clear interval when closing
                    }
                });
            });
        </script> --}}

    </section>
</body>

</html>
