<html>
    <head> 
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Pelanggan CV mitra pratama</title>
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
                    <form action="/datapelanggan/{{$data_user->id}}/update" method="POST"> 
                        {{csrf_field()}} 
                        <div class="card text-center ">
                            <div class="card-header ">
                                Edit Data
                            </div>
                            <div class="form-group ">
                        <label for="exampleInputEmail1">Nama</label> 
                        <input name="name"input type="text" class="form-control" id="inputNama" placeholder="name" value = "{{$data_user->name}}"> 
                    </div> 

                    <div class="form-group ">
                        <label for="exampleFormControlTextarea1">email</label> 
                        <textarea name="email" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="email">{{$data_user->email}}</textarea> 
                        
                    </div> 
                    <label for="exampleFormControlTextarea1">Role</label> 

             
                    <div class="input-group mb-3">
                    <select class="form-select" id="inputGroupSelect03" aria-label="Example select with button addon" name="role"> 
                        <option selected>{{$data_user->role}}</option>
                        <option value="1">admin</option>
                        <option value="2">kasir</option>
                        <option value="3">user</option>
                    </select>
                    </div>


                    
    
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