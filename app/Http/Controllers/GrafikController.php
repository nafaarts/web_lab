<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\DetailBarang;
use Illuminate\Http\Request;

class GrafikController extends Controller
{
    public function index()
    {
        $detail = DetailBarang::where('approved', true)->groupBy('tahun_ajaran', 'semester')->get();

        $chart = $detail->map(function ($item) {
            $barangs = Barang::all()->map(function ($barang) use ($item) {
                $data = DetailBarang::where('tahun_ajaran', $item->tahun_ajaran)->where('semester', $item->semester)->where('approved', true)->where('barang_id', $barang->id)->latest()->first('kondisi');

                return $data ?? $barang->kondisi('kondisi') ?? ['kondisi' => 'baik'];
            });

            return [
                'label' => strtoupper($item->tahun_ajaran . ' ' . $item->semester),
                'jumlah_baik' => $barangs->where('kondisi', 'baik')->count(),
                'jumlah_rusak' => $barangs->where('kondisi', 'rusak')->count(),
                'jumlah_hilang' => $barangs->where('kondisi', 'hilang')->count(),
                'jumlah_total' => $barangs->count(),
            ];
        });

        return view('grafik', compact('chart'));
    }
}
