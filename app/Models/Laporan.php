<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    use HasFactory;

    protected $table = 'laporan';

    protected $fillable = [
        'pelapor_id',
        'di_lihat'
    ];

    function pelapor()
    {
        return $this->belongsTo(Pelapor::class, 'pelapor_id');
    }

    function barang()
    {
        return $this->hasMany(DetailBarang::class, 'laporan_id');
    }

    function getTahunAjaranSemester()
    {
        return $this->barang()->first();
    }
}
