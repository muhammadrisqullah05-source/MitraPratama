<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Produk</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
     <script src="https://cdn.tailwindcss.com"></script>
    
    <style>
        /* Style Tambahan untuk Ikon Keranjang Melayang */
        .floating-cart {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 9999;
            background-color: #0d6efd;
            color: white;
            padding: 10px 20px;
            border-radius: 50px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
            text-decoration: none;
            transition: all 0.3s;
        }
        .floating-cart:hover {
            background-color: #0b5ed7;
            color: white;
            transform: scale(1.05);
        }
        .cart-badge {
            background-color: #dc3545;
            color: white;
            border-radius: 50%;
            padding: 2px 8px;
            font-size: 0.8rem;
            margin-left: 5px;
        }
    </style>
</head>
<body>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Produk') }}
            </h2>
        </x-slot>

        <a href="#" class="floating-cart">
            <i class="fa fa-shopping-cart"></i> Keranjang
            <span id="cart-count" class="cart-badge">
                {{ count((array) session('cart')) }}
            </span>
        </a>

        @forelse ($data_produk as $item)
            <div class="container mt-5 mb-5">
                <div class="d-flex justify-content-center row">
                    <div class="col-md-10">
                        <div class="row p-2 bg-white border rounded">
                            <div class="col-md-3 mt-1">
                                <img class="img-fluid img-responsive rounded product-image" 
                                     src="{{ asset('images/' . $item->image) }}" 
                                     alt="{{ $item->nama_barang }}">
                            </div>
                            <div class="col-md-6 mt-1">
                                <h5>{{ $item->nama_barang }}</h5>
                                <br>
                                <p class="text-justify para mb-0">{{ $item->detail }}</p>
                            </div>
                            <div class="align-items-center align-content-center col-md-3 border-left mt-1">
                                <div class="d-flex flex-row align-items-center">
                                    <h4 class="mr-1">Rp {{ number_format($item->harga_barang, 0, ',', '.') }}</h4>
                                </div>
                                <h6 class="text-success">Stock {{ $item->stock }}</h6>
                                <div class="d-flex flex-column mt-4">
                                    <button class="btn btn-outline-primary btn-sm mt-2 btn-add-cart" 
                                            type="button" 
                                            data-id="{{ $item->id }}">
                                        <i class="fa fa-cart-plus"></i> Tambahkan ke keranjang
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="container text-center mt-5">
                <p>Tidak ada data produk.</p>
            </div>
        @endforelse

    </x-app-layout>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    
    <script type="text/javascript">
        $(document).ready(function() {
            
            // Saat tombol ditekan
            $(".btn-add-cart").click(function(e) {
                e.preventDefault();
                
                var button = $(this);
                var productId = button.attr("data-id");

                // Efek loading sederhana pada tombol
                var originalText = button.html();
                button.html('<i class="fa fa-spinner fa-spin"></i> Menambahkan...');
                button.prop('disabled', true);

                $.ajax({
                    url: '{{ route("add.to.cart") }}',
                    method: "POST",
                    data: {
                        _token: $('meta[name="csrf-token"]').attr('content'),
                        id: productId
                    },
                    success: function (response) {
                        // 1. Update angka di keranjang kanan atas
                        $('#cart-count').text(response.total_items);
                        
                        // 2. Kembalikan tombol ke semula
                        button.html(originalText);
                        button.prop('disabled', false);

                        // 3. Tampilkan notifikasi (Alert sederhana)
                        // Anda bisa ganti dengan SweetAlert jika mau lebih bagus
                        alert(response.message);
                    },
                    error: function (xhr) {
                        button.html(originalText);
                        button.prop('disabled', false);
                        console.log(xhr.responseText);
                        alert("Gagal menambahkan ke keranjang. Coba lagi.");
                    }
                });
            });
        });
    </script>
</body>
</html>