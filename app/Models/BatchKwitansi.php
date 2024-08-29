<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BatchKwitansi extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_kwitansi_id',
        'nama_batch',
        'jumlah_batch',
        'satuan_batch',
        'keterangan_batch',
        'dimensi_panjang',
        'dimensi_lebar',
        'dimensi_tinggi',
        'dimensi_berat',
    ];

    // public function projectKwitansi()
    // {
    //     return $this->belongsTo(ProjectKwitansi::class);
    // }

    public function uraianKwitansis()
    {
        return $this->hasMany(UraianKwitansi::class, 'batch_kwitansi_id');
    }
}
