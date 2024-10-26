<?php

declare(strict_types=1);

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

use App\Models\Pembelian\ProjectPembelian;
use App\Models\Kwitansi\ProjectKwitansi;
use App\Models\Penawaran\ProjectPenawaran;

class DashboardController extends Controller
{
    public function index()
    {
        $this->checkAuthorization(auth()->user(), ['dashboard.view']);

        return view(
            'backend.pages.dashboard.index',
            [
                'total_admins' => Admin::count(),
                'total_roles' => Role::count(),
                'total_permissions' => Permission::count(),
                'total_pembelian' => ProjectPembelian::count(),
                'total_penawaran' => ProjectPenawaran::count(),
                'total_kwitansi' => ProjectKwitansi::count(),
            ]
        );
    }
}
