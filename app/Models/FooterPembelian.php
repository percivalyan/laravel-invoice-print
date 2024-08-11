<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FooterPembelian extends Model
{
    use HasFactory;

    protected $table = 'footer_pembelians';

    protected $fillable = [
        'project_pembelian_id',
        'diorder_oleh',
        'diorder_oleh_jabatan',
        'disetujui_oleh',
        'disetujui_oleh_jabatan',
        'order_diterima_oleh',
        'order_diterima_oleh_jabatan',
    ];

    public function projectPembelian()
    {
        return $this->belongsTo(ProjectPembelian::class, 'project_pembelian_id');
    }
}
