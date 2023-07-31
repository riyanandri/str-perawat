<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Area;

class AreaController extends Controller
{
    public function index()
    {
        return view('admin.master.area');
    }

    public function data(Request $request)
    {
        $data  = Area::orderBy('created_at', 'ASC')->get(); //query get semua data ke model
        $form = view("admin.master.area_data", ['data' => $data]); //passing data ke view
        $data_array = array('data'=>''.$form.''); //convert ke bentuk array
        return response()->json($data_array);
    }
}
