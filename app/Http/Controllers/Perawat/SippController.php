<?php

namespace App\Http\Controllers\Perawat;

use App\Models\User;
use App\Models\Dokumen;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use App\Notifications\UploadSippNotification;

class SippController extends Controller
{
    public function index()
    {
        $data = Dokumen::select('*')
                ->join('pegawai', 'pegawai.id', '=', 'dokumen.pegawai_id')
                ->where('pegawai.user_id', auth()->user()->id)
                ->where('dokumen.jenis', 'sipp')
                ->orderBy('dokumen.created_at', 'DESC')
                ->get();
                
        Auth::user()->unreadNotifications->where('id', request('id'))->first()?->markAsRead();

        return view('perawat.dokumen.sipp.index', compact('data'));
    }

    public function upload()
    {
        return view('perawat.dokumen.sipp.upload');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'url' => 'required|mimes:pdf,jpg,jpeg,png|max:5120',
            'jenis' => 'required',
            'no_dokumen' => 'required|regex:/^\S*$/u|unique:dokumen,no_dokumen',
            'berlaku_sd' => 'required',
            // 'keterangan' => 'required'
        ], [
            'url.required' => 'Anda belum upload dokumen',
            'url.mimes' => 'file harus berupa pdf,jpg,jpeg,png',
            'url.max' => 'file terlalu besar, maksimal 5MB',
            'jenis.required' => 'Jenis dokumen tidak boleh kosong',
            'no_dokumen.required' => 'Nomor Dokumen tidak boleh kosong',
            'no_dokumen.regex' => 'No Dokumen tidak boleh ada spasi',
            'no_dokumen.unique' => 'No Dokumen sudah terdaftar',
            'berlaku_sd' => 'Masa berlaku Dokumen tidak boleh kosong', 
            // 'keterangan' => 'Keterangan Dokumen tidak boleh kosong'
        ]);

        $pegawai_id = Pegawai::orderBy('id', 'DESC')->select('id')->first();
        $pegawai_id = $pegawai_id->id;

        $jenis = $request->jenis;

        if ($request->hasFile('url')) {
            $file = $request->file('url');
            $ext = $file->getClientOriginalExtension();
            $nama_file = time().'.'.$ext;
            $file->move('uploads/dokumen/'.$jenis.'/', $nama_file);
        }

        $dataDokumen = [
            'pegawai_id' => $pegawai_id,
            'no_dokumen' => $request->no_dokumen,
            'url' => $nama_file,
            'jenis' => $jenis,
            'berlaku_sd' => $request->berlaku_sd,
            'keterangan' => $request->keterangan
        ];

        DB::beginTransaction();
        try {
            $dokumen = Dokumen::create($dataDokumen);
            $admin = User::where('type', 1)->get();
            Notification::send($admin, new UploadSippNotification($dokumen));
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('sipp.upload')->with('error', 'Gagal mengunggah dokumen SIPP, '.$th->getMessage());
        }

        return redirect()->route('sipp.index')->with('success', 'Berhasil mengunggah dokumen SIPP.');
    }
}
