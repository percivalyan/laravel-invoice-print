<!-- sidebar menu area start -->
@php
    $usr = Auth::guard('admin')->user();
@endphp
<div class="sidebar-menu">
    <div class="sidebar-header text-center">
        <div class="logo">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <img
                    src="{{ asset('images/brin.png') }}"
                    alt="Logo"
                    class="img-fluid rounded"
                    style="height: 50px; width: auto; max-height: 40px; padding: 5px; border-radius: 5px; background: #fff;"
                />
                <span class="ms-3 text-light" style="font-size: 14px; line-height: 1.2; margin-left: 12px;">
                    System Information of <br> Reliability and Safety
                </span>
            </a>
        </div>
    </div>

    <div class="main-menu">
        <div class="menu-inner">
            <nav>
                <ul class="metismenu" id="menu">
                    @if ($usr->can('dashboard.view'))
                        <li class="{{ Route::is('admin.dashboard') ? 'active' : '' }}">
                            <a href="javascript:void(0)" aria-expanded="true">
                                <i class="ti-dashboard"></i><span>Dashboard</span>
                            </a>
                            <ul class="collapse {{ Route::is('admin.dashboard') ? 'in' : '' }}">
                                <li class="{{ Route::is('admin.dashboard') ? 'active' : '' }}">
                                    <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                                </li>
                            </ul>
                        </li>
                    @endif

                    @if ($usr->can('role.create') || $usr->can('role.view') || $usr->can('role.edit') || $usr->can('role.delete'))
                        <li class="{{ Route::is('admin.roles.create') || Route::is('admin.roles.index') || Route::is('admin.roles.edit') || Route::is('admin.roles.show') ? 'active' : '' }}">
                            <a href="javascript:void(0)" aria-expanded="true">
                                <i class="fa fa-tasks"></i><span>Roles & Permissions</span>
                            </a>
                            <ul class="collapse {{ Route::is('admin.roles.create') || Route::is('admin.roles.index') || Route::is('admin.roles.edit') || Route::is('admin.roles.show') ? 'in' : '' }}">
                                @if ($usr->can('role.view'))
                                    <li class="{{ Route::is('admin.roles.index') || Route::is('admin.roles.edit') ? 'active' : '' }}">
                                        <a href="{{ route('admin.roles.index') }}">All Roles</a>
                                    </li>
                                @endif
                                @if ($usr->can('role.create'))
                                    <li class="{{ Route::is('admin.roles.create') ? 'active' : '' }}">
                                        <a href="{{ route('admin.roles.create') }}">Create Role</a>
                                    </li>
                                @endif
                            </ul>
                        </li>
                    @endif

                    @if ($usr->can('admin.create') || $usr->can('admin.view') || $usr->can('admin.edit') || $usr->can('admin.delete'))
                        <li class="{{ Route::is('admin.admins.create') || Route::is('admin.admins.index') || Route::is('admin.admins.edit') || Route::is('admin.admins.show') ? 'active' : '' }}">
                            <a href="javascript:void(0)" aria-expanded="true">
                                <i class="fa fa-user"></i><span>Admins</span>
                            </a>
                            <ul class="collapse {{ Route::is('admin.admins.create') || Route::is('admin.admins.index') || Route::is('admin.admins.edit') || Route::is('admin.admins.show') ? 'in' : '' }}">
                                @if ($usr->can('admin.view'))
                                    <li class="{{ Route::is('admin.admins.index') || Route::is('admin.admins.edit') ? 'active' : '' }}">
                                        <a href="{{ route('admin.admins.index') }}">All Admins</a>
                                    </li>
                                @endif
                                @if ($usr->can('admin.create'))
                                    <li class="{{ Route::is('admin.admins.create') ? 'active' : '' }}">
                                        <a href="{{ route('admin.admins.create') }}">Create Admin</a>
                                    </li>
                                @endif
                            </ul>
                        </li>
                    @endif

                    {{-- Teras / Core --}}
                    <li class="dropdown {{ request()->routeIs('teras.*') ? 'active' : '' }}">
                        <a href="javascript:void(0)" aria-expanded="true">
                            <i class="fas fa-layer-group"></i><span>Core</span>
                        </a>
                        <ul class="collapse {{ request()->routeIs('teras.*') ? 'in' : '' }}">
                            <li class="{{ request()->routeIs('teras.index') ? 'active' : '' }}">
                                <a href="{{ route('teras.index') }}">All Core</a>
                            </li>
                            <li class="{{ request()->routeIs('teras.create') ? 'active' : '' }}">
                                <a href="{{ route('teras.create') }}">Create Core</a>
                            </li>
                            <!-- Add more submenu items as needed -->
                        </ul>
                    </li>

                    {{-- Komponen --}}
                    <li class="dropdown {{ request()->routeIs('komponen.*') ? 'active' : '' }}">
                        <a href="javascript:void(0)" aria-expanded="true">
                            <i class="fas fa-cogs"></i><span>Key - Component</span>
                        </a>
                        <ul class="collapse {{ request()->routeIs('komponen.*') ? 'in' : '' }}">
                            <li class="{{ request()->routeIs('komponen.index') ? 'active' : '' }}">
                                <a href="{{ route('komponen.index') }}">All Components</a>
                            </li>
                            <li class="{{ request()->routeIs('komponen.filter') ? 'active' : '' }}">
                                <a href="{{ route('komponen.filter') }}">Component Filter List</a>
                            </li>
                            {{-- <li class="{{ request()->routeIs('komponen.keandalan') ? 'active' : '' }}">
                                <a href="{{ route('komponen.keandalan') }}">Component Reliability List</a>
                            </li>
                            <li class="{{ request()->routeIs('komponen.tetabeta') ? 'active' : '' }}">
                                <a href="{{ route('komponen.tetabeta') }}">Component Maintainability List</a>
                            </li> --}}
                            <li class="{{ request()->routeIs('komponen.create') ? 'active' : '' }}">
                                <a href="{{ route('komponen.create') }}">Create Component</a>
                            </li>
                            <li class="{{ request()->routeIs('komponen.import') ? 'active' : '' }}">
                                <a href="{{ route('komponen.import') }}">Import Component</a>
                            </li>
                            <!-- Add more submenu items as needed -->
                        </ul>
                    </li>

                    {{-- Waktu Operasional Komponen --}}
                    <li class="dropdown {{ request()->routeIs('waktu_ops_komponen.*') ? 'active' : '' }}">
                        <a href="javascript:void(0)" aria-expanded="true">
                            <i class="fas fa-clock"></i><span>Operational Time Comp.</span>
                        </a>
                        <ul class="collapse {{ request()->routeIs('waktu_ops_komponen.*') ? 'in' : '' }}">
                            <li class="{{ request()->routeIs('waktu_ops_komponen.index') ? 'active' : '' }}">
                                <a href="{{ route('waktu_ops_komponen.index') }}">All Operational Times</a>
                            </li>
                            <li class="{{ request()->routeIs('waktu_ops_komponen.create') ? 'active' : '' }}">
                                <a href="{{ route('waktu_ops_komponen.create') }}">Create Operational Time</a>
                            </li>
                            <li class="{{ request()->routeIs('waktu_ops_komponen.import') ? 'active' : '' }}">
                                <a href="{{ route('waktu_ops_komponen.import') }}">Import Operational Time</a>
                            </li>
                            <!-- Add more submenu items as needed -->
                        </ul>
                    </li>

                    {{-- Gangguan / Failure & Repair --}}
                    <li class="dropdown {{ request()->routeIs('gangguan.*') ? 'active' : '' }}">
                        <a href="javascript:void(0)" aria-expanded="true">
                            <i class="fas fa-tools"></i><span>Failure & Repair</span>
                        </a>
                        <ul class="collapse {{ request()->routeIs('gangguan.*') ? 'in' : '' }}">
                            <li class="{{ request()->routeIs('gangguan.index') ? 'active' : '' }}">
                                <a href="{{ route('gangguan.index') }}">All Failures</a>
                            </li>
                            <li class="{{ request()->routeIs('gangguan.create') ? 'active' : '' }}">
                                <a href="{{ route('gangguan.create') }}">Create Failure</a>
                            </li>
                            <li class="{{ request()->routeIs('gangguan.import') ? 'active' : '' }}">
                                <a href="{{ route('gangguan.import') }}">Import Failure</a>
                            </li>
                            <!-- Add more submenu items as needed -->
                        </ul>
                    </li>

                </ul>
            </nav>
        </div>
    </div>
</div>
<!-- sidebar menu area end -->
