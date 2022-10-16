<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\JenisBarang;
use App\Models\Laboratorium;
use App\Models\Pelapor;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $databarang = Barang::all();

        $databarang->map(function ($item) {
            $item->kondisi = $item->kondisi()->kondisi ?? 'baik';
            return $item;
        });

        $jenis_barang = JenisBarang::count();
        $jumlah_lab = Laboratorium::count();
        $jumlah_pelapor = Pelapor::count();
        $total_barang = $databarang->count();
        $total_barang_baik = $databarang->where('kondisi', 'baik')->count();
        $total_barang_rusak = collect($databarang)->where('kondisi', 'rusak')->all();

        // return $total_barang_rusak;
        $total_barang_hilang = collect($databarang)->where('kondisi', 'hilang')->all();

        return view('home', compact('jenis_barang', 'jumlah_lab', 'jumlah_pelapor', 'total_barang', 'total_barang_baik', 'total_barang_rusak', 'total_barang_hilang'));
    }
}
