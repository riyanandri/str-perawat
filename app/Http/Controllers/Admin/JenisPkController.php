<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JenisPk;

class JenisPkController extends Controller
{
    public function index()
    {
        return view('admin.master.jenis_pk');
    }

    public function data(Request $request)
    {
        $data  = JenisPk::orderBy('created_at', 'ASC')->get(); //query get semua data ke model
        $form = view("admin.master.jenis_pk_data", ['data' => $data]); //passing data ke view
        $data_array = array('data'=>''.$form.''); //convert ke bentuk array
        return response()->json($data_array);
    }
}
