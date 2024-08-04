<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TujuanPenawaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_penawaran_id',
        'pengajuan',
        'tujuan',
    ];

    public function projectPenawaran()
    {
        return $this->belongsTo(ProjectPenawaran::class, 'project_penawaran_id');
    }
}
