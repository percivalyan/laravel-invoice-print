<?php

namespace App\Models\Penawaran;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UraianJenisPekerjaanPenawaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'jenis_penawaran_id',
        'uraian',
        'jenis_pekerjaan',
        'quantitas',
        'unit',
        'harga_satuan',
    ];

    public function jenisPenawaran()
    {
        return $this->belongsTo(JenisPenawaran::class);
    }
}
