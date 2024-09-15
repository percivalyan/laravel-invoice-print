<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BatchKwitansiProjectKwitansi extends Model
{
    use HasFactory;

    protected $table = 'batch_kwitansi_project_kwitansis'; // The pivot table name

    protected $fillable = [
        'batch_kwitansi_id',
        'project_kwitansi_id',
    ];

    // Define the relationship with the BatchKwitansi model
    public function batchKwitansi()
    {
        return $this->belongsTo(BatchKwitansi::class, 'batch_kwitansi_id');
    }

    // Define the relationship with the ProjectKwitansi model
    public function projectKwitansi()
    {
        return $this->belongsTo(ProjectKwitansi::class, 'project_kwitansi_id');
    }
}
