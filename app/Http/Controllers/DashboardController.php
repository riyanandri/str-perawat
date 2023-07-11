<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function perawatDashboard()
    {
        return view('perawat_dashboard');
    }

    public function adminDashboard()
    {
        return view('admin_dashboard');
    }

    public function superAdminDashboard()
    {
        return view('superadmin_dashboard');
    }
}
