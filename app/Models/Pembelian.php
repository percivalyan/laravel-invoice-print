<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    use HasFactory;

    protected $table = 'pembelians';

    protected $fillable = [
        'bahan_pembelian_id',
        'nama_bahan',
        'keterangan',
        'jumlah',
        'harga_satuan',
    ];

    /**
     * Get the bahan pembelian that owns the Pembelian.
     */
    public function bahanPembelian()
    {
        return $this->belongsTo(BahanPembelian::class, 'bahan_pembelian_id');
    }
}
