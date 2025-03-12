<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemesanan;
use App\Models\Pengiriman;
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
        // Mencari pemesanan berdasarkan ID
        $pemesanan = Pemesanan::findOrFail($id);
    
        // Memperbarui status pemesanan
        $pemesanan->status_pemesanan = $request->status_pemesanan;
        $pemesanan->save();
    
        // Memperbarui status pengiriman menjadi "Dikemas" untuk semua pengiriman dengan id_pemesanan yang sama
        $pengiriman = Pengiriman::where('id_pemesanan', $id);
        
        if ($pengiriman->exists()) {
            // Mengupdate semua baris yang cocok
            $pengiriman->update(['status_pengiriman' => 'Dikemas']);
        }
    
        // Mengambil nomor telepon user dari tabel Users berdasarkan id_user di Pemesanan
        $user = User::find($pemesanan->id_user);
    
        // Pastikan user ada dan memiliki nomor HP
        if ($user && !empty($user->nomer_hp)) {
            $nomorTujuan = preg_replace('/[^0-9]/', '', $user->nomer_hp); // Hanya angka
            $nomorTujuan = ltrim($nomorTujuan, '0'); // Hapus 0 di depan jika ada
            $nomorTujuan = "62" . $nomorTujuan; // Tambahkan kode negara Indonesia
    
            // URL WhatsApp dengan pesan otomatis
            $url = "https://wa.me/$nomorTujuan?text=Dear%20Reseller,%20pesananmu%20sedang%20dikemas,%20harap%20menunggu%20sekitar%2030%20hari,%20dikarenakan%20ini%20barang%20Pre-Order.%0A%0ATerima%20kasih.";
    
            // Redirect dengan pesan sukses + kirim URL ke view
            return redirect()->back()->with([
                'success' => 'Status pemesanan dan pengiriman berhasil diperbarui menjadi Dikemas.',
                'wa_url' => $url
            ]);
        }
    
        // Jika nomor HP tidak tersedia
        return redirect()->back()->with('error', 'Nomor HP tidak ditemukan untuk user terkait.');
    }
    
}
