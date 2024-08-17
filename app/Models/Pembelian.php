<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    use HasFactory;

    protected $table = 'pembelians';

    protected $fillable = [
        'project_pembelian_id',
        'nama_bahan',
        'keterangan',
        'jumlah',
        'harga_satuan',
    ];

    public function bahanPembelian()
    {
        return $this->hasOne(BahanPembelian::class, 'bahan_pembelian_id');
    }
}
