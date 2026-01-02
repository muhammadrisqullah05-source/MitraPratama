
<html> 
    <head> 
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Karyawan CV mitra pratama</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <link href="{{ asset('css/footer.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://cdn.tailwindcss.com"></script>    

    </head>
    <body>
        <x-app-layout>
            <x-slot name="header">
                <h2 class="font-semibold text-xl  leading-tight">
                    {{ __('Data Karyawan') }}
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
                                                Nama
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Alamat
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Nomor HP
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Tanggal Lahir
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Tempat Lahir
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Jumlah Keluarga	
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Posisi	
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Gaji
                                            </th>
                                            <th scope="col" class="px-6 py-3">
                                                Aksi
                                            </th>
                                            <th><button type="button" class="btn btn-primary btn-sm float right" data-toggle="modal" data-target="#exampleModal">Tambah Data</button> </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($data_Karyawan as $karyawan) 
                                        <tr> 
                                            <td scope="col" class="px-6 py-3">{{$karyawan->nama}}</td> 
                                            <td scope="col" class="px-6 py-3">{{$karyawan->alamat}}</td>
                                            <td scope="col" class="px-6 py-3">{{$karyawan->no_hp}}</td> 
                                            <td scope="col" class="px-6 py-3">{{$karyawan->tanggal_lahir}}</td>
                                            <td scope="col" class="px-6 py-3">{{$karyawan->tempat_lahir}}</td>
                                            <td scope="col" class="px-6 py-3">{{$karyawan->jumlah_keluarga}}</td>
                                            <td scope="col" class="px-6 py-3">{{$karyawan->posisi}}</td>
                                            <td scope="col" class="px-6 py-3">{{Number::currency($karyawan->gaji, 'idr')}}</td>
                                            <td scope="col" class="px-6 py-3"><a href="/karyawan/{{$karyawan->id}}/edit" class = "btn btn-warning btn-sm">Edit</a></td>
                                            <td scope="col" class="px-6 py-3"><a href="/karyawan/delete/{{$karyawan->id}}" class = "btn btn-danger btn-sm" onclick="return confirm('Yakin ingin dihapus?')">Hapus</a></td>
                                            
                                        @endforeach 

                                    </tbody>

                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="modal fade" id="exampleModal" tabindex="-1" arialabelledby="exampleModalLabel" aria-hidden="true"> 
                    <div class="modal-dialog"> 
                        <div class="modal-content"> 
                        <div class="modal-header"> 
                            <h5 class="modal-title" id="exampleModalLabel">Tambahkan Data</h5> 
                            <button type="button" class="close" data-dismiss="modal" arialabel="Close"> <span aria-hidden="true">&times;</span> 
                            </button> 
                        </div> 
                        <div class="modal-body"> 
                        <form action="/karyawan/create" method="POST"> 
                                {{csrf_field()}} 
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Nama</label> 
                                <input name="nama"input type="text" class="form-control" id="inputNama" placeholder="Nama">
                            </div> 
                            <div class="form-group col-md-6">
                                <label for="exampleFormControlTextarea1">Alamat</label> 
                                <input name="alamat"input type="text" class="form-control" id="inputAlamat" placeholder="Alamat">
                            </div> 
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Nomor Hp</label> 
                                <input name="no_hp"input type="number" class="form-control" id="inputAlamat" placeholder="Nomor HP">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Tanggal Lahir</label> 
                                <input name="tanggal_lahir" input type="date" class="form-control" id="inputTgl" placeholder="Alamat">
                            </div> 
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Tempat lahir</label>    
                                <input name="tempat_lahir" input type="text" class="form-control" id="inputTempat" placeholder="Tempat Lahir">
                            </div> 
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Jumlah Keluarga</label> 
                                <input name="jumlah_keluarga" input type="number" class="form-control" id="inputJmlhKlg" placeholder="Jumlah Keluarga">
                            </div>  
                            <div class="form-group col-md-6">
                                <label for="exampleInputEmail1">Posisi</label> 
                            <input name="posisi"input type="text" class="form-control" id="inputPosisi" placeholder="Posisi">
                            </div>  
                        <div class="form-group col-md-6"> 
                                <label for="exampleInputEmail1">Gaji</label> 
                                <input name="gaji" input type="number" class="form-control" id="inputGaji" placeholder="Gaji">
                            </div>
                            
                        </div> 
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Submit</button> 
                            </form> 
                        </div> 
                        </div> 
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