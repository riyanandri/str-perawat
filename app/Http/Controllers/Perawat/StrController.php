<?php

namespace App\Http\Controllers\Perawat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Dokumen;
use App\Models\DetailStr;
use App\Models\Pegawai;

class StrController extends Controller
{
    public function index()
    {
        $data = DB::table('detail_str')
                    ->join('dokumen', 'dokumen.id', '=', 'detail_str.dok_id')
                    ->orderBy('detail_str.id', 'DESC')
                    ->get(['dokumen.url','detail_str.no_str','detail_str.berlaku_sd','detail_str.ket_str','dokumen.status_dokumen','detail_str.status_upload']);

        return view('perawat.dokumen.str.index', compact('data'));
    }

    public function create()
    {
        return view('perawat.dokumen.str.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'url' => 'required|mimes:pdf,jpg,jpeg,png|max:5120',
            'jenis' => 'required',
            'no_str' => 'required|regex:/^\S*$/u|unique:detail_str,no_str',
            'berlaku_sd' => 'required',
            'ket_str' => 'required'
        ], [
            'url.required' => 'Anda belum upload dokumen STR',
            'url.mimes' => 'file harus berupa pdf,jpg,jpeg,png',
            'url.max' => 'file terlalu besar, maksimal 5MB',
            'jenis.required' => 'Jenis dokumen tidak boleh kosong',
            'no_str.required' => 'Nomor STR tidak boleh kosong',
            'no_str.regex' => 'Nomor STR tidak boleh ada spasi',
            'no_str.unique' => 'Nomor STR sudah terdaftar',
            'berlaku_sd' => 'Masa berlaku STR tidak boleh kosong', 
            'ket_str' => 'Keterangan STR tidak boleh kosong'
        ]);

        $pegawai_id = Pegawai::orderBy('id', 'DESC')->select('id')->first();
        $pegawai_id = $pegawai_id->id;

        $dokumen = new Dokumen();
        $dokumen->pegawai_id = $pegawai_id;

        if ($request->hasFile('url')) {
            $file = $request->file('url');
            $nama_file = $file->getClientOriginalName();
            $file->storeAs('dokumen/str/', $nama_file);
            $dokumen->url = $nama_file;
        }

        $dokumen->jenis = $request->jenis;
        $dokumen->save();

        $dok_id = Dokumen::orderBy('id', 'DESC')->select('id')->first();
        $dok_id = $dok_id->id;

        $detail_str = new DetailStr();
        $detail_str->dok_id = $dok_id;
        $detail_str->no_str = $request->no_str;
        $detail_str->berlaku_sd = $request->berlaku_sd;
        $detail_str->ket_str = $request->ket_str;
        $detail_str->save();

        return redirect()->route('str.index');
    }
}
