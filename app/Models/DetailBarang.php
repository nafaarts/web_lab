<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailBarang extends Model
{
    use HasFactory;

    protected $table = 'detail_barang';
    protected $fillable = [
        'barang_id',
        'pelapor_id',
        'laporan_id',
        'kondisi',
        'keterangan',
        'approved',
        'tahun_ajaran',
        'semester'
    ];

    function barang()
    {
        return $this->belongsTo(Barang::class, 'barang_id');
    }

    function pelapor()
    {
        return $this->belongsTo(Pelapor::class, 'pelapor_id');
    }
}
