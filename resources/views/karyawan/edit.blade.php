<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Edit Data Karyawan</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body class="font-sans antialiased bg-gray-100">

    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Edit Data Karyawan') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
                
                @if(session('sukses'))
                <div class="mb-4 bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded shadow-sm" role="alert">
                    <p class="font-bold">Berhasil!</p>
                    <p>{{session('sukses')}}</p>
                </div>
                @endif

                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    
                    <div class="bg-gray-50 px-6 py-4 border-b border-gray-200 flex justify-between items-center">
                        <h3 class="text-lg font-medium text-gray-900">Edit Data</h3>
                        <a href="/karyawan" class="text-sm text-gray-500 hover:text-gray-700 underline">Kembali</a>
                    </div>

                    <div class="p-6 sm:p-8">
                        <form action="/karyawan/{{$karyawan->id}}/update" method="POST">
                            {{ csrf_field() }}

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                                <div class="col-span-1">
                                    <label for="inputNama" class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                                    <input name="nama" type="text" id="inputNama" value="{{$karyawan->nama}}" 
                                           class="w-full rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-500 focus:outline-none transition sm:text-sm">
                                </div>

                                <div class="col-span-1">
                                    <label for="inputHp" class="block text-sm font-medium text-gray-700 mb-1">Nomor HP</label>
                                    <input name="no_hp" type="number" id="inputHp" value="{{$karyawan->no_hp}}"
                                           class="w-full rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-500 focus:outline-none transition sm:text-sm">
                                </div>

                                <div class="col-span-1 md:col-span-2">
                                    <label for="inputAlamat" class="block text-sm font-medium text-gray-700 mb-1">Alamat Domisili</label>
                                    <textarea name="alamat" id="inputAlamat" rows="3" 
                                              class="w-full rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-500 focus:outline-none transition sm:text-sm">{{$karyawan->alamat}}</textarea>
                                </div>

                                <div class="col-span-1">
                                    <label for="inputTempat" class="block text-sm font-medium text-gray-700 mb-1">Tempat Lahir</label>
                                    <input name="tempat_lahir" type="text" id="inputTempat" value="{{$karyawan->tempat_lahir}}"
                                           class="w-full rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-500 focus:outline-none transition sm:text-sm">
                                </div>

                                <div class="col-span-1">
                                    <label for="inputTgl" class="block text-sm font-medium text-gray-700 mb-1">Tanggal Lahir</label>
                                    <input name="tanggal_lahir" type="date" id="inputTgl" value="{{$karyawan->tanggal_lahir}}"
                                           class="w-full rounded-md border border-gray-300 px-3 py-2 text-gray-900 focus:border-blue-500 focus:ring-2 focus:ring-blue-500 focus:outline-none transition sm:text-sm">
                                </div>

                                <div class="col-span-1">
                                    <label for="inputJmlhKlg" class="block text-sm font-medium text-gray-700 mb-1">Jumlah Keluarga</label>
                                    <input name="jumlah_keluarga" type="number" id="inputJmlhKlg" value="{{$karyawan->jumlah_keluarga}}"
                                           class="w-full rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-500 focus:outline-none transition sm:text-sm">
                                </div>

                                <div class="col-span-1">
                                    <label for="inputPosisi" class="block text-sm font-medium text-gray-700 mb-1">Posisi / Jabatan</label>
                                    <input name="posisi" type="text" id="inputPosisi" value="{{$karyawan->posisi}}"
                                           class="w-full rounded-md border border-gray-300 px-3 py-2 text-gray-900 placeholder-gray-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-500 focus:outline-none transition sm:text-sm">
                                </div>

                                <div class="col-span-1 md:col-span-2">
                                    <label for="inputGaji" class="block text-sm font-medium text-gray-700 mb-1">Gaji (Rp)</label>
                                    <div class="relative rounded-md shadow-sm">
                                        <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                          <span class="text-gray-500 sm:text-sm">Rp</span>
                                        </div>
                                        <input name="gaji" type="number" id="inputGaji" value="{{$karyawan->gaji}}"
                                               class="block w-full rounded-md border border-gray-300 pl-10 px-3 py-2 text-gray-900 focus:border-blue-500 focus:ring-2 focus:ring-blue-500 focus:outline-none sm:text-sm transition">
                                    </div>
                                </div>

                            </div>

                            <div class="mt-8 flex justify-end gap-3">
                                <a href="/karyawan" class="px-4 py-2 bg-white border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                    Batal
                                </a>
                                <button type="submit" class="px-4 py-2 bg-yellow-500 border border-transparent rounded-md shadow-sm text-sm font-medium text-white hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500 transition ease-in-out duration-150">
                                    <i class="fa fa-save mr-2"></i> Update Data
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