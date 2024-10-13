<?php

namespace App\Models\Kwitansi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatatanKwitansi extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_kwitansi_id',
        'bank_pembayaran',
        'cabang',
        'nomor_rekening',
        'atas_nama',
        'penanggung_jawab',
        'nama_penerima',
        'tanggal_diterima_penerima',
        'waktu_diterima_penerima',
        'nama_driver',
        'tanggal_diterima_driver',
        'waktu_diterima_driver',
        'nama_adm_kantor',
        'tanggal_diterima_adm_kantor',
        'waktu_diterima_adm_kantor',
    ];

    public function projectKwitansi()
    {
        return $this->belongsTo(ProjectKwitansi::class, 'project_kwitansi_id');
    }
}
