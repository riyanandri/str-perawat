<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DataDokumenController extends Controller
{
    public function str()
    {
        return view('admin.dokumen.str');
    }
}
