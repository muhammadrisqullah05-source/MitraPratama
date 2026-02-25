<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>Edit Produk - {{ $product->nama_barang }}</title>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <script src="https://cdn.tailwindcss.com"></script>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
</head>
<body class="font-sans antialiased bg-gray-100">

    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Edit Produk') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
                
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    
                    <div class="px-6 py-4 border-b border-gray-200 bg-gray-50 flex justify-between items-center">
                        <h3 class="text-lg font-bold text-gray-800">
                            <i class="fa-solid fa-pen-to-square mr-2 text-blue-500"></i> Edit Data Produk
                        </h3>
                        <a href="{{ route('products.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            <i class="fa fa-arrow-left mr-2"></i> Kembali
                        </a>
                    </div>

                    <div class="p-6 sm:p-8">
                        
                        <form action="{{ route('products.update',$product->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                    
                            <div class="mb-5">
                                <label for="inputName" class="block text-sm font-medium text-gray-700 mb-1">Nama Barang</label>
                                <input 
                                    type="text" 
                                    name="nama_barang" 
                                    id="inputName" 
                                    value="{{ $product->nama_barang }}"
                                    class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm py-2.5 px-3 border @error('nama_barang') border-red-500 ring-red-500 @enderror"
                                    placeholder="Masukkan nama produk">
                                
                                @error('nama_barang')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-5">
                                
                                <div>
                                    <label for="inputHarga" class="block text-sm font-medium text-gray-700 mb-1">Harga (Rp)</label>
                                    <div class="relative rounded-md shadow-sm">
                                        <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                          <span class="text-gray-500 sm:text-sm">Rp</span>
                                        </div>
                                        <input 
                                            type="number" 
                                            name="harga_barang" 
                                            id="inputHarga" 
                                            value="{{ $product->harga_barang }}"
                                            class="block w-full rounded-md border-gray-300 pl-10 py-2.5 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm border @error('harga_barang') border-red-500 @enderror"
                                            placeholder="0">
                                    </div>
                                    @error('harga_barang')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div>
                                    <label for="inputStock" class="block text-sm font-medium text-gray-700 mb-1">Stock Barang</label>
                                    <input 
                                        type="number" 
                                        name="stock" 
                                        id="inputStock" 
                                        value="{{ $product->stock }}"
                                        class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm py-2.5 px-3 border @error('stock') border-red-500 @enderror"
                                        placeholder="Jumlah stock">
                                    @error('stock')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                    
                            <div class="mb-5">
                                <label for="inputDetail" class="block text-sm font-medium text-gray-700 mb-1">Detail Produk</label>
                                <textarea 
                                    name="detail" 
                                    id="inputDetail" 
                                    rows="4"
                                    class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm py-2 px-3 border @error('detail') border-red-500 @enderror"
                                    placeholder="Deskripsi lengkap produk...">{{ $product->detail }}</textarea>
                                @error('detail')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="mb-6 p-4 bg-gray-50 rounded-lg border border-gray-200 border-dashed">
                                <label for="inputImage" class="block text-sm font-medium text-gray-700 mb-2">Foto Produk</label>
                                
                                <div class="flex flex-col md:flex-row gap-6 items-start">
                                    <div class="w-full md:w-1/2">
                                        <input 
                                            type="file" 
                                            name="image" 
                                            id="inputImage" 
                                            class="block w-full text-sm text-gray-500
                                              file:mr-4 file:py-2 file:px-4
                                              file:rounded-full file:border-0
                                              file:text-sm file:font-semibold
                                              file:bg-indigo-50 file:text-indigo-700
                                              hover:file:bg-indigo-100 transition
                                            ">
                                        <p class="mt-2 text-xs text-gray-500">Kosongkan jika tidak ingin mengubah foto.</p>
                                        @error('image')
                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="w-full md:w-1/2 text-center md:text-left">
                                        <span class="block text-xs font-semibold text-gray-500 mb-2">Foto Saat Ini:</span>
                                        <div class="inline-block p-1 border rounded-md shadow-sm bg-white">
                                            <img src="/images/{{ $product->image }}" alt="Current Image" class="max-h-40 rounded object-cover">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="flex justify-end pt-4 border-t border-gray-100">
                                <button type="submit" class="inline-flex items-center px-5 py-2.5 bg-emerald-600 border border-transparent rounded-md font-semibold text-sm text-white uppercase tracking-widest hover:bg-emerald-700 active:bg-emerald-800 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:ring-offset-2 transition ease-in-out duration-150 shadow-md">
                                    <i class="fa-solid fa-floppy-disk mr-2"></i> Update Produk
                                </button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
            
    </x-app-layout>
</body>
</html>