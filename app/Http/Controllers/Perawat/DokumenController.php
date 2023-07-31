<?php

namespace App\Http\Controllers\Perawat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dokumen;

class DokumenController extends Controller
{
    public function upload()
    {
        return view('perawat.upload_dokumen');
    }
}
