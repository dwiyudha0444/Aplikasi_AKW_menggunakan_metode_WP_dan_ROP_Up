<?php

namespace App\Http\Controllers\dashboard\admin;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use App\Models\PemesananProduk;
use App\Models\Produk;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Exception;

class ProdukController extends Controller
{
    public function index()
    {
        $produk = Produk::orderBy('created_at', 'desc')->get();

        return view('dashboard.admin.produk.index', compact('produk'));
    }

    public function create()
    {
        $kategori = Kategori::all();
        return view('dashboard.admin.produk.form', compact('kategori'));
    }

    public function edit($id)
    {
        $produk = Produk::findOrFail($id);
        $kategori = Kategori::all();
        return view('dashboard.admin.produk.edit', compact('produk', 'kategori'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255', 
            'id_kategori' => 'required|exists:kategori,id', 
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', 
        ]);

        try {
            $produk = new Produk;
            $produk->nama = $request->input('nama');
            $produk->id_kategori = $request->input('id_kategori');
            $produk->harga = $request->input('harga');
            $produk->stok = $request->input('stok');

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $imagePath = $image->storeAs('public/images', $imageName); 
                $produk->image = 'storage/images/' . $imageName;
            }

            $produk->save();

            return redirect()->route('admin_produk')->with('success', 'Produk berhasil ditambahkan.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan, produk gagal ditambahkan.');
        }
    }


    public function update(Request $request, $id)
    {
        try {
            if ($request->hasFile('image')) {
                Log::info('File ditemukan:', [
                    'file_name' => $request->file('image')->getClientOriginalName(),
                    'mime_type' => $request->file('image')->getMimeType(),
                    'size' => $request->file('image')->getSize(),
                ]);
            } else {
                Log::warning('Tidak ada file yang diunggah.');
            }

            $validated = $request->validate([
                'nama' => 'required|string|max:255',
                'id_kategori' => 'required|exists:kategori,id',
                'harga' => 'required|numeric',
                'stok' => 'required|numeric|min:1',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $produk = Produk::findOrFail($id);

            $produk->update([
                'nama' => $validated['nama'],
                'id_kategori' => $validated['id_kategori'],
                'harga' => $validated['harga'],
                'stok' => $validated['stok'],
            ]);

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $image->storeAs('public/images', $imageName);
                $produk->update(['image' => 'storage/images/' . $imageName]);
            }

            return redirect()->route('admin_produk')->with('success', 'Produk berhasil diperbarui!');
        } catch (Exception $e) {
            Log::error('Error in Produk Update: ' . $e->getMessage(), [
                'exception' => $e,
                'request' => $request->all(),
            ]);

            return back()->with('error', 'Terjadi kesalahan saat memperbarui produk.');
        }
    }

    public function destroy($id)
    {
        try {
            $produk = Produk::findOrFail($id);
            $produk->delete();

            return redirect()->route('admin_produk')->with('success', 'Produk berhasil dihapus!');
        } catch (Exception $e) {
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function calculateWP()
    {
        // Bobot untuk setiap kategori
        $weights = [
            'kualitas_produk' => 0.3,
            'harga' => 0.2,
            'layanan_pelanggan' => 0.2,
            'ulasan_pelanggan' => 0.1,
            'fleksibilitas_pembayaran' => 0.2
        ];

        // Ambil semua produk beserta ratingnya
        $products = Produk::with('penilaian')->get();

        // Array untuk menyimpan skor WP tiap produk
        $wpScores = [];

        foreach ($products as $product) {
            $rating = $product->penilaian;

            // Normalisasi nilai kategori menjadi antara 0 dan 1
            $normalized = [
                'kualitas_produk' => $rating->kualitas_produk / 5,
                'harga_produk' => $rating->harga_produk / 5,
                'layanan_pelanggan' => $rating->layanan_pelanggan / 5,
                'ulasan_pelanggan' => $rating->ulasan_pelanggan / 5,
                'fleksibilitas_pembayaran' => $rating->fleksibilitas_pembayaran / 5
            ];

            // Hitung skor WP
            $score = 1;
            foreach ($normalized as $key => $value) {
                $score *= pow($value, $weights[$key]); // Rumus WP
            }

            $wpScores[$product->id] = [
                'name' => $product->name,
                'score' => round($score, 3)
            ];
        }

        // Urutkan berdasarkan skor WP tertinggi
        uasort($wpScores, function ($a, $b) {
            return $b['score'] <=> $a['score'];
        });

        // Tampilkan hasil skor WP
        // return view('products.wp_scores', compact('wpScores'));
    }

    public function calculateReorderPoint($productId)
    {
        // Ambil data produk
        $product = Produk::find($productId);

        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        // Ambil rata-rata penjualan harian produk tersebut
        $averageDemandPerDay = $this->getAverageDailyDemand($productId);

        // Hitung Lead Time Demand
        $leadTimeDemand = $averageDemandPerDay * $product->lead_time;

        // Safety Stock
        $safetyStock = $product->safety_stock;

        // Hitung Reorder Point
        $reorderPoint = $leadTimeDemand + $safetyStock;

        return response()->json([
            'product_id' => $productId,
            'reorder_point' => $reorderPoint,
            'lead_time_demand' => $leadTimeDemand,
            'safety_stock' => $safetyStock
        ]);
    }

    private function getAverageDailyDemand($productId)
    {
        // Mengambil data pemesanan yang berkaitan dengan produk dalam periode tertentu
        $totalSales = PemesananProduk::where('id_produk', $productId)
            ->join('pemesanan', 'pemesanan.id', '=', 'pemesanan_produk.id_pemesanan')  // Join dengan tabel Pemesanan
            ->whereBetween('pemesanan.tanggal_pemesanan', [Carbon::now()->subMonth(), Carbon::now()])  // Menggunakan tanggal_pemesanan dari Pemesanan
            ->sum('pemesanan_produk.qty_produk');  // Menghitung total quantity produk yang terjual

        // Menghitung rata-rata penjualan harian
        $days = Carbon::now()->subMonth()->daysInMonth; // Menghitung jumlah hari dalam sebulan
        return $totalSales / $days;
    }
}