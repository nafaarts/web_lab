<?php

namespace App\Http\Controllers;

use App\Models\Pelapor;
use Illuminate\Http\Request;

class PelaporController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pelapor = Pelapor::latest()->paginate();
        return view('pelapor.index', compact('pelapor'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pelapor  $pelapor
     * @return \Illuminate\Http\Response
     */
    public function show(Pelapor $pelapor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pelapor  $pelapor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pelapor $pelapor)
    {
        $pelapor->delete();
        return redirect()->route('pelapor.index')->with('success', 'Pelapor berhasil dihapus!');
    }
}
