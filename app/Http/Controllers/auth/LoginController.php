<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

        
    public function login_proses(Request $request)
    {
        $request->validate([
            'email'     => 'required',
            'password'  => 'required',
        ]);

        $data = [
            'email'     => $request->email,
            'password'  => $request->password
        ];
        
        if (Auth::attempt($data)) {
            // Periksa peran pengguna dan arahkan ke rute yang sesuai
            if (Auth::user()->role == 'admin') {
                return redirect()->route('dashboard_admin');
            } elseif (Auth::user()->role == 'pelanggan') {
                return redirect()->route('landingpage_pelanggan');
            }  elseif (Auth::user()->role == 'marketing') {
                return redirect()->route('dashboard_marketing');
            } 
        } else {
            
            return redirect()->route('login')->with('error', 'Email atau Password Salah');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Kamu berhasil logout');
    }
}