<?php

namespace App\Models\Kwitansi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UraianKwitansi extends Model
{
    use HasFactory;

    protected $fillable = [
        'batch_kwitansi_id',
        'nama_uraian',
        'jumlah_uraian',
        'satuan_uraian',
        'keterangan_uraian',
    ];

    public function batchKwitansi()
    {
        return $this->belongsTo(BatchKwitansi::class, 'batch_kwitansi_id');
    }
}
