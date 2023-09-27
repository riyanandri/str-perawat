<?php

namespace App\Http\Controllers\Perawat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dokumen;
use App\Models\Pegawai;
use Illuminate\Support\Facades\DB;


class DokumenController extends Controller
{
    public function index()
    {
        $data = Dokumen::orderBy('created_at', 'DESC')->get();

        return view('perawat.dokumen.index', compact('data'));
    }

    public function upload()
    {
        return view('perawat.dokumen.upload');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'url' => 'required|mimes:pdf,jpg,jpeg,png|max:5120',
            'jenis' => 'required',
            'no_dokumen' => 'required|regex:/^\S*$/u|unique:dokumen,no_dokumen',
            'berlaku_sd' => 'required',
            'keterangan' => 'required'
        ], [
            'url.required' => 'Anda belum upload dokumen',
            'url.mimes' => 'file harus berupa pdf,jpg,jpeg,png',
            'url.max' => 'file terlalu besar, maksimal 5MB',
            'jenis.required' => 'Jenis dokumen tidak boleh kosong',
            'no_dokumen.required' => 'Nomor Dokumen tidak boleh kosong',
            'no_dokumen.regex' => 'No Dokumen tidak boleh ada spasi',
            'no_dokumen.unique' => 'No Dokumen sudah terdaftar',
            'berlaku_sd' => 'Masa berlaku Dokumen tidak boleh kosong', 
            'keterangan' => 'Keterangan Dokumen tidak boleh kosong'
        ]);

        $pegawai_id = Pegawai::orderBy('id', 'DESC')->select('id')->first();
        $pegawai_id = $pegawai_id->id;

        $dokumen = new Dokumen();
        $dokumen->pegawai_id = $pegawai_id;
        $dokumen->no_dokumen = $request->no_dokumen;

        $jenis = $request->jenis;

        if ($request->hasFile('url')) {
            $file = $request->file('url');
            $ext = $file->getClientOriginalExtension();
            $nama_file = time().'.'.$ext;
            $file->move('uploads/dokumen/'.$jenis.'/', $nama_file);
            $dokumen->url = $nama_file;
        }

        $dokumen->jenis = $jenis;
        $dokumen->berlaku_sd = $request->berlaku_sd;
        $dokumen->keterangan = $request->keterangan;
        $dokumen->save();

        return redirect()->route('dokumenPerawat.index');
    }
}
