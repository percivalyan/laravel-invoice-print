{{-- <style>
    /* Private Sidebar Styles */
    .private-sidebar {
        background-color: #ffffff;
        border-right: 1px solid #e0e0e0;
        height: 100vh;
        padding-top: 20px;
        width: 250px;
        box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
        transition: width 0.3s;
    }

    .private-sidebar .sidebar-item-custom {
        display: flex;
        align-items: center;
        color: #333333;
        background-color: #ffffff;
        position: relative;
        border: none;
        border-radius: 0.25rem;
        padding: 12px 20px;
        margin: 0;
        transition: background-color 0.3s, color 0.3s, padding-left 0.3s;
    }

    .private-sidebar .sidebar-item-custom:hover,
    .private-sidebar .sidebar-item-custom.active {
        color: #007bff;
        background-color: #f0f8ff;
        padding-left: 25px;
    }

    .private-sidebar .icon-custom {
        margin-right: 15px;
        font-size: 1.25rem;
        color: #007bff;
    }

    .private-sidebar .sub-menu-indicator {
        margin-left: auto;
        font-size: 0.9rem;
        color: #6c757d;
    }

    .private-sidebar .collapse {
        padding-left: 20px;
        background-color: #f9f9f9;
        border-left: 4px solid #007bff;
        box-shadow: inset 0 0 10px rgba(0, 0, 0, 0.1);
        transition: padding-left 0.3s, box-shadow 0.3s;
    }

    .private-sidebar .sub-menu-item-custom {
        padding: 10px 20px;
        font-size: 0.9rem;
        color: #333333;
        border-radius: 0.25rem;
        transition: background-color 0.3s, color 0.3s;
    }

    .private-sidebar .sub-menu-item-custom:hover {
        color: #007bff;
        background-color: #e9ecef;
    }

    .private-sidebar .sub-menu-icon {
        margin-right: 10px;
        color: #6c757d;
    }

    /* Responsive Styles */
    @media (max-width: 1024px) {
        .private-sidebar {
            width: 200px;
        }

        .private-sidebar .icon-custom {
            font-size: 1rem;
        }

        .private-sidebar .sidebar-item-custom {
            font-size: 0.9rem;
            padding: 10px 15px;
        }

        .private-sidebar .sub-menu-item-custom {
            font-size: 0.8rem;
            padding: 8px 15px;
        }

        .private-sidebar .sub-menu-indicator,
        .private-sidebar .sub-menu-icon {
            display: none;
        }
    }

    @media (max-width: 768px) {
        .private-sidebar {
            width: 100%;
            height: auto;
            position: relative;
            border-right: none;
            box-shadow: none;
        }

        .private-sidebar .collapse {
            padding-left: 15px;
        }

        .private-sidebar .sidebar-item-custom {
            padding: 10px 5px;
            font-size: 0.8rem;
        }

        .private-sidebar .icon-custom {
            font-size: 0.9rem;
            margin-right: 10px;
        }

        .private-sidebar .sub-menu-item-custom {
            font-size: 0.7rem;
            padding: 8px 10px;
        }
    }
</style>

<div id="sidebar" class="private-sidebar">
    <div class="list-group list-group-flush">
        <a href="{{ route('dashboard') }}" class="list-group-item list-group-item-action d-flex align-items-center sidebar-item-custom">
            <i class="fas fa-home icon-custom"></i> Dashboard
        </a>
        <a href="#projectsSubmenu" data-bs-toggle="collapse" class="list-group-item list-group-item-action d-flex align-items-center sidebar-item-custom">
            <i class="fas fa-project-diagram icon-custom"></i> Projects
            <span class="sub-menu-indicator"><i class="fas fa-chevron-down"></i></span>
        </a>
        <div id="projectsSubmenu" class="collapse">
            <a href="{{ route('projectPenawarans.index') }}" class="list-group-item list-group-item-action d-flex align-items-center sub-menu-item-custom">
                <i class="fas fa-plus sub-menu-icon"></i> List Project
            </a>
            <a href="{{ route('penawarans.index') }}" class="list-group-item list-group-item-action d-flex align-items-center sub-menu-item-custom">
                <i class="fas fa-list sub-menu-icon"></i> List Penawaran
            </a>
        </div>
        <a href="#dataPenawaranSubmenu" data-bs-toggle="collapse" class="list-group-item list-group-item-action d-flex align-items-center sidebar-item-custom">
            <i class="fas fa-file-alt icon-custom"></i> Data Penawaran
            <span class="sub-menu-indicator"><i class="fas fa-chevron-down"></i></span>
        </a>
        <div id="dataPenawaranSubmenu" class="collapse">
            <a href="{{ route('penawarans.index') }}" class="list-group-item list-group-item-action d-flex align-items-center sub-menu-item-custom">
                <i class="fas fa-tags sub-menu-icon"></i> Penawaran
            </a>
            <a href="{{ route('jenisPenawarans.index') }}" class="list-group-item list-group-item-action d-flex align-items-center sub-menu-item-custom">
                <i class="fas fa-briefcase sub-menu-icon"></i> Jenis
            </a>
            <a href="{{ route('uraianJenisPekerjaanPenawarans.index') }}" class="list-group-item list-group-item-action d-flex align-items-center sub-menu-item-custom">
                <i class="fas fa-list sub-menu-icon"></i> Uraian
            </a>
        </div>
        <a href="#" class="list-group-item list-group-item-action d-flex align-items-center sidebar-item-custom">
            <i class="fas fa-chart-line icon-custom"></i> Analytics
        </a>
        <a href="#" class="list-group-item list-group-item-action d-flex align-items-center sidebar-item-custom">
            <i class="fas fa-cogs icon-custom"></i> Settings
        </a>
    </div>
</div> --}}
