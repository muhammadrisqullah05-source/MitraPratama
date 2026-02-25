<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Riwayat Pesanan Saya</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
</head>
<body class="bg-gray-50 font-sans antialiased">
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Riwayat Pesanan Saya') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                
                @if(session('success'))
                    <div class="mb-6 bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded shadow-sm flex items-center gap-3">
                        <i class="fa-solid fa-circle-check text-2xl"></i>
                        <div>
                            <p class="font-bold">Sukses!</p>
                            <p>{{ session('success') }}</p>
                        </div>
                    </div>
                @endif

                <div class="space-y-6">
                    @forelse($orders as $order)
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-gray-100 hover:shadow-md transition-shadow duration-300">
                            
                            <div class="bg-gray-50 px-6 py-4 border-b flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                                <div>
                                    <div class="flex items-center gap-2">
                                        <i class="fa-solid fa-file-invoice text-gray-400"></i>
                                        <span class="font-bold text-gray-800 text-lg">{{ $order->invoice_number }}</span>
                                    </div>
                                    <div class="flex items-center gap-2 mt-1 ml-6 text-sm text-gray-700">
                                        <i class="fa-solid fa-user text-gray-400 text-xs"></i>
                                        <span>Pemesan: <span class="font-semibold">{{ $order->user->name }}</span></span>
                                    </div>
                                    <div class="text-xs text-gray-500 mt-1 ml-6">
                                        Dipesan pada: {{ $order->created_at->format('d M Y, H:i') }} WIB
                                    </div>
                                </div>
                                
                                <div class="flex flex-col items-end">
                                    <span class="px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wide
                                        {{ $order->status == 'pending' ? 'bg-yellow-100 text-yellow-700 border border-yellow-200' : '' }}
                                        {{ $order->status == 'paid' ? 'bg-blue-100 text-blue-700 border border-blue-200' : '' }}
                                        {{ $order->status == 'shipped' ? 'bg-indigo-100 text-indigo-700 border border-indigo-200' : '' }}
                                        {{ $order->status == 'completed' ? 'bg-green-100 text-green-700 border border-green-200' : '' }}
                                        {{ $order->status == 'cancelled' ? 'bg-red-100 text-red-700 border border-red-200' : '' }}">
                                        {{ $order->status }}
                                    </span>
                                    <div class="mt-2 text-sm text-gray-500">
                                        Total Bayar: <span class="font-bold text-emerald-600 text-lg">Rp {{ number_format($order->total_price, 0, ',', '.') }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="p-6 bg-white">
                                <div class="grid grid-cols-1 gap-6">
                                    @foreach($order->items as $item)
                                        <div class="flex items-start justify-between border-b border-gray-100 pb-4 last:border-0 last:pb-0">
                                            <div class="flex items-start gap-4">
                                                <div class="h-20 w-20 flex-shrink-0 overflow-hidden rounded-lg border border-gray-200 bg-gray-50">
                                                    <img src="{{ asset('images/' . $item->product->image) }}" 
                                                         alt="{{ $item->product->nama_barang }}" 
                                                         class="h-full w-full object-cover object-center">
                                                </div>
                                                
                                                <div>
                                                    <h4 class="text-base font-bold text-gray-800">{{ $item->product->nama_barang }}</h4>
                                                    <p class="text-sm text-gray-500 mt-1">
                                                        <span class="font-medium text-gray-700">{{ $item->quantity }} x</span> 
                                                        Rp {{ number_format($item->price, 0, ',', '.') }}
                                                    </p>
                                                </div>
                                            </div>
                                            
                                            <div class="text-right">
                                                <div class="text-sm font-bold text-gray-900">
                                                    Rp {{ number_format($item->price * $item->quantity, 0, ',', '.') }}
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="bg-gray-50 px-6 py-4 border-t border-gray-100 flex justify-end gap-3">
                                <button class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">
                                    Lihat Detail
                                </button>
                                
                                @if($order->status == 'pending')
                                    <button class="inline-flex items-center px-4 py-2 bg-emerald-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-emerald-700 focus:bg-emerald-700 active:bg-emerald-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 shadow-md">
                                        <i class="fa-solid fa-credit-card mr-2"></i> Bayar Sekarang
                                    </button>
                                @endif
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-20 bg-white rounded-xl shadow-sm border border-dashed border-gray-300">
                            <div class="bg-gray-50 rounded-full w-20 h-20 flex items-center justify-center mx-auto mb-4">
                                <i class="fa-solid fa-bag-shopping text-3xl text-gray-400"></i>
                            </div>
                            <h3 class="text-xl font-bold text-gray-900">Belum ada riwayat pesanan</h3>
                            <p class="text-gray-500 mt-2 mb-6 max-w-sm mx-auto">Anda belum pernah melakukan transaksi. Yuk mulai belanja produk kebutuhan Anda!</p>
                            <a href="{{ route('products.index') }}" class="inline-flex items-center px-6 py-3 bg-blue-600 border border-transparent rounded-lg font-semibold text-white hover:bg-blue-700 transition shadow-lg">
                                Mulai Belanja
                            </a>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </x-app-layout>
</body>
</html>