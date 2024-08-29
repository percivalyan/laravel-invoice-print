<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PekerjaanKwitansi extends Model
{
    use HasFactory;

    protected $table = 'pekerjaan_kwitansis';

    protected $fillable = [
        'project_kwitansi_id',
        'pekerjaan',
    ];

    public $timestamps = false;

    public function projectKwitansi()
    {
        return $this->belongsTo(ProjectKwitansi::class);
    }
}
