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

    </head>
    <body>
        
        <x-app-layout>
            <x-slot name="header">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Edit Data') }}
                </h2>
            </x-slot>
            @if(session('sukses')) 
            <div class="alert alert-success" role="alert"> 
            {{session('sukses')}} 
            </div> 
                    @endif 
                    <div class="row"> 
                    <form action="/karyawan/{{$karyawan->id}}/update" method="POST"> 
                        {{csrf_field()}} 
                        <div class="card text-center ">
                            <div class="card-header ">
                                Edit Data
                            </div>
                            <div class="form-group ">
                        <label for="exampleInputEmail1">Nama</label> 
                        <input name="nama"input type="text" class="form-control" id="inputNama" placeholder="Nama" value = "{{$karyawan->nama}}"> 
                    </div> 

                    <div class="form-group ">
                        <label for="exampleFormControlTextarea1">Alamat</label> 
                        <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Alamat Mahasiswa">{{$karyawan->alamat}}</textarea> 
                        
                    </div> 

                    <div class="form-group  ">
                        <label for="exampleInputEmail1">Nomor Hp</label> 
                        <input name="no_hp"input type="number" class="form-control" id="inputAlamat" placeholder="Nomor HP" value = "{{$karyawan->no_hp}}">
                    </div>

                    <div class="form-group ">
                        <label for="exampleInputEmail1">Tanggal Lahir</label> 
                        <input name="tanggal_lahir" input type="date" class="form-control" id="inputTgl" placeholder="Alamat" value = "{{$karyawan->tanggal_lahir}}">
                    </div> 

                    <div class="form-group ">
                        <label for="exampleInputEmail1">Tempat lahir</label>    
                        <input name="tempat_lahir" input type="text" class="form-control" id="inputTempat" placeholder="Tempat Lahir" value = "{{$karyawan->tempat_lahir}}">
                    </div> 

                    <div class="form-group ">
                        <label for="exampleInputEmail1">Jumlah Keluarga</label> 
                        <input name="jumlah_keluarga" input type="number" class="form-control" id="inputJmlhKlg" placeholder="Jumlah Keluarga" value = "{{$karyawan->jumlah_keluarga}}">
                    </div>

                    <div class="form-group ">
                        <label for="exampleInputEmail1">Posisi</label> 
                    <input name="posisi"input type="text" class="form-control" id="inputPosisi" placeholder="Posisi"value = "{{$karyawan->posisi}}">
                    </div>  

                <div class="form-group "> 
                        <label for="exampleInputEmail1">Gaji</label> 
                        <input name="gaji" input type="number" class="form-control" id="inputGaji" placeholder="Gaji"value = "{{$karyawan->gaji}}">
                    </div>
                    <div class="form-group "> 
                    <button type="submit" class="btn btn-warning">Update</button> 
                    </div> 
                        </div> 
                    </div>
                            
                    

                    
                    </form> 
            </div> 

        
    </x-app-layout>

    </body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>  
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" cross origin="anonymous"></script> 
</html>