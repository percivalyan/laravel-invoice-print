<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class BatchPekerjaanKwitansi extends Pivot
{
    protected $table = 'batch_pekerjaan_kwitansi';

    // If you need to add any specific attributes, you can define them here
    protected $fillable = [
        'batch_kwitansi_id',
        'pekerjaan_kwitansi_id',
    ];

    // If you want to define any relationships, you can do so here
    public function batchKwitansi()
    {
        return $this->belongsTo(BatchKwitansi::class);
    }

    public function pekerjaanKwitansi()
    {
        return $this->belongsTo(PekerjaanKwitansi::class);
    }
    
}
