<?php

namespace App\Http\Controllers\Admin;

use App\Models\Dokumen;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DokController extends Controller
{
    public function index()
    {
        $dataSipp = Dokumen::with('pegawai')
                    ->where('jenis', '=', 'sipp')
                    ->orderBy('created_at', 'DESC')
                    ->get();
        
        $dataSpkk = Dokumen::with('pegawai')
                    ->where('jenis', '=', 'spkk')
                    ->orderBy('created_at', 'DESC')
                    ->get();

        $dataStr = Dokumen::with('pegawai')
                    ->where('jenis', '=', 'str')
                    ->orderBy('created_at', 'DESC')
                    ->get();

        // $dataStr = DB::table('pegawai')
        //         ->join('users', 'users.id', '=', 'pegawai.user_id')
        //         ->join('profesi', 'profesi.id', '=', 'pegawai.profesi_id')
        //         ->join('ruangan', 'ruangan.id', '=', 'pegawai.ruangan_id')
        //         ->join('dokumen', function($join){
        //             $join->on('pegawai.id', '=', 'dokumen.pegawai_id')
        //                  ->where('dokumen.jenis', '=', 'str')
        //                  ->orderBy('dokumen.created_at', 'DESC');
        //         })->get();
        
        // $dataSipp = DB::table('pegawai')
        //         ->join('users', 'users.id', '=', 'pegawai.user_id')
        //         ->join('profesi', 'profesi.id', '=', 'pegawai.profesi_id')
        //         ->join('ruangan', 'ruangan.id', '=', 'pegawai.ruangan_id')
        //         ->join('dokumen', function($join){
        //             $join->on('pegawai.id', '=', 'dokumen.pegawai_id')
        //                  ->where('dokumen.jenis', '=', 'sipp')
        //                  ->orderBy('dokumen.created_at', 'DESC');
        //         })->get();

        // $dataSpkk = DB::table('pegawai')
        //         ->join('users', 'users.id', '=', 'pegawai.user_id')
        //         ->join('profesi', 'profesi.id', '=', 'pegawai.profesi_id')
        //         ->join('ruangan', 'ruangan.id', '=', 'pegawai.ruangan_id')
        //         ->join('dokumen', function($join){
        //             $join->on('pegawai.id', '=', 'dokumen.pegawai_id')
        //                  ->where('dokumen.jenis', '=', 'spkk')
        //                  ->orderBy('dokumen.created_at', 'DESC');
        //         })->get(); 

        return view('admin.dokumen.index', [
            'dataSipp' => $dataSipp,
            'dataSpkk' => $dataSpkk,
            'dataStr' => $dataStr
        ]);
    }

    public function updateStatus(Request $request)
    {
        $id = $request->id;
        $dokumen = Dokumen::find($id);
        $dokumen->status = $request->status;
        $dokumen->update();

        return redirect()->route('dokumenAdmin.index');
    }
}
