<?php

namespace App\Models\Kwitansi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BatchKwitansi extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_batch',
        'jumlah_batch',
        'satuan_batch',
        'keterangan_batch',
        'dimensi_panjang',
        'dimensi_lebar',
        'dimensi_tinggi',
        'dimensi_berat',
    ];

    // Define the many-to-many relationship with PekerjaanKwitansi
    public function pekerjaanKwitansis()
    {
        return $this->belongsToMany(PekerjaanKwitansi::class, 'batch_pekerjaan_kwitansi')
            ->withTimestamps(); // Include timestamps for pivot table
    }

    public function uraianKwitansis()
    {
        return $this->hasMany(UraianKwitansi::class, 'batch_kwitansi_id');
    }
}
