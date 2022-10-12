<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'barang';
    protected $fillable = [
        'laboratorium_id',
        'jenis_barang_id',
        'nomor_barang'
    ];

    function laboratorium()
    {
        return $this->belongsTo(Laboratorium::class, 'laboratorium_id');
    }

    function jenis_barang()
    {
        return $this->belongsTo(JenisBarang::class, 'jenis_barang_id');
    }

    function kondisi($params = '*')
    {
        return $this->hasMany(DetailBarang::class)->latest()->where('approved', true)->first($params);
    }
}
