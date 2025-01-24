<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemesanan;
use App\Models\User;

class PemesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pemesanan = Pemesanan::all();
        return view('dashboard.reseller.pemesanan.index', compact('pemesanan'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Ambil semua pengguna yang berperan sebagai reseller
        $users = User::where('role', 'reseller')->get();

        // Kirim data pengguna ke tampilan
        return view('dashboard.reseller.pemesanan.create', compact('users'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_user' => 'required|exists:users,id',
            'tanggal_pemesanan' => 'required|date',
            'status_pemesanan' => 'required|string',
            'total_harga' => 'required|numeric',
        ]);

        $pemesanan = Pemesanan::create($request->all());
        return redirect()->route('dashboard.reseller.pemesanan.index')->with('success', 'Pemesanan berhasil dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pemesanan = Pemesanan::findOrFail($id);
        return view('dashboard.reseller.pemesanan.edit', compact('pemesanan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'id_user' => 'required|exists:users,id',
            'tanggal_pemesanan' => 'required|date',
            'status_pemesanan' => 'required|string',
            'total_harga' => 'required|numeric',
        ]);

        $pemesanan = Pemesanan::findOrFail($id);
        $pemesanan->update($request->all());

        return redirect()->route('pemesanan.index')->with('success', 'Pemesanan berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pemesanan = Pemesanan::findOrFail($id);
        $pemesanan->delete();

        return redirect()->route('pemesanan.index')->with('success', 'Pemesanan berhasil dihapus');
    }

    public function updateStatus(Request $request, $id)
    {
        $pemesanan = Pemesanan::findOrFail($id);
        $pemesanan->status_pemesanan = $request->status_pemesanan;
        $pemesanan->save();

        return redirect()->back()->with('success', 'Status pemesanan berhasil diperbarui menjadi Paid.');
    }
}