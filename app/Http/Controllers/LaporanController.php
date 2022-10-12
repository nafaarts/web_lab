<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $laporan = Laporan::latest()->get();
        return view('laporan.index', compact('laporan'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function show(Laporan $laporan)
    {
        if ($laporan->di_lihat == false) {
            $laporan->update(['di_lihat' => true]);
        }
        return view('laporan.show', compact('laporan'));
    }

    /**
     * Setujui the specified resource from storage.
     *
     * @param  \App\Models\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function persetujuan(Laporan $laporan)
    {
        $laporan->barang->each(function ($item) {
            return $item->update(['approved' => true]);
        });

        return redirect()->route('laporan.show', $laporan)->with('success', 'Laporan berhasil disetujui');
    }

    public function tolak(Laporan $laporan)
    {
        $laporan->barang->each(function ($item) {
            return $item->update(['approved' => false]);
        });

        return redirect()->route('laporan.show', $laporan)->with('success', 'Laporan berhasil ditolak');
    }
}
