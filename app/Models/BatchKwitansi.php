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

    public function uraianKwitansis()
    {
        return $this->hasMany(UraianKwitansi::class, 'batch_kwitansi_id');
    }

    // Define many-to-many relationship with ProjectKwitansi using a pivot table
    public function projectKwitansis()
    {
        return $this->belongsToMany(ProjectKwitansi::class, 'batch_kwitansi_project_kwitansis', 'batch_kwitansi_id', 'project_kwitansi_id')
                    ->withTimestamps(); // Automatically manage created_at and updated_at fields
    }
}
