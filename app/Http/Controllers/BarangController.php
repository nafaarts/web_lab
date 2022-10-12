<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\DetailBarang;
use App\Models\General;
use App\Models\Laboratorium;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Laboratorium $laboratorium, Request $request)
    {
        $barang = Barang::where([
            'laboratorium_id' => $laboratorium->id,
            'jenis_barang_id' => $request->jenis_barang,
        ])->count();

        $jumlah = $barang + $request->jumlah_barang;
        for ($i = $barang; $i < $jumlah; $i++) {
            Barang::create([
                'laboratorium_id' => $laboratorium->id,
                'jenis_barang_id' => $request->jenis_barang,
                'nomor_barang' => $i + 1
            ]);
        }

        return redirect()->route('laboratorium.show', $laboratorium)->with('success', 'Barang berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show(Laboratorium $laboratorium, Barang $barang)
    {
        $data_barang = $laboratorium->barang()->where('jenis_barang_id', $barang->jenis_barang_id)->get();
        return view('barang.index', compact('barang', 'data_barang', 'laboratorium'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit(Laboratorium $laboratorium, Barang $barang)
    {
        return view('barang.edit', compact('barang', 'laboratorium'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Laboratorium $laboratorium, Barang $barang)
    {
        $request->validate([
            'nomor_barang' => 'required',
            'kondisi' => 'required',
            'keterangan' => 'nullable'
        ]);

        $barang->update([
            'nomor_barang' => $request->nomor_barang
        ]);

        $general = General::first();

        if ($request->kondisi != $barang->kondisi()?->kondisi) {
            DetailBarang::create([
                'barang_id' => $barang->id,
                'kondisi' => $request->kondisi,
                'keterangan' => $request->keterangan,
                'approved' => true,
                'tahun_ajaran' => $general->tahun_ajaran,
                'semester' => $general->semester,
            ]);
        }

        return redirect()->route('laboratorium.barang.show', [$laboratorium, $barang])->with('success', 'Barang berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Laboratorium $laboratorium, Barang $barang)
    {
        $barang->delete();

        $barang_lain = Barang::where([
            'laboratorium_id' => $laboratorium->id,
            'jenis_barang_id' => $barang->jenis_barang_id,
        ])->get();

        if ($barang_lain->count() > 0) {
            return redirect()->route('laboratorium.barang.show', [$laboratorium, $barang_lain->first()])->with('success', 'Barang berhasil dihapus!');
        }
        return redirect()->route('laboratorium.show', $laboratorium)->with('success', 'Barang berhasil dihapus!');
    }
}
