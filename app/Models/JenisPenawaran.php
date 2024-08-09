<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisPenawaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'penawaran_id',
        'jenis_pekerjaan',
        'quantitas',
        'unit',
        'harga_satuan',
    ];

    public function penawaran()
    {
        return $this->belongsTo(Penawaran::class);
    }

    public function uraianJenisPekerjaanPenawarans()
    {
        return $this->hasMany(UraianJenisPekerjaanPenawaran::class);
    }
}
