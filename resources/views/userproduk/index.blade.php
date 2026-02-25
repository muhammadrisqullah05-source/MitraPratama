<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Katalog Produk - Mitra Pratama</title>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <script src="https://cdn.tailwindcss.com"></script>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
</head>
<body class="font-sans antialiased bg-gray-50">

    <x-app-layout>
        <x-slot name="header">
            <div class="flex justify-between items-center">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Katalog Produk') }}
                </h2>
                <a href="{{ route('cart.index') }}" class="hidden md:inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 transition">
                    <i class="fa-solid fa-cart-shopping mr-2"></i> Lihat Keranjang
                </a>
            </div>
        </x-slot>

        <div class="py-12 pb-24"> <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                
                @if(session('success'))
                    <div class="mb-6 bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded shadow-sm flex justify-between items-center animate-pulse">
                        <div>
                            <p class="font-bold">Berhasil!</p>
                            <p>{{ session('success') }}</p>
                        </div>
                        <a href="{{ route('cart.index') }}" class="text-sm underline hover:text-green-900">Cek Keranjang &rarr;</a>
                    </div>
                @endif
                
                @if(session('error'))
                    <div class="mb-6 bg-red-100 border-l-4 border-red-500 text-red-700 p-4 rounded shadow-sm">
                        <p class="font-bold">Gagal!</p>
                        <p>{{ session('error') }}</p>
                    </div>
                @endif

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    
                    @forelse ($data_produk as $item)
                        <div class="bg-white rounded-2xl shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300 border border-gray-100 flex flex-col h-full">
                            
                            <div class="relative h-56 w-full bg-gray-100 overflow-hidden group">
                                <img src="{{ asset('images/' . $item->image) }}" 
                                     alt="{{ $item->nama_barang }}" 
                                     class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-500 {{ $item->stock == 0 ? 'grayscale opacity-70' : '' }}">
                                
                                <div class="absolute top-3 right-3">
                                    <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold shadow-sm {{ $item->stock > 0 ? 'bg-white text-blue-600' : 'bg-red-600 text-white' }}">
                                        {{ $item->stock > 0 ? 'Stok: ' . $item->stock : 'Habis' }}
                                    </span>
                                </div>
                            </div>

                            <div class="p-6 flex flex-col flex-grow">
                                <div class="mb-4">
                                    <h3 class="text-lg font-bold text-gray-900 mb-1 leading-tight">
                                        {{ $item->nama_barang }}
                                    </h3>
                                    <p class="text-xl font-bold text-emerald-600">
                                        Rp {{ number_format($item->harga_barang, 0, ',', '.') }}
                                    </p>
                                </div>

                                <div class="flex-grow mb-6">
                                    <p class="text-gray-500 text-sm line-clamp-2 leading-relaxed">
                                        {{ $item->detail }}
                                    </p>
                                </div>

                                <div class="mt-auto">
                                    @if($item->stock > 0)
                                        <form action="{{ route('cart.add', $item->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="w-full group flex items-center justify-center px-4 py-3 border border-transparent rounded-xl shadow-sm text-sm font-bold text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-200">
                                                <i class="fa-solid fa-cart-plus mr-2 group-hover:animate-bounce"></i> 
                                                Tambah Keranjang
                                            </button>
                                        </form>
                                    @else
                                        <button disabled class="w-full flex items-center justify-center px-4 py-3 border border-gray-300 rounded-xl text-sm font-bold text-gray-400 bg-gray-100 cursor-not-allowed">
                                            <i class="fa-solid fa-ban mr-2"></i> Stok Habis
                                        </button>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="col-span-full flex justify-center items-center py-20">
                            <div class="text-center p-8">
                                <div class="bg-gray-100 rounded-full w-24 h-24 flex items-center justify-center mx-auto mb-4">
                                    <i class="fa-solid fa-box-open text-4xl text-gray-400"></i>
                                </div>
                                <h3 class="text-xl font-bold text-gray-900">Belum ada produk</h3>
                                <p class="text-gray-500 mt-2">Silakan cek kembali nanti.</p>
                            </div>
                        </div>
                    @endforelse

                </div>
                </div>
        </div>

        <a href="{{ route('cart.index') }}" class="fixed bottom-6 right-6 bg-blue-600 hover:bg-blue-700 text-white p-4 rounded-full shadow-2xl transition transform hover:scale-110 z-50 flex items-center justify-center group">
            <i class="fa-solid fa-shopping-cart text-2xl"></i>
            
            @auth
                @php
                    $count = \App\Models\Cart::where('user_id', Auth::id())->sum('quantity');
                @endphp
                @if($count > 0)
                    <span class="absolute -top-2 -right-2 bg-red-500 text-white text-xs font-bold px-2 py-1 rounded-full border-2 border-white">
                        {{ $count }}
                    </span>
                @endif
            @endauth
        </a>

    </x-app-layout>
</body>
</html>