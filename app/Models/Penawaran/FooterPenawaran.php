<?php

namespace App\Models\Penawaran;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FooterPenawaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_penawaran_id',
        'nama',
        'jabatan',
    ];

    /**
     * Get the project penawaran that owns the footer penawaran.
     */
    public function projectPenawaran()
    {
        return $this->belongsTo(ProjectPenawaran::class);
    }
}
