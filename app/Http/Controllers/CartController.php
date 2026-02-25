<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    // Menampilkan isi keranjang
    public function index()
    {
        $cartItems = Cart::with('product')->where('user_id', Auth::id())->get();
        
        // Hitung Total Harga
        $total = $cartItems->sum(function($item) {
            return $item->product->harga_barang * $item->quantity;
        });

        return view('cart.index', compact('cartItems', 'total'));
    }

    // Menambahkan item ke keranjang
    public function addToCart(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $userId = Auth::id();

        // Cek apakah produk sudah ada di keranjang user ini
        $cartItem = Cart::where('user_id', $userId)->where('product_id', $id)->first();

        if($cartItem) {
            // Jika ada, tambahkan quantity
            // Cek stok dulu (opsional)
            if($cartItem->quantity + 1 <= $product->stock) {
                $cartItem->quantity += 1;
                $cartItem->save();
            } else {
                return redirect()->back()->with('error', 'Stok tidak mencukupi!');
            }
        } else {
            // Jika belum ada, buat baru
            Cart::create([
                'user_id' => $userId,
                'product_id' => $id,
                'quantity' => 1
            ]);
        }

        return redirect()->back()->with('success', 'Produk berhasil ditambahkan ke keranjang!');
    }

    // Menghapus item dari keranjang
    public function destroy($id)
    {
        $cartItem = Cart::findOrFail($id);
        
        // Pastikan yang menghapus adalah pemilik keranjang
        if($cartItem->user_id == Auth::id()) {
            $cartItem->delete();
            return redirect()->back()->with('success', 'Item dihapus dari keranjang.');
        }

        return redirect()->back()->with('error', 'Unauthorized');
    }
    public function updateQuantity(Request $request, $id)
    {
        $cartItem = Cart::with('product')->findOrFail($id);
        
        // Pastikan user yang mengubah adalah pemilik keranjang
        if($cartItem->user_id != Auth::id()) {
            return redirect()->back()->with('error', 'Unauthorized');
        }

        // Logika Tambah (+)
        if ($request->type == 'increase') {
            // Cek apakah quantity saat ini masih kurang dari stok produk
            if ($cartItem->quantity < $cartItem->product->stock) {
                $cartItem->quantity += 1;
                $cartItem->save();
            } else {
                return redirect()->back()->with('error', 'Jumlah melebihi stok yang tersedia!');
            }
        }
        
        // Logika Kurang (-)
        if ($request->type == 'decrease') {
            // Cek agar tidak kurang dari 1
            if ($cartItem->quantity > 1) {
                $cartItem->quantity -= 1;
                $cartItem->save();
            }
        }

        return redirect()->back();
    }
}