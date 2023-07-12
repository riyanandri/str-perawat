<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Profesi;

class ProfesiController extends Controller
{
    public function index(Request $request)
    {
        $profesi = Profesi::latest()->paginate(5);

        return view('admin.master.profesi', compact('profesi'));
    }
}
