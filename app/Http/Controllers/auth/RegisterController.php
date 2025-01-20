<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function register_proses(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email|unique:users',
            'name' => 'required|min:4|max:20|unique:users',
            'password' => 'required|min:6',
            'role' => 'required',
        ]);

        // Simpan data pengguna
        User::create([
            'email' => $request->email,
            'name' => $request->name,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        // Redirect ke halaman login atau dashboard
        return redirect()->route('login')->with('success', 'Registration successful!');
    
    }
}