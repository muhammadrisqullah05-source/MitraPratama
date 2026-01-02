 <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Produk</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
         <script src="https://cdn.tailwindcss.com"></script>

    </head>
    <body>
        <x-app-layout>
            <x-slot name="header">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Produk') }}
                </h2>
            </x-slot>
            <div class="card mt-5">
            <h2 class="card-header">Produk Mitra Pratama</h2>
            <div class="card-body">
                    
                    @session('success')
                        <div class="alert alert-success" role="alert"> {{ $value }} </div>
                    @endsession
            
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a class="btn btn-info btn-sm" href="{{ route('produk') }}"> </i> Lihat Tampilan User</a>
                        <a class="btn btn-success btn-sm" href="{{ route('products.create') }}"> <i class="fa fa-plus"></i> Tambahkan Data Baru</a>
                    </div>
            
                    <table class="table table-bordered table-striped mt-4">
                        <thead>
                            <tr>
                                <th width="80px">No</th>
                                <th>Nama Barang</th>
                                <th>Stock</th>
                                <th>Harga</th>
                                <th>Foto</th>
                                <th>Detail</th>
                                <th width="250px">Action</th>
                            </tr>
                        </thead>
            
                        <tbody>
                        @forelse ($products as $product)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $product->nama_barang }}</td>
                                <td>{{ $product->stock }}</td>
                                <td>{{ $product->harga_barang }}</td>
                                <td><img src="/images/{{ $product->image }}" width="100px"></td>
                                <td>{{ $product->detail }}</td>
                                <td>
                                    <form action="{{ route('products.destroy',$product->id) }}" method="POST">
                        
                                        
                                        <a class="btn btn-primary btn-sm" href="{{ route('products.edit',$product->id) }}"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                        
                                        @csrf
                                        @method('DELETE')
                            
                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i> Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">There are no data.</td>
                            </tr>
                        @endforelse
                        </tbody>
            
                    </table>
                    
                    {!! $products->withQueryString()->links('pagination::bootstrap-5') !!}
            </div>
            </div>      
        </x-app-layout>
    </body>
