<?php

namespace App\Models\Pembelian;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatatanPembelian extends Model
{
    use HasFactory;

    protected $table = 'catatan_pembelians';

    protected $fillable = [
        'project_pembelian_id',
        'waktu_pengiriman',
        'alamat_pengiriman',
        'contact_person',
        'pembayaran',
    ];

    public function projectPembelian()
    {
        return $this->belongsTo(ProjectPembelian::class);
    }
}
