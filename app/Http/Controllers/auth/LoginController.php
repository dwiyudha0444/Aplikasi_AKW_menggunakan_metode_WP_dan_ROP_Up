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
            'email'    => 'required|email',
            'password' => 'required',
        ]);
    
        $credentials = [
            'email'    => $request->email,
            'password' => $request->password,
        ];
        
        if (Auth::attempt($credentials)) {
            // Periksa peran pengguna dan arahkan ke rute yang sesuai
            switch (Auth::user()->role) {
                case 'admin':
                    return redirect()->route('dashboard_admin');
                case 'kurir':
                    return redirect()->route('dashboard_kurir');
                case 'reseller':
                    return redirect()->route('dashboard_reseller');
                case 'owner':
                    return redirect()->route('dashboard_owner');
                default:
                    // Logout jika peran tidak valid
                    Auth::logout();
                    return redirect()->route('login')->with('error', 'Akses tidak valid.');
            }
        } else {
            // Gagal login
            return redirect()->route('login')->with('error', 'Email atau Password Salah.');
        }
    }
    

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Kamu berhasil logout');
    }
}