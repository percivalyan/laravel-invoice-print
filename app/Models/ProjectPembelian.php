<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectPembelian extends Model
{
    use HasFactory;

    protected $table = 'project_pembelians';

    protected $fillable = [
        'nomor_po',
        'project',
        'tanggal_order',
        'metode_pembayaran',
        'po_ditunjukan_kepada',
        'alamat',
        'kontak',
        'email_mobile_number',
    ];

    public function pembelians()
    {
        return $this->hasMany(Pembelian::class, 'project_pembelian_id');
    }

    public function catatanPembelians()
    {
        return $this->hasMany(CatatanPembelian::class, 'project_pembelian_id');
    }

    public function footerPembelians()
    {
        return $this->hasMany(FooterPembelian::class, 'project_pembelian_id');
    }
}
