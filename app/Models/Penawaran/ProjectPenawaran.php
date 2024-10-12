<?php

namespace App\Models\Penawaran;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectPenawaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'kepada',
        'nomor',
        'tanggal',
        'proyek',
        'lokasi',
    ];

    public function penawaran()
    {
        return $this->hasMany(Penawaran::class, 'project_penawaran_id');
    }

    public function footerPenawaran()
    {
        return $this->hasOne(FooterPenawaran::class, 'project_penawaran_id');
    }

    public function tujuanPenawaran()
    {
        return $this->hasOne(TujuanPenawaran::class, 'project_penawaran_id');
    }
}
