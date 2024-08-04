<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penawaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_penawaran_id',
        'uraian',
        'qty',
        'unit',
        'harga_satuan',
        'jumlah',
        'total',
        'terbilang',
    ];

    public function projectPenawaran()
    {
        return $this->belongsTo(ProjectPenawaran::class, 'project_penawaran_id');
    }
}
