<?php

namespace App\Models\Penawaran;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penawaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_penawaran_id',
        'pekerjaan',
        'quantitas',
        'unit',
        'harga_satuan',
    ];

    public function projectPenawaran()
    {
        return $this->belongsTo(ProjectPenawaran::class);
    }

    public function jenisPenawarans()
    {
        return $this->belongsToMany(JenisPenawaran::class, 'jenis_penawaran_penawaran');
    }
}
