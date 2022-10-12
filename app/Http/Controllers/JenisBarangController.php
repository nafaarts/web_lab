<?php

namespace App\Http\Controllers;

use App\Models\JenisBarang;
use Illuminate\Http\Request;

class JenisBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jenisBarang = JenisBarang::paginate();
        return view('jenis-barang.index', compact('jenisBarang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jenis-barang.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required'
        ]);

        JenisBarang::create(['nama_barang' => $request->nama_barang]);

        return redirect()->route('jenis-barang.index')->with('success', 'Jenis barang berhasil ditambah');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JenisBarang  $jenis_barang
     * @return \Illuminate\Http\Response
     */
    public function edit(JenisBarang $jenis_barang)
    {
        return view('jenis-barang.edit', compact('jenis_barang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\JenisBarang  $jenis_barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JenisBarang $jenis_barang)
    {
        $request->validate([
            'nama_barang' => 'required'
        ]);

        $jenis_barang->update(['nama_barang' => $request->nama_barang]);

        return redirect()->route('jenis-barang.index')->with('success', 'Jenis barang berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JenisBarang  $jenis_barang
     * @return \Illuminate\Http\Response
     */
    public function destroy(JenisBarang $jenis_barang)
    {
        $jenis_barang->delete();
        return redirect()->route('jenis-barang.index')->with('success', 'Jenis barang berhasil dihapus');
    }
}
