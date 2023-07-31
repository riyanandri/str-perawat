<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Profesi;

class ProfesiController extends Controller
{
    public function index()
    {
        return view('admin.master.profesi');
    }

    public function data(Request $request)
    {
        $data  = Profesi::orderBy('created_at', 'ASC')->get(); //query get semua data ke model
        $form = view("admin.master.profesi_data", ['data' => $data]); //passing data ke view
        $data_array = array('data'=>''.$form.''); //convert ke bentuk array
        return response()->json($data_array);
    }

    public function input()
    {
        $form = view("admin.master.profesi_input"); //load view
        $data_array = array('data'=>''.$form.''); //convert ke bentuk array
        return response()->json($data_array);
    }

    public function create(Request $request)
    {
        $postall = $request->all(); //tangkap semua parameter yang di post
        $inputclear = \Arr::except($request->all(), array('_token', '_method')); //pisahkan parameter token 

        $nama_profesi = $request->input('nama_profesi'); //tangkap parameter id yang di post

        $cek = Profesi::where('nama_profesi', '=', $nama_profesi)->count(); //query cek id apakah sudah ada di tabel atau belum
        if($cek) {
            return response()->json([ //respon json jika gagal
                'status' => false,
                'info' => "Nama profesi tersebut sudah ada di database"
            ], 201);
            return false;
        }

        $post = Profesi::create($inputclear); //jika lolos pengecekan id maka query insert ini jalan 
        return response()->json([ //respon json jika berhasil
            'status' => true,
            'info' => 'Berhasil menambahkan data profesi'
        ], 201);
    }

    //method untuk tampilkan form edit
    public function edit(Request $request)
    {
        $where = array('id' => $request->input('id')); //tangkap parameter id yang di post
        $post  = Profesi::where($where)->first(); //get ke tabel di model berdasarkan id

        $form = view("admin.master.profesi_edit", ['data' => $post]); //passing data ke view
        $data_array = array('data'=>''.$form.''); //convert ke bentuk array
        return response()->json($data_array); //convert ke respone json
    }

    //method untuk update data
    public function update(Request $request)
    {
        $postall = $request->all(); //tangkap semua parameter yang di post
        $inputclear = \Arr::except($request->all(), array('_token', '_method')); //pisahkan parameter token 
        $id = $request->input('id'); //tangkap parameter id yang di post
        $nama = $request->input('nama_profesi'); //tangkap parameter nama profesi yang di post

        $nama_b = Profesi::select('nama_profesi')->where('id', $id)->first(); //get data by id untuk dapatkan nama profesi lama 

        $cek = Profesi::where([ //query cek nama profesi apakah sudah ada di tabel atau belum dibandingkan dengan nama profesi baru dan lama
            ['nama_profesi', '!=', $nama_b->nama],
            ['nama_profesi', '=', $nama]
        ])->count();
        if($cek) {
            return response()->json([ //respon json jika gagal
                'status' => false,
                'info' => "Nama profesi tersebut sudah ada di database"
            ], 201);
            return false;
        }

        Profesi::where('id', $id)->update($inputclear); //jika lolos pengecekan nama profesi maka query update ini jalan 
        return response()->json([ //respon json jika berhasil
            'status' => true,
            'info' => "Berhasil update data profesi"
        ], 201);
    }

    //method untuk delete data
    public function destroy($id)
    {
        Profesi::where('id', $id)->delete(); //query delete data berdasarkan id
        return response()->json([ //respon json jika berhasil
            'status' => true,
            'info' => "Berhasil menghapus data profesi"
        ], 201);
    }

}
