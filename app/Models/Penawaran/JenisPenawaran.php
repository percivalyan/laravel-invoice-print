<?php

namespace App\Models\Penawaran;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisPenawaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'jenis_pekerjaan',
        'quantitas',
        'unit',
        'harga_satuan',
    ];

    public function penawarans()
    {
        return $this->belongsToMany(Penawaran::class, 'jenis_penawaran_penawaran');
    }

    public function uraianJenisPekerjaanPenawarans()
    {
        return $this->hasMany(UraianJenisPekerjaanPenawaran::class);
    }
}
