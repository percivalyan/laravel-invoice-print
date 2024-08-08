<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisPenawaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'uraian_jenis_pekerjaan_penawaran_id',
        'jenis_pekerjaan',
        'quantitas',
        'unit',
        'harga_satuan',
    ];

    public function uraianJenisPekerjaanPenawaran()
    {
        return $this->belongsTo(UraianJenisPekerjaanPenawaran::class, 'uraian_jenis_pekerjaan_penawaran_id');
    }

    public function penawarans()
    {
        return $this->hasMany(Penawaran::class, 'jenis_penawaran_id');
    }
}
