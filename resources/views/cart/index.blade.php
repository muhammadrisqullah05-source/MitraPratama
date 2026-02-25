<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Keranjang Belanja</title>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <script src="https://cdn.tailwindcss.com"></script>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
</head>
<body class="font-sans antialiased bg-gray-50">

    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Keranjang Belanja') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                
                @if(session('success'))
                    <div class="mb-6 bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded shadow-sm flex items-center gap-3">
                        <i class="fa-solid fa-circle-check text-xl"></i>
                        <div>
                            <p class="font-bold">Berhasil!</p>
                            <p>{{ session('success') }}</p>
                        </div>
                    </div>
                @endif

                @if(session('error'))
                    <div class="mb-6 bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded shadow-sm flex items-center gap-3">
                        <i class="fa-solid fa-triangle-exclamation text-xl"></i>
                        <div>
                            <p class="font-bold">Perhatian!</p>
                            <p>{{ session('error') }}</p>
                        </div>
                    </div>
                @endif

                <div class="flex flex-col lg:flex-row gap-8">
                    
                    <div class="w-full lg:w-3/4">
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-gray-100">
                            <div class="p-6">
                                @if($cartItems->count() > 0)
                                    <div class="overflow-x-auto">
                                        <table class="w-full text-sm text-left text-gray-500">
                                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-b">
                                                <tr>
                                                    <th class="px-6 py-3 w-2/5">Produk</th>
                                                    <th class="px-6 py-3 text-center">Harga</th>
                                                    <th class="px-6 py-3 text-center">Jumlah</th>
                                                    <th class="px-6 py-3 text-center">Total</th>
                                                    <th class="px-6 py-3 text-center">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($cartItems as $cart)
                                                <tr class="bg-white border-b hover:bg-gray-50 transition duration-150">
                                                    
                                                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                                        <div class="flex items-center gap-4">
                                                            <div class="h-16 w-16 flex-shrink-0 overflow-hidden rounded-md border border-gray-200">
                                                                <img src="{{ asset('images/' . $cart->product->image) }}" class="h-full w-full object-cover object-center">
                                                            </div>
                                                            <div>
                                                                <div class="font-bold text-lg text-gray-800">{{ $cart->product->nama_barang }}</div>
                                                                <div class="text-xs text-gray-500 mt-1">
                                                                    Sisa Stok: <span class="font-bold text-blue-600">{{ $cart->product->stock }}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>

                                                    <td class="px-6 py-4 text-center text-gray-600">
                                                        Rp {{ number_format($cart->product->harga_barang, 0, ',', '.') }}
                                                    </td>

                                                    <td class="px-6 py-4 text-center">
                                                        <div class="flex items-center justify-center space-x-2">
                                                            
                                                            <form action="{{ route('cart.update', $cart->id) }}" method="POST">
                                                                @csrf
                                                                @method('PATCH')
                                                                <input type="hidden" name="type" value="decrease">
                                                                <button type="submit" 
                                                                    class="w-8 h-8 rounded-full border border-gray-300 flex items-center justify-center text-gray-600 hover:bg-red-50 hover:text-red-600 transition duration-200 {{ $cart->quantity <= 1 ? 'opacity-50 cursor-not-allowed' : '' }}"
                                                                    {{ $cart->quantity <= 1 ? 'disabled' : '' }}>
                                                                    <i class="fa-solid fa-minus text-xs"></i>
                                                                </button>
                                                            </form>

                                                            <span class="w-8 text-center font-bold text-gray-900">{{ $cart->quantity }}</span>

                                                            <form action="{{ route('cart.update', $cart->id) }}" method="POST">
                                                                @csrf
                                                                @method('PATCH')
                                                                <input type="hidden" name="type" value="increase">
                                                                <button type="submit" 
                                                                    class="w-8 h-8 rounded-full border border-gray-300 flex items-center justify-center text-white bg-blue-600 hover:bg-blue-700 transition duration-200 {{ $cart->quantity >= $cart->product->stock ? 'opacity-50 cursor-not-allowed bg-gray-400' : '' }}"
                                                                    {{ $cart->quantity >= $cart->product->stock ? 'disabled' : '' }}>
                                                                    <i class="fa-solid fa-plus text-xs"></i>
                                                                </button>
                                                            </form>

                                                        </div>
                                                        
                                                        @if($cart->quantity >= $cart->product->stock)
                                                            <span class="text-[10px] text-red-500 font-semibold mt-1 block">Maks. Stok</span>
                                                        @endif
                                                    </td>

                                                    <td class="px-6 py-4 text-center font-bold text-emerald-600 text-lg">
                                                        Rp {{ number_format($cart->product->harga_barang * $cart->quantity, 0, ',', '.') }}
                                                    </td>

                                                    <td class="px-6 py-4 text-center">
                                                        <form action="{{ route('cart.destroy', $cart->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" onclick="return confirm('Hapus item ini dari keranjang?')" class="group relative p-2 text-gray-400 hover:text-red-600 transition">
                                                                <i class="fa-solid fa-trash-can text-xl"></i>
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    
                                    <div class="mt-6">
                                        <a href="/produk" class="text-sm text-blue-600 hover:text-blue-800 hover:underline flex items-center gap-2">
                                            <i class="fa-solid fa-arrow-left"></i> Lanjut Belanja Produk Lain
                                        </a>
                                    </div>

                                @else
                                    <div class="text-center py-16">
                                        <div class="bg-gray-100 rounded-full w-24 h-24 flex items-center justify-center mx-auto mb-4">
                                            <i class="fa-solid fa-cart-shopping text-4xl text-gray-300"></i>
                                        </div>
                                        <h3 class="text-lg font-bold text-gray-900">Keranjang Anda Kosong</h3>
                                        <p class="text-gray-500 mt-2 mb-6">Sepertinya Anda belum menambahkan produk apapun.</p>
                                        <a href="/produk" class="inline-flex items-center px-6 py-3 bg-blue-600 border border-transparent rounded-lg font-semibold text-white hover:bg-blue-700 transition shadow-lg">
                                            Mulai Belanja Sekarang
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="w-full lg:w-1/4">
                        <div class="bg-white shadow-md sm:rounded-lg p-6 sticky top-6 border border-gray-100">
                            <h3 class="text-lg font-bold text-gray-900 mb-4 border-b pb-3">Ringkasan Pesanan</h3>
                            
                            <div class="flex justify-between mb-3 text-sm text-gray-600">
                                <span>Total Item</span>
                                <span class="font-semibold">{{ $cartItems->sum('quantity') }} pcs</span>
                            </div>

                            <div class="flex justify-between mb-3 text-sm text-gray-600">
                                <span>Subtotal</span>
                                <span>Rp {{ number_format($total, 0, ',', '.') }}</span>
                            </div>

                            <div class="border-t border-dashed my-4"></div>

                            <div class="flex justify-between mb-8 items-center">
                                <span class="font-bold text-gray-800">Total Bayar</span>
                                <span class="text-xl font-bold text-emerald-600">Rp {{ number_format($total, 0, ',', '.') }}</span>
                            </div>

                            @if($cartItems->count() > 0)
                                <form action="{{ route('checkout') }}" method="POST">
                                    @csrf
                                    <button type="submit" 
                                        onclick="return confirm('Apakah Anda yakin ingin memproses pesanan ini? Stok produk akan berkurang.')" 
                                        class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded-xl shadow-lg hover:shadow-xl transition-all duration-200 flex justify-center items-center gap-2 transform hover:-translate-y-0.5">
                                        <i class="fa-solid fa-credit-card"></i> Checkout Sekarang
                                    </button>
                                </form>
                            @else
                                <button disabled class="w-full bg-gray-200 text-gray-400 font-bold py-3 px-4 rounded-xl cursor-not-allowed flex justify-center items-center gap-2">
                                    <i class="fa-solid fa-lock"></i> Checkout
                                </button>
                            @endif

                            <div class="mt-6 bg-blue-50 p-3 rounded-lg border border-blue-100">
                                <div class="flex items-start gap-2">
                                    <i class="fa-solid fa-shield-halved text-blue-500 mt-1"></i>
                                    <p class="text-xs text-blue-700 leading-relaxed">
                                        Jaminan keamanan transaksi. Stok produk akan otomatis dikurangi setelah Anda menekan tombol checkout.
                                    </p>
                                </div>
                            </div>

                        </div>
                    </div>
                    </div>
                </div>
        </div>

    </x-app-layout>
</body>
</html>