<?php

namespace App\Models\Pembelian;

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

    public function catatanPembelian()
    {
        return $this->hasOne(CatatanPembelian::class, 'project_pembelian_id');
    }

    public function footerPembelian()
    {
        return $this->hasOne(FooterPembelian::class, 'project_pembelian_id');
    }

    public function bahanPembelian()
    {
        return $this->hasMany(BahanPembelian::class, 'project_pembelian_id');
    }

    public function projectKwitansi()
    {
        return $this->hasOne(ProjectKwitansi::class, 'project_kwitansi_id');
    }
    
}
