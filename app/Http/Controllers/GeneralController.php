<?php

namespace App\Http\Controllers;

use App\Models\General;
use Illuminate\Http\Request;

class GeneralController extends Controller
{

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\General  $general
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $data = General::first();
        return view('general', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\General  $general
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'tahun_ajaran' => 'required',
            'semester' => 'required',
            'kaprodi' => 'required',
            'nrp_kaprodi' => 'required',
            'kalab' => 'required',
            'nrp_kalab' => 'required',
        ]);

        $data = General::first();
        if (!$data) {
            General::create([
                'tahun_ajaran' => $request->tahun_ajaran,
                'semester' => $request->semester,
                'kaprodi' => $request->kaprodi,
                'nrp_kaprodi' => $request->nrp_kaprodi,
                'kalab' => $request->kalab,
                'nrp_kalab' => $request->nrp_kalab,
            ]);
        } else {
            $data->update([
                'tahun_ajaran' => $request->tahun_ajaran,
                'semester' => $request->semester,
                'kaprodi' => $request->kaprodi,
                'nrp_kaprodi' => $request->nrp_kaprodi,
                'kalab' => $request->kalab,
                'nrp_kalab' => $request->nrp_kalab,
            ]);
        }

        return redirect()->route('general.edit')->with('success', 'Data general berhasil diubah!');
    }
}
