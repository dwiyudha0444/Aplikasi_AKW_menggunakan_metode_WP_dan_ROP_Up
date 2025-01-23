<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk; 
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function index()
    {
        // Get cart data from session
        $cart = Session::get('cart', []);

        // Attach the image URL for each product in the cart
        foreach ($cart as $key => $value) {
            $product = Produk::find($key); // Find the product by its ID (ensure $key is a valid product ID)

            // Check if the product exists
            if ($product) {
                $cart[$key]['image_url'] = $product->image_url; // Attach the image URL
            } else {
                // If the product doesn't exist, set a default image URL or handle accordingly
                $cart[$key]['image_url'] = asset('storage/images/default.jpg');
            }
        }

        // Update the session with the cart data including image URLs
        Session::put('cart', $cart);

        // Calculate total price of the products in the cart
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        // Return the view with cart and total
        return view('dashboard.reseller.landingpage.keranjang', compact('cart', 'total'));
    }

    public function add(Request $request)
    {
        $product = Produk::findOrFail($request->product_id);

        $cart = Session::get('cart', []);

        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity']++;
        } else {
            $cart[$product->id] = [
                'name' => $product->nama,
                'price' => $product->harga,
                'quantity' => 1,
            ];
        }

        // Calculate total price
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        Session::put('cart', $cart);

        return redirect()->route('cart.index')->with('success', 'Produk berhasil ditambahkan ke keranjang!')->with('total', $total);
    }

    public function destroy($productId)
    {
        $cart = Session::get('cart', []);
        if (isset($cart[$productId])) {

            unset($cart[$productId]);

            Session::put('cart', $cart);
        }

        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        return redirect()->route('cart.index')->with('success', 'Produk berhasil dihapus dari keranjang!')->with('total', $total);
    }

}