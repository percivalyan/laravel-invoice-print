<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UraianJenisPekerjaanPenawaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'uraian',
        'jenis_pekerjaan',
        'quantitas',
        'unit',
        'harga_satuan',
    ];

    public function jenisPenawarans()
    {
        return $this->hasMany(JenisPenawaran::class, 'uraian_jenis_pekerjaan_penawaran_id');
    }
}
