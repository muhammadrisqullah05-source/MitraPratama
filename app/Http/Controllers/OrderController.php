<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http; // Tambahkan ini untuk Telegram
use Illuminate\Support\Str;

class OrderController extends Controller
{
    // PROSES CHECKOUT DENGAN NOTIFIKASI TELEGRAM
    public function checkout()
    {
        $userId = Auth::id();
        $user = Auth::user();
        $cartItems = Cart::with('product')->where('user_id', $userId)->get();

        if ($cartItems->isEmpty()) {
            return redirect()->back()->with('error', 'Keranjang belanja kosong!');
        }

        $totalParams = $cartItems->sum(function ($item) {
            return $item->product->harga_barang * $item->quantity;
        });

        DB::beginTransaction();

        try {
            $invoiceNumber = 'INV-' . strtoupper(Str::random(10));

            $order = Order::create([
                'user_id' => $userId,
                'invoice_number' => $invoiceNumber,
                'total_price' => $totalParams,
                'status' => 'pending'
            ]);

            // Variable untuk menampung list barang buat Telegram
            $pesanBarang = "";

            foreach ($cartItems as $item) {
                if ($item->product->stock < $item->quantity) {
                    throw new \Exception("Stok untuk produk {$item->product->nama_barang} tidak mencukupi.");
                }

                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item->product_id,
                    'quantity' => $item->quantity,
                    'price' => $item->product->harga_barang
                ]);

                // Susun teks detail barang
                $pesanBarang .= "📦 *{$item->product->nama_barang}*\n";
                $pesanBarang .= "   {$item->quantity} x Rp " . number_format($item->product->harga_barang, 0, ',', '.') . "\n";

                $item->product->decrement('stock', $item->quantity);
            }

            Cart::where('user_id', $userId)->delete();

            // --- KIRIM KE TELEGRAM ---
            $token = env('TELEGRAM_BOT_TOKEN');
            $chatId = env('TELEGRAM_CHAT_ID');

            if ($token && $chatId) {
                $pesan = "🔔 *ADA PESANAN BARU!* 🔔\n\n";
                $pesan .= "🆔 *Invoice:* `{$invoiceNumber}`\n";
                $pesan .= "👤 *Pelanggan:* {$user->name}\n";
                $pesan .= "📧 *Email:* {$user->email}\n";
                $pesan .= "--------------------------\n";
                $pesan .= $pesanBarang;
                $pesan .= "--------------------------\n";
                $pesan .= "💰 *Total Bayar: Rp " . number_format($totalParams, 0, ',', '.') . "*\n\n";
                $pesan .= "✅ Silakan cek dashboard admin.";

                Http::post("https://api.telegram.org/bot{$token}/sendMessage", [
                    'chat_id' => $chatId,
                    'text' => $pesan,
                    'parse_mode' => 'Markdown'
                ]);
            }

            DB::commit();

            return redirect()->route('pesanan')->with('success', 'Pesanan berhasil dibuat dan notifikasi Telegram dikirim!');

        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    // TAMPILAN PESANAN USER
    public function index()
    {
        $orders = Order::where('user_id', Auth::id())
                    ->with('items.product')
                    ->latest()
                    ->get();

        return view('pesanan.index', compact('orders'));
    }

    // TAMPILAN PESANAN ADMIN
    public function indexAdmin()
    {
        // Tetap menggunakan paginate agar selaras dengan tabel sebelumnya
        $orders = Order::with('user')->latest()->paginate(10); 
        
        $statusCounts = [
        'pending'   => Order::where('status', 'pending')->count(),
        'completed' => Order::where('status', 'completed')->count(),
        'cancelled' => Order::where('status', 'cancelled')->count(),
        ];
        
        return view('data-pesanan.index', compact('orders', 'statusCounts'));
    }

    // UPDATE STATUS PESANAN (ADMIN)
    public function updateStatus(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        
        $request->validate([
            'status' => 'required|in:pending,paid,shipped,completed,cancelled'
        ]);

        $order->update(['status' => $request->status]);

        return redirect()->back()->with('success', "Status Pesanan #{$order->invoice_number} berhasil diperbarui!");
    }

}