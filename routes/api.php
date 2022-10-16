<?php

use App\Models\User;
use App\Models\General;
use App\Models\Laporan;
use App\Models\Pelapor;
use App\Models\DetailBarang;
use App\Models\Laboratorium;
use Illuminate\Http\Request;
use App\Notifications\EmailLaporan;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Notification;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/notification', function () {
    return Laporan::where("di_lihat", false)->count();
});

// data laboratorium
Route::get('laboratorium', function () {
    return Laboratorium::all()->map(function ($item) {
        return [
            'nomor' => $item->nomor,
            'image' => asset('images/laboratorium/' . $item->image)
        ];
    });
});

// detail laboratorium
Route::get('laboratorium/{laboratorium:nomor}', function (Laboratorium $laboratorium) {
    return [
        'nomor' => $laboratorium->nomor,
        'image' => asset('images/laboratorium/' . $laboratorium->image)
    ];
});

// data asset laboratorium
Route::get('laboratorium/{laboratorium:nomor}/barang', function (Laboratorium $laboratorium) {
    $barang = $laboratorium->barang()->groupBy('jenis_barang_id')->get();
    return $barang->map(function ($item) {
        return [
            'id' => $item->jenis_barang_id,
            'nama' => $item->jenis_barang->nama_barang
        ];
    });
});

// detail asset
Route::get('laboratorium/{laboratorium:nomor}/barang/{jenis_barang}', function (Laboratorium $laboratorium, $jenis_barang) {
    $barang = $laboratorium->barang()->where('jenis_barang_id', $jenis_barang)->get();
    return $barang->map(function ($item) {
        return [
            ...collect($item)->except('created_at', 'updated_at'),
            'kondisi' => $item->kondisi()?->kondisi,
            'keterangan' => $item->kondisi()?->keterangan,
        ];
    });
});

Route::post('laporan', function (Request $request) {
    $bodyContent = $request->getContent();

    $data = json_decode($bodyContent);

    try {
        // check jika pelapor ada di data
        $pelapor = Pelapor::where('nim', $data->pelapor?->nim)->first();
        if ($pelapor == null) {
            $pelapor = Pelapor::create([
                'nama' => $data->pelapor->nama,
                'nim' => $data->pelapor->nim,
                'email' => $data->pelapor->email
            ]);
        }

        $laporan = Laporan::create([
            'pelapor_id' => $pelapor->id
        ]);

        $general = General::first();

        foreach ($data->barang as $item) {
            DetailBarang::create([
                'barang_id' => $item->barang_id,
                'pelapor_id' => $pelapor->id,
                'laporan_id' => $laporan->id,
                'kondisi' => $item->kondisi,
                'keterangan' => $item->keterangan,
                'tahun_ajaran' => $general->tahun_ajaran,
                'semester' => $general->semester,
            ]);
        }

        $admin = User::all();
        $details = [
            'greeting' => 'Laporan Baru!',
            'body' => $pelapor->nama . ' melaporkan ' . count($data->barang) . ' barang',
            'actiontext' => 'Lihat Laporan',
            'actionurl' => route('laporan.show', $laporan),
        ];

        Notification::send($admin, new EmailLaporan($details));

        return response()->json([
            'message' => 'success',
        ], 200);
    } catch (\Throwable $th) {
        return response()->json([
            'message' => $th->getMessage(),
        ], 500);
    }
});
