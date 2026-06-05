<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function proses(Request $request)
    {
        $kredensial = $request->validate([
            'user_name' => 'required|string',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($kredensial)) {
            $request->session()->regenerate();
            session(['waktu_login' => now()->timezone('Asia/Jakarta')
                ->locale('id')->isoFormat('dddd, D MMMM Y | HH:mm')]);

            return redirect()->route('dashboard');
        }

        return back()->withErrors([
            'user_name' => 'Username atau password salah.',
        ])->onlyInput('user_name');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
