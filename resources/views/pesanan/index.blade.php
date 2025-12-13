
<html> 
    <head> 
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Pesanan CV mitra pratama</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <link href="{{ asset('css/footer.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    </head>
    <body>
        <x-app-layout>
            <x-slot name="header">
                <h2 class="font-semibold text-xl  leading-tight">
                    {{ __('Data Pesanan') }}
                </h2>
            </x-slot>
            <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 ">
                               <div class="relative overflow-x-auto">
                                <table class="w-full text-sm text-left rtl:text-right ">
                                    <thead class="text-xs  uppercase bg-gray-50 dark:bg-gray-700 ">
                                        <tr>
                                            <th scope="col" class="px-6 py-3">
                                                Nama Pemesan
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Item Pesanan
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Total Harga
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Status
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Aksi
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data_Karyawan as $karyawan) 
                                        <tr> 
                                            <td scope="col" class="px-6 py-3">{{$pesanan->nama_pemesan}}</td> 
                                            <td scope="col" class="px-6 py-3">{{$pesanan->item_pesanan}}</td>
                                            <td scope="col" class="px-6 py-3">{{Number::currency($pesanan->total_harga, 'idr')}}</td>
                                            <td scope="col" class="px-6 py-3">{{$pesanan->status}}</td>
                                            <td scope="col" class="px-6 py-3"><a href="/pesanan/{{$pesanan->id}}/edit" class = "btn btn-warning btn-sm">Edit</a></td>
                                            <td scope="col" class="px-6 py-3"><a href="/pesanan/delete/{{$pesanan->id}}" class = "btn btn-danger btn-sm" onclick="return confirm('Yakin ingin dihapus?')">Hapus</a></td>
                                            
                                        @endforeach 

                                    </tbody>

                            </div>
                        </div>
                    </div>
                </div>
                
                
        
            
        </x-app-layout>
        
        
     
    </body> 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>      
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script> 
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>        
</html>   