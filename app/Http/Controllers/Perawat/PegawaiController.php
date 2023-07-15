<?php

namespace App\Http\Controllers\Perawat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pegawai;
use Illuminate\Support\Facades\DB;
// use App\Models\StatusPegawai;
// use App\Models\Profesi;
// use App\Models\Ruangan;
// use App\Models\JenisPk;
// use App\Models\Area;

class PegawaiController extends Controller
{
    public function updateAkun()
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
        return view('perawat.update_akun', [
            'pegawai' => $pegawai,
            'status_pegawai' => $status_pegawai,
            'profesi' => $profesi,
            'ruang' => $ruang,
            'pk' => $pk,
            'area' => $area
        ]);
    }

    public function simpan(Request $request)
    {
        // $this->validate($request, [
        //     'nip' => 'required|string|max:30|unique:pegawai',
        //     'status_id' => 'required',
        //     'gender' => 'required|in:L,P',
        //     'tempat_lahir' => 'required',
        //     'tgl_lahir' => 'required',
        //     'pend_terakhir' => 'required',
        //     'alamat' => 'required',
        //     'profesi_id' => 'required',
        //     'ruangan_id' => 'required',
        //     'pk_id' => 'required',
        //     'area_id' => 'required',
        // ]);

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

        // $pegawai = Pegawai::save([
        //     'nip' => $request->nip,
        //     'user_id' => $request->user_id,
        //     'status_id' => $request->status_id,
        //     'gender' => $request->gender,
        //     'tempat_lahir' => $request->tempat_lahir,
        //     'tgl_lahir' => $request->tgl_lahir,
        //     'pend_terakhir' => $request->pend_terakhir,
        //     'alamat' => $request->alamat,
        //     'profesi_id' => $request->profesi_id,
        //     'ruangan_id' => $request->ruangan_id,
        //     'pk_id' => $request->pk_id,
        //     'area_id' => $request->area_id,
        // ]);

        return redirect()->route('dashboard');
    }
}
