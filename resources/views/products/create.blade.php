

<html>
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Tambahkan Produk</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

    </head>
    <body>
        <x-app-layout>
            <x-slot name="header">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Produk') }}
                </h2>
            </x-slot>

    

        
            <div class="card mt-5">
                <h2 class="card-header">Tambahkan Produk Baru</h2>
                <div class="card-body">
                
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a class="btn btn-primary btn-sm" href="{{ route('products.index') }}"><i class="fa fa-arrow-left"></i> Back</a>
                    </div>
                
                    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                
                        <div class="mb-3">
                            <label for="inputName" class="form-label"><strong>Name:</strong></label>
                            <input 
                                type="text" 
                                name="nama_barang" 
                                class="form-control @error('nama_barang') is-invalid @enderror" 
                                id="inputName" 
                                placeholder="Nama Barang">
                            @error('nama_barang')
                                <div class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="inputHarga" class="form-label"><strong>Harga:</strong></label>
                            <input 
                                type="text" 
                                name="harga_barang" 
                                class="form-control @error('harga_barang') is-invalid @enderror" 
                                id="inputHarga" 
                                placeholder="Harga Barang">
                            @error('harga_barang')
                                <div class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="inputStock" class="form-label"><strong>Stock:</strong></label>
                            <input 
                                type="text" 
                                name="stock" 
                                class="form-control @error('stock') is-invalid @enderror" 
                                id="inputStock" 
                                placeholder="Stock">    
                            @error('stock')
                                <div class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="inputDetail" class="form-label"><strong>Detail:</strong></label>
                            <textarea 
                                class="form-control @error('detail') is-invalid @enderror" 
                                style="height:150px" 
                                name="detail" 
                                id="inputDetail" 
                                placeholder="Detail"></textarea>
                            @error('detail')
                                <div class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="inputImage" class="form-label"><strong>Image:</strong></label>
                            <input 
                                type="file" 
                                name="image" 
                                class="form-control @error('image') is-invalid @enderror" 
                                id="inputImage">
                            @error('image')
                                <div class="form-text text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
                    </form>
                
                </div>
            </div>
        </x-app-layout>
    </body>
</html>

