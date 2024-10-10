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

    // Define the many-to-many relationship with BatchKwitansi
    public function batchKwitansis()
    {
        return $this->belongsToMany(BatchKwitansi::class, 'batch_pekerjaan_kwitansi')
            ->withTimestamps(); // Include timestamps for pivot table
    }

    // Define the relationship to the pivot model (BatchPekerjaanKwitansi)
    public function batchPekerjaanKwitansi()
    {
        return $this->hasMany(BatchPekerjaanKwitansi::class, 'pekerjaan_kwitansi_id');
    }
}
