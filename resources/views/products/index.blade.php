<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Daftar Produk</title>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <script src="https://cdn.tailwindcss.com"></script>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
</head>

<body class="bg-gray-100 font-sans antialiased">
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Manajemen Produk') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                
                @session('success')
                <div class="mb-4 bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded shadow-sm flex items-center justify-between" role="alert">
                    <div>
                        <p class="font-bold">Berhasil!</p>
                        <p>{{ $value }}</p>
                    </div>
                    <button onclick="this.parentElement.remove()" class="text-green-700 hover:text-green-900">
                        <i class="fa-solid fa-times"></i>
                    </button>
                </div>
                @endsession

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        
                        <div class="flex flex-col md:flex-row justify-between items-center mb-6 space-y-4 md:space-y-0">
                            <h3 class="text-lg font-bold text-gray-800   pl-3">
                                Produk Mitra Pratama
                            </h3>
                            
                            <div class="flex space-x-3">
                                <a href="{{ route('produk') }}" class="inline-flex items-center px-4 py-2 bg-sky-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-sky-600 focus:bg-sky-700 active:bg-sky-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 shadow-sm">
                                    <i class="fa-solid fa-eye mr-2"></i> Tampilan User
                                </a>
                                <a href="{{ route('products.create') }}" class="inline-flex items-center px-4 py-2 bg-emerald-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-emerald-700 focus:bg-emerald-700 active:bg-emerald-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 shadow-sm">
                                    <i class="fa fa-plus mr-2"></i> Tambah Baru
                                </a>
                            </div>
                        </div>

                        <div class="relative overflow-x-auto border rounded-lg">
                            <table class="w-full text-sm text-left text-gray-500">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-b">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-center w-16">No</th>
                                        <th scope="col" class="px-6 py-3">Foto</th>
                                        <th scope="col" class="px-6 py-3">Nama Barang</th>
                                        <th scope="col" class="px-6 py-3">Stock</th>
                                        <th scope="col" class="px-6 py-3">Harga</th>
                                        <th scope="col" class="px-6 py-3 w-1/4">Detail</th>
                                        <th scope="col" class="px-6 py-3 text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($products as $product)
                                    <tr class="bg-white border-b hover:bg-gray-50 transition duration-150">
                                        <td class="px-6 py-4 text-center font-medium">{{ ++$i }}</td>
                                        <td class="px-6 py-4">
                                            <div class="h-16 w-16 flex-shrink-0 overflow-hidden rounded-md border border-gray-200">
                                                <img class="h-full w-full object-cover object-center" src="/images/{{ $product->image }}" alt="{{ $product->nama_barang }}">
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 font-semibold text-gray-900">
                                            {{ $product->nama_barang }}
                                        </td>
                                        <td class="px-6 py-4">
                                            <span class="inline-flex items-center rounded-md bg-blue-50 px-2 py-1 text-xs font-medium text-blue-700 ring-1 ring-inset ring-blue-700/10">
                                                {{ $product->stock }} Unit
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 font-bold text-emerald-600">
                                            Rp {{ number_format($product->harga_barang, 0, ',', '.') }}
                                        </td>
                                        <td class="px-6 py-4">
                                            <p class="truncate max-w-xs text-gray-500" title="{{ $product->detail }}">
                                                {{ $product->detail }}
                                            </p>
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            <form action="{{ route('products.destroy',$product->id) }}" method="POST" class="flex justify-center space-x-2">
                                                
                                                <a href="{{ route('products.edit',$product->id) }}" class="inline-flex items-center px-3 py-1.5 bg-amber-400 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-amber-500 active:bg-amber-600 transition ease-in-out duration-150" title="Edit">
                                                    <i class="fa-solid fa-pen-to-square"></i>
                                                </a>

                                                @csrf
                                                @method('DELETE')
                                                
                                                <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?')" class="inline-flex items-center px-3 py-1.5 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 active:bg-red-800 transition ease-in-out duration-150" title="Delete">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="7" class="px-6 py-10 text-center text-gray-500 bg-gray-50">
                                            <div class="flex flex-col items-center justify-center">
                                                <i class="fa-solid fa-box-open text-4xl mb-3 text-gray-300"></i>
                                                <p>Belum ada data produk tersedia.</p>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        <div class="mt-4">
                            {{ $products->links() }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
</body>