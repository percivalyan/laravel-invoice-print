<?php

namespace App\Models\Kwitansi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pembelian\ProjectPembelian;

class ProjectKwitansi extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_pembelian_id',
        'kepada_yth',
        'nomor_surat_jalan',
        'nomor_invoice',
        'nomor_bast',
        'proyek',
        'lokasi',
        'kendaraan',
        'nomor_polisi',
        'tanggal_surat_jalan',
    ];

    public function projectPembelian()
    {
        return $this->belongsTo(ProjectPembelian::class, 'project_pembelian_id');
    }

    // public function batchKwitansi()
    // {
    //     return $this->hasMany(BatchKwitansi::class);
    // }

    public function catatanKwitansi()
    {
        return $this->hasOne(CatatanKwitansi::class, 'project_kwitansi_id');
    }

    public function pekerjaanKwitansi()
    {
        return $this->hasMany(pekerjaanKwitansi::class, 'project_kwitansi_id');
    }
}
