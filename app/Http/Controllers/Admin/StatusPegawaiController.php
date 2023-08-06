<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StatusPegawai;

class StatusPegawaiController extends Controller
{
    public function index()
    {
        return view('admin.master.status_pegawai');
    }

    public function data(Request $request)
    {
        $data  = StatusPegawai::orderBy('created_at', 'ASC')->get(); //query get semua data ke model
        $form = view("admin.master.status_pegawai_data", ['data' => $data]); //passing data ke view
        $data_array = array('data'=>''.$form.''); //convert ke bentuk array
        return response()->json($data_array);
    }

    public function input()
    {
        $form = view("admin.master.status_pegawai_input"); //load view
        $data_array = array('data'=>''.$form.''); //convert ke bentuk array
        return response()->json($data_array);
    }

    public function create(Request $request)
    {
        $postall = $request->all(); //tangkap semua parameter yang di post
        $inputclear = \Arr::except($postall, array('_token', '_method')); //pisahkan parameter token 

        $nama_status = $request->input('nama_status'); //tangkap parameter id yang di post

        $cek = StatusPegawai::where('nama_status', '=', $nama_status)->count(); //query cek id apakah sudah ada di tabel atau belum
        if($cek) {
            return response()->json([ //respon json jika gagal
                'status' => false,
                'info' => "Status pegawai tersebut sudah ada di database"
            ], 201);
            return false;
        }

        $post = StatusPegawai::create($inputclear); //jika lolos pengecekan id maka query insert ini jalan 
        return response()->json([ //respon json jika berhasil
            'status' => true,
            'info' => 'Berhasil menambahkan data'
        ], 201);
    }

    //method untuk tampilkan form edit
    public function edit(Request $request)
    {
        $where = array('id' => $request->input('id')); //tangkap parameter id yang di post
        $post  = StatusPegawai::where($where)->first(); //get ke tabel di model berdasarkan id

        $form = view("admin.master.status_pegawai_edit", ['data' => $post]); //passing data ke view
        $data_array = array('data'=>''.$form.''); //convert ke bentuk array
        return response()->json($data_array); //convert ke respone json
    }

    //method untuk update data
    public function update(Request $request)
    {
        $postall = $request->all(); //tangkap semua parameter yang di post
        $inputclear = \Arr::except($postall, array('_token', '_method')); //pisahkan parameter token 
        $id = $request->input('id'); //tangkap parameter id yang di post
        $nama = $request->input('nama_status'); //tangkap parameter nama profesi yang di post

        $nama_b = StatusPegawai::select('nama_status')->where('id', $id)->first(); //get data by id untuk dapatkan nama profesi lama 

        $cek = StatusPegawai::where([ //query cek nama profesi apakah sudah ada di tabel atau belum dibandingkan dengan nama profesi baru dan lama
            ['nama_status', '!=', $nama_b->nama],
            ['nama_status', '=', $nama]
        ])->count();
        if($cek) {
            return response()->json([ //respon json jika gagal
                'status' => false,
                'info' => "Status pegawai tersebut sudah ada di database"
            ], 201);
            return false;
        }

        StatusPegawai::where('id', $id)->update($inputclear); //jika lolos pengecekan nama profesi maka query update ini jalan 
        return response()->json([ //respon json jika berhasil
            'status' => true,
            'info' => "Berhasil update data status pegawai"
        ], 201);
    }

    //method untuk delete data
    public function destroy($id)
    {
        StatusPegawai::where('id', $id)->delete(); //query delete data berdasarkan id
        return response()->json([ //respon json jika berhasil
            'status' => true,
            'info' => "Berhasil menghapus data status pegawai"
        ], 201);
    }
}
