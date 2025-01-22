<?php

namespace App\Http\Controllers\dashboard\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DaftarAkunController extends Controller
{
    public function index()
    {
        // Ambil data pengguna yang terbaru berdasarkan tanggal pembuatan
        $users = User::orderBy('created_at', 'desc')->get();
    
        // Kirim data ke view
        return view('dashboard.admin.daftar_akun.index', compact('users'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('dashboard.admin.daftar_akun.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id, 
            'role' => 'required|string|max:50',
            'password' => 'nullable|min:8|confirmed',
        ]);

        $user = User::findOrFail($id);

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->role = $request->input('role');

        if ($request->filled('password')) {
            $user->password = bcrypt($request->input('password'));
        }

        $user->save();

        return redirect()->route('admin_daftarakun')->with('success', 'User updated successfully.');

    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $user->delete();
        return redirect()->route('admin_daftarakun')->with('success', 'User deleted successfully.');
    }

}