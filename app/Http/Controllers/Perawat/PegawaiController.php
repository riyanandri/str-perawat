<?php

namespace App\Http\Controllers\Perawat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pegawai;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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
            'photo => required|mimes:jpg,jpeg,png|max:5120',
            'nip' => 'required|regex:/^\S*$/u|unique:pegawai,nip',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'pend_terakhir' => 'required',
            'alamat' => 'required',
        ],[
            'photo.required' => 'Anda belum mengupload foto profil',
            'photo.mimes' => 'file harus berupa jpg,jpeg,png',
            'photo.max' => 'file terlalu besar, maksimal 5MB',
            'nip.required' => 'Anda belum mengisi NIP',
            'nip.regex' => 'NIP tidak boleh ada spasi',
            'nip.unique' => 'NIP tersebut sudah terdaftar',
            'tempat_lahir' => 'Anda belum mengisi tempat lahir',
            'tgl_lahir' => 'Anda belum mengisi tanggal lahir',
            'pend_terakhir' => 'Anda belum mengisi pendidikan terakhir',
            'alamat' => 'Anda belum mengisi alamat',
        ]);

        $user_id = Auth::user()->id;
        $user = User::findOrFail($user_id);

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $ext = $photo->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $photo->move('uploads/profil/', $filename);
            $user->photo = $filename;
        }

        $user->update();

        $dataPegawai = [
            'nip' => $request->nip,
            'user_id' => $user_id,
            'status_id' => $request->status_id,
            'gender' => $request->gender,
            'tempat_lahir' => $request->tempat_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'pend_terakhir' => $request->pend_terakhir,
            'alamat' => $request->alamat,
            'profesi_id' => $request->profesi_id,
            'ruangan_id' => $request->ruangan_id,
            'pk_id' => $request->pk_id,
            'area_id' => $request->area_id,
        ];

        Pegawai::create($dataPegawai);

        return redirect()->route('dashboard');
    }
}
