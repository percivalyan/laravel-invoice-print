<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BahanPembelian extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'project_pembelian_id',
        'pembelian',
    ];

    public function pembelian()
    {
        return $this->belongsTo(Pembelian::class, 'pembelian_id');
    }

    public function projectPembelian()
    {
        return $this->belongsTo(ProjectPembelian::class, 'project_pembelian_id');
    }
}
