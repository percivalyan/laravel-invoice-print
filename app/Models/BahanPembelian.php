<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BahanPembelian extends Model
{
    use HasFactory;

    protected $table = 'bahan_pembelians';

    protected $fillable = [
        'project_pembelian_id',
        'pembelian',
    ];

    /**
     * Get the project pembelian that owns the BahanPembelian.
     */
    public function projectPembelian()
    {
        return $this->belongsTo(ProjectPembelian::class);
    }

    /**
     * Get the pembelians for the bahan pembelian.
     */
    public function pembelians()
    {
        return $this->hasMany(Pembelian::class, 'bahan_pembelian_id');
    }
}
