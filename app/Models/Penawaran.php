<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penawaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_penawaran_id',
        'jenis_penawaran_id',
        'pekerjaan',
        'quantitas',
        'unit',
        'harga_satuan',
    ];

    public function projectPenawaran()
    {
        return $this->belongsTo(ProjectPenawaran::class, 'project_penawaran_id');
    }

    public function jenisPenawaran()
    {
        return $this->belongsTo(JenisPenawaran::class, 'jenis_penawaran_id');
    }
}
