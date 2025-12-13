<html>
    <head>
        
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Produk</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
        <script src="{{ asset('css/produk.css') }}" defer></script>

    </head>
    <body>
        <x-app-layout>
            <x-slot name="header">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Produk') }}
                </h2>
            </x-slot>
        @forelse ($data_produk as $data_produk)
             <div class="container mt-5 mb-5">
                <div class="d-flex justify-content-center row">
                    <div class="col-md-10">
                        <div class="row p-2 bg-white border rounded">
                            <div class="col-md-3 mt-1"><img class="img-fluid img-responsive rounded product-image" src="/images/{{ $data_produk->image }}"></div>
                            <div class="col-md-6 mt-1">
                                <h5>{{ $data_produk->nama_barang }}</h5>
                                <br>
                                <p class="text-justify  para mb-0">{{ $data_produk->detail }}</p>
                            </div>
                            <div class="align-items-center align-content-center col-md-3 border-left mt-1">
                                <div class="d-flex flex-row align-items-center">
                                    <h4 class="mr-1">{{ Number::currency($data_produk->harga_barang, 'idr') }}</h4>
                                </div>
                                <h6 class="text-success">Stock {{ $data_produk->stock }}</h6>
                                <div class="d-flex flex-column mt-4"><button class="btn btn-outline-primary btn-sm mt-2" type="button">Tambahkan ke keranjang</button></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
                            <tr>
                                <td colspan="5">There are no data.</td>
                            </tr>
        @endforelse
        


        
        </x-app-layout>
        
        
    
    </body>
</html>
