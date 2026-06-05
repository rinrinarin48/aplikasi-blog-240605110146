<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $nama_lengkap = Auth::user()->nama_depan . ' ' . Auth::user()->nama_belakang;
        $waktu_login = session('waktu_login', '-');

        return view('dashboard.index', compact('nama_lengkap', 'waktu_login'));
    }
}
