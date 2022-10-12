<?php

namespace App\Http\Controllers;

use App\Models\General;
use App\Models\JenisBarang;
use App\Models\Laboratorium;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class LaboratoriumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $laboratorium = Laboratorium::all();
        return view('laboratorium.index', compact('laboratorium'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('laboratorium.create');
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
            'nomor' => 'required|unique:laboratorium,nomor',
            'image' => 'required|image'
        ]);

        $image = time() . $request->image->getClientOriginalName();
        $request->image->move(public_path('images/laboratorium'), $image);

        Laboratorium::create([
            'nomor' => $request->nomor,
            'image' => $image
        ]);

        return redirect()->route('laboratorium.index')->with('success', 'Laboratorium berhasil di tambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Laboratorium  $laboratorium
     * @return \Illuminate\Http\Response
     */
    public function show(Laboratorium $laboratorium)
    {
        $jenis_barang = JenisBarang::all();
        $barang = $laboratorium->barang()->groupBy('jenis_barang_id')->get(['id', 'jenis_barang_id', DB::raw('count(*) as total')]);
        return view('laboratorium.detail', compact('laboratorium', 'jenis_barang', 'barang'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Laboratorium  $laboratorium
     * @return \Illuminate\Http\Response
     */
    public function edit(Laboratorium $laboratorium)
    {
        return view('laboratorium.edit', compact('laboratorium'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Laboratorium  $laboratorium
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Laboratorium $laboratorium)
    {
        $request->validate([
            'nomor' => 'required|unique:laboratorium,nomor,' . $laboratorium->id,
            'image' => 'nullable|image'
        ]);

        if ($request->has('image')) {
            File::delete(public_path('images/laboratorium/') . $laboratorium->image);
            $image = time() . $request->image->getClientOriginalName();
            $request->image->move(public_path('images/laboratorium'), $image);
        }

        $laboratorium->update([
            'nomor' => $request->nomor,
            'image' => $image ?? $laboratorium->image
        ]);

        return redirect()->route('laboratorium.index')->with('success', 'Laboratorium berhasil di ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Laboratorium  $laboratorium
     * @return \Illuminate\Http\Response
     */
    public function destroy(Laboratorium $laboratorium)
    {
        File::delete(public_path('images/laboratorium/') . $laboratorium->image);
        $laboratorium->delete();

        return redirect()->route('laboratorium.index')->with('success', 'Laboratorium berhasil di hapus');
    }

    public function print(Laboratorium $laboratorium)
    {
        $barang = $laboratorium->barang()->groupBy('jenis_barang_id')->get(['id', 'jenis_barang_id']);

        $result = $barang->map(function ($item) use ($laboratorium) {
            $jenis_barang = JenisBarang::find($item->jenis_barang_id);
            $data = $laboratorium->barang()->where('jenis_barang_id', $item->jenis_barang_id)->get()->map(function ($item) {
                return [
                    'kondisi' => $item->kondisi()->kondisi ?? 'baik'
                ];
            });
            return [
                'nama_barang' => $jenis_barang->nama_barang,
                'jumlah' => count($data),
                'baik' => collect($data)->where("kondisi", "baik")->count(),
                'rusak' => collect($data)->where("kondisi", "rusak")->count(),
                'hilang' => collect($data)->where("kondisi", "hilang")->count(),
            ];
        });

        $general = General::first();

        return view('laboratorium.print', compact('laboratorium', 'result', 'general'));
    }
}
