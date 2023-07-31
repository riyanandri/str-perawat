<?php

namespace App\Http\Controllers\Perawat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pegawai;
use Illuminate\Support\Facades\DB;

class PegawaiController extends Controller
{
    public function completeAccount()
    {
        $status_pegawai = DB::table('status_pegawai')->get();
        $profesi = DB::table('profesi')->get();
        $ruang = DB::table('ruangan')->get();
        $pk = DB::table('jenis_pk')->get();
        $area = DB::table('area')->get();

        $pegawai = DB::table('pegawai')
                    ->join('status_pegawai', 'status_pegawai.id', '=', 'pegawai.status_id')
                    ->join('profesi', 'profesi.id', '=', 'pegawai.profesi_id')
                    ->join('ruangan', 'ruangan.id', '=', 'pegawai.ruangan_id')
                    ->join('jenis_pk', 'jenis_pk.id', '=', 'pegawai.pk_id')
                    ->join('area', 'area.id', '=', 'pegawai.area_id')
                    ->get();
        return view('perawat.lengkapi_akun', [
            'pegawai' => $pegawai,
            'status_pegawai' => $status_pegawai,
            'profesi' => $profesi,
            'ruang' => $ruang,
            'pk' => $pk,
            'area' => $area
        ]);
    }

    public function save(Request $request)
    {
        $request->validate([
            'nip' => 'required|regex:/^\S*$/u|unique:pegawai,nip',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'pend_terakhir' => 'required',
            'alamat' => 'required',
        ],[
            'nip.required' => 'Anda belum mengisi NIP',
            'nip.regex' => 'NIP tidak boleh ada spasi',
            'nip.unique' => 'NIP tersebut sudah terdaftar',
            'tempat_lahir' => 'Anda belum mengisi tempat lahir',
            'tgl_lahir' => 'Anda belum mengisi tanggal lahir',
            'pend_terakhir' => 'Anda belum mengisi pendidikan terakhir',
            'alamat' => 'Anda belum mengisi alamat',
        ]);

        $pegawai = new Pegawai;

        $pegawai->nip = $request->input('nip');
        $pegawai->user_id = $request->input('user_id');
        $pegawai->status_id = $request->input('status_id');
        $pegawai->gender = $request->input('gender');
        $pegawai->tempat_lahir = $request->input('tempat_lahir');
        $pegawai->tgl_lahir = $request->input('tgl_lahir');
        $pegawai->pend_terakhir = $request->input('pend_terakhir');
        $pegawai->alamat = $request->input('alamat');
        $pegawai->profesi_id = $request->input('profesi_id');
        $pegawai->ruangan_id = $request->input('ruangan_id');
        $pegawai->pk_id = $request->input('pk_id');
        $pegawai->area_id = $request->input('area_id');

        $pegawai->save();

        return redirect()->route('dashboard');
    }
}
