<style>
    /* Sidebar Styles */
    #sidebar {
        background-color: #f8f9fa;
        border-right: 1px solid #dee2e6;
        height: 100vh;
        padding-top: 20px;
        width: 250px;
    }

    .sidebar-custom {
        font-size: 1rem;
    }

    .list-group-item-action {
        border: none;
        border-radius: 0;
        padding: 10px 20px;
        transition: background-color 0.3s, color 0.3s;
    }

    .sidebar-item-custom {
        display: flex;
        align-items: center;
        color: #495057;
        background-color: #f8f9fa;
    }

    .sidebar-item-custom:hover,
    .sidebar-item-custom.active {
        color: #007bff;
        background-color: #e9ecef;
    }

    .icon-custom {
        margin-right: 15px;
        font-size: 1.2rem;
    }

    .sub-menu-item-custom {
        padding-left: 40px;
        font-size: 0.9rem;
    }

    .sub-menu-item-custom:hover {
        color: #007bff;
        background-color: #e9ecef;
    }

    .sub-menu-icon {
        margin-right: 10px;
    }
</style>

<div id="sidebar" class="bg-light border-right sidebar-custom">
    <div class="list-group list-group-flush">
        <a href="{{ route('dashboard') }}" class="list-group-item list-group-item-action d-flex align-items-center sidebar-item-custom">
            <i class="fas fa-home icon-custom"></i> Dashboard
        </a>
        <a href="#projectsSubmenu" data-bs-toggle="collapse" class="list-group-item list-group-item-action d-flex align-items-center sidebar-item-custom">
            <i class="fas fa-project-diagram icon-custom"></i> Projects
        </a>
        <div id="projectsSubmenu" class="collapse">
            <a href="{{ route('projectPenawarans.index') }}"  class="list-group-item list-group-item-action d-flex align-items-center sub-menu-item-custom">
                <i class="fas fa-plus sub-menu-icon"></i> List Project
            </a>
            <a href="{{ route('penawarans.index') }}"  class="list-group-item list-group-item-action d-flex align-items-center sub-menu-item-custom">
                <i class="fas fa-list sub-menu-icon"></i> List Penawaran
            </a>
        </div>
        {{-- <a href="#dataPenawaranSubmenu" data-bs-toggle="collapse" class="list-group-item list-group-item-action d-flex align-items-center sidebar-item-custom">
            <i class="fas fa-file-alt icon-custom"></i> Data Penawaran
        </a>
        <div id="dataPenawaranSubmenu" class="collapse">
            <a href="{{ route('penawarans.index') }}" class="list-group-item list-group-item-action d-flex align-items-center sub-menu-item-custom">
                <i class="fas fa-tags sub-menu-icon"></i> Penawaran
            </a>
            <a href="{{ route('jenisPekerjaanPenawarans.index') }}" class="list-group-item list-group-item-action d-flex align-items-center sub-menu-item-custom">
                <i class="fas fa-briefcase sub-menu-icon"></i> Jenis
            </a>
            <a href="{{ route('uraianJenisPekerjaan.index') }}" class="list-group-item list-group-item-action d-flex align-items-center sub-menu-item-custom">
                <i class="fas fa-list sub-menu-icon"></i> Uraian
            </a>
        </div> --}}
        <a href="#" class="list-group-item list-group-item-action d-flex align-items-center sidebar-item-custom">
            <i class="fas fa-chart-line icon-custom"></i> Analytics
        </a>
        <a href="#" class="list-group-item list-group-item-action d-flex align-items-center sidebar-item-custom">
            <i class="fas fa-cogs icon-custom"></i> Settings
        </a>
    </div>
</div>
