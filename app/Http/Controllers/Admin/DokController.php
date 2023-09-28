<?php

namespace App\Http\Controllers\Admin;

use App\Models\Dokumen;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notifications\SippKonfirmasiNotification;
use Illuminate\Support\Facades\Auth;

class DokController extends Controller
{
    public function sipp()
    {
        $dataSipp = Dokumen::orderBy('created_at', 'DESC')
                    ->where('jenis', 'sipp')
                    ->get();
                 
        return view('admin.dokumen.sipp', compact('dataSipp'));
    }

    public function detailSipp($id)
    {
        $sipp = Dokumen::with('pegawai', 'pegawai.user', 'pegawai.profesi', 'pegawai.ruangan')
                ->where('id', $id)
                ->first();

        Auth::user()->unreadNotifications->where('id', request('id'))->first()?->markAsRead();

        return view('admin.dokumen.detail_sipp', compact('sipp'));
    }

    public function sippUpdateStatus(Request $request)
    {
        $id = $request->id;
        $dokumen = Dokumen::find($id);
        $pegawai = $dokumen->pegawai->user;
        $pegawai->notify(new SippKonfirmasiNotification($dokumen));
        $dokumen->status = $request->status;
        $dokumen->update();


        return redirect()->route('dokumenAdmin.sipp')->with('success', 'Status dokumen sipp berhasil diperbarui.');
    }

    public function spkk()
    {
        $dataSpkk = Dokumen::with('pegawai')
                    ->where('jenis', '=', 'spkk')
                    ->orderBy('created_at', 'DESC')
                    ->get();
        return view('admin.dokumen.spkk', compact('dataSpkk'));
    }

    public function spkkUpdateStatus(Request $request)
    {
        $id = $request->id;
        $dokumen = Dokumen::find($id);
        $dokumen->status = $request->status;
        $dokumen->update();

        return redirect()->route('dokumenAdmin.sipp')->with('success', 'Status dokumen spkk berhasil diperbarui.');
    }

    public function str()
    {
        $dataStr = Dokumen::with('pegawai')
                    ->where('jenis', '=', 'str')
                    ->orderBy('created_at', 'DESC')
                    ->get();
        return view('admin.dokumen.str', compact('dataStr'));
    }

    public function strUpdateStatus(Request $request)
    {
        $id = $request->id;
        $dokumen = Dokumen::find($id);
        $dokumen->status = $request->status;
        $dokumen->update();

        return redirect()->route('dokumenAdmin.sipp')->with('success', 'Status dokumen str berhasil diperbarui.');
    }

    // public function index()
    // {
    //     $dataSipp = Dokumen::with('pegawai')
    //                 ->where('jenis', '=', 'sipp')
    //                 ->orderBy('created_at', 'DESC')
    //                 ->get();
        
    //     $dataSpkk = Dokumen::with('pegawai')
    //                 ->where('jenis', '=', 'spkk')
    //                 ->orderBy('created_at', 'DESC')
    //                 ->get();

    //     $dataStr = Dokumen::with('pegawai')
    //                 ->where('jenis', '=', 'str')
    //                 ->orderBy('created_at', 'DESC')
    //                 ->get();

    //     // $dataStr = DB::table('pegawai')
    //     //         ->join('users', 'users.id', '=', 'pegawai.user_id')
    //     //         ->join('profesi', 'profesi.id', '=', 'pegawai.profesi_id')
    //     //         ->join('ruangan', 'ruangan.id', '=', 'pegawai.ruangan_id')
    //     //         ->join('dokumen', function($join){
    //     //             $join->on('pegawai.id', '=', 'dokumen.pegawai_id')
    //     //                  ->where('dokumen.jenis', '=', 'str')
    //     //                  ->orderBy('dokumen.created_at', 'DESC');
    //     //         })->get();

    //     return view('admin.dokumen.index', [
    //         'dataSipp' => $dataSipp,
    //         'dataSpkk' => $dataSpkk,
    //         'dataStr' => $dataStr
    //     ]);
    // }
}
