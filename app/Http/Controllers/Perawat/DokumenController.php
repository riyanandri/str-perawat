<?php

namespace App\Http\Controllers\Perawat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dokumen;
use Illuminate\Support\Facades\DB;


class DokumenController extends Controller
{
    public function upload()
    {
        return view('perawat.upload_dokumen');
    }
}
