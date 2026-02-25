<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Karyawan CV Mitra Pratama</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <script src="https://cdn.tailwindcss.com"></script>
    
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    
</head>
<body class="font-sans antialiased bg-gray-100">

    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Data Karyawan') }}
            </h2>
        </x-slot>

        <div class="py-12" x-data="{ showModal: false }">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-lg font-medium">Daftar Karyawan</h3>
                            <button @click="showModal = true" type="button" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded shadow transition duration-150 ease-in-out">
                                <i class="fa fa-plus mr-1"></i> Tambah Data
                            </button>
                        </div>

                        <div class="relative overflow-x-auto border rounded-lg">
                            <table class="w-full text-sm text-left text-gray-500">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-b">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">Nama</th>
                                        <th scope="col" class="px-6 py-3">Alamat</th>
                                        <th scope="col" class="px-6 py-3">Nomor HP</th>
                                        <th scope="col" class="px-6 py-3">Tgl Lahir</th>
                                        <th scope="col" class="px-6 py-3">Tempat Lahir</th>
                                        <th scope="col" class="px-6 py-3">Jml Keluarga</th>
                                        <th scope="col" class="px-6 py-3">Posisi</th>
                                        <th scope="col" class="px-6 py-3">Gaji</th>
                                        <th scope="col" class="px-6 py-3 text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data_Karyawan as $karyawan) 
                                    <tr class="bg-white border-b hover:bg-gray-50">
                                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">{{$karyawan->nama}}</td>
                                        <td class="px-6 py-4">{{$karyawan->alamat}}</td>
                                        <td class="px-6 py-4">{{$karyawan->no_hp}}</td>
                                        <td class="px-6 py-4">{{$karyawan->tanggal_lahir}}</td>
                                        <td class="px-6 py-4">{{$karyawan->tempat_lahir}}</td>
                                        <td class="px-6 py-4">{{$karyawan->jumlah_keluarga}}</td>
                                        <td class="px-6 py-4">{{$karyawan->posisi}}</td>
                                        <td class="px-6 py-4 font-bold text-green-600">
                                            {{Number::currency($karyawan->gaji, 'IDR')}}
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            <div class="flex item-center justify-center space-x-2">
                                                <a href="/karyawan/{{$karyawan->id}}/edit" class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded text-xs transition">
                                                    Edit
                                                </a>
                                                <a href="/karyawan/delete/{{$karyawan->id}}" onclick="return confirm('Yakin ingin dihapus?')" class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded text-xs transition">
                                                    Hapus
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        
                    </div>
                </div>
            </div>

            <div x-show="showModal" 
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0"
                 x-transition:enter-end="opacity-100"
                 x-transition:leave="transition ease-in duration-200"
                 x-transition:leave-start="opacity-100"
                 x-transition:leave-end="opacity-0"
                 class="fixed inset-0 bg-gray-500 bg-opacity-75 z-40 transition-opacity" 
                 style="display: none;"></div>

            <div x-show="showModal" 
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                 x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                 x-transition:leave="transition ease-in duration-200"
                 x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                 x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                 class="fixed inset-0 z-50 overflow-y-auto" 
                 style="display: none;">
                 
                <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                    <div class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-2xl">
                        
                        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4 border-b">
                            <div class="sm:flex sm:items-start justify-between">
                                <h3 class="text-xl font-semibold leading-6 text-gray-900" id="modal-title">Tambahkan Data Karyawan</h3>
                                <button @click="showModal = false" type="button" class="text-gray-400 hover:text-gray-500">
                                    <span class="sr-only">Close</span>
                                    <i class="fa fa-times text-xl"></i>
                                </button>
                            </div>
                        </div>

                        <form action="/karyawan/create" method="POST">
                            {{ csrf_field() }}
                            <div class="bg-white px-4 py-5 sm:p-6">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    
                                    <div>
                                        <label for="inputNama" class="block text-sm font-medium text-gray-700">Nama</label>
                                        <input type="text" name="nama" id="inputNama" placeholder="Nama Lengkap" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm border p-2">
                                    </div>

                                    <div>
                                        <label for="inputAlamat" class="block text-sm font-medium text-gray-700">Alamat</label>
                                        <input type="text" name="alamat" id="inputAlamat" placeholder="Alamat Domisili" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm border p-2">
                                    </div>

                                    <div>
                                        <label for="inputHp" class="block text-sm font-medium text-gray-700">Nomor HP</label>
                                        <input type="number" name="no_hp" id="inputHp" placeholder="08xxx" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm border p-2">
                                    </div>

                                    <div>
                                        <label for="inputTgl" class="block text-sm font-medium text-gray-700">Tanggal Lahir</label>
                                        <input type="date" name="tanggal_lahir" id="inputTgl" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm border p-2">
                                    </div>

                                    <div>
                                        <label for="inputTempat" class="block text-sm font-medium text-gray-700">Tempat Lahir</label>
                                        <input type="text" name="tempat_lahir" id="inputTempat" placeholder="Kota Kelahiran" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm border p-2">
                                    </div>

                                    <div>
                                        <label for="inputJmlhKlg" class="block text-sm font-medium text-gray-700">Jumlah Keluarga</label>
                                        <input type="number" name="jumlah_keluarga" id="inputJmlhKlg" placeholder="0" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm border p-2">
                                    </div>

                                    <div>
                                        <label for="inputPosisi" class="block text-sm font-medium text-gray-700">Posisi</label>
                                        <input type="text" name="posisi" id="inputPosisi" placeholder="Jabatan" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm border p-2">
                                    </div>

                                    <div>
                                        <label for="inputGaji" class="block text-sm font-medium text-gray-700">Gaji</label>
                                        <div class="relative mt-1 rounded-md shadow-sm">
                                            <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                                              <span class="text-gray-500 sm:text-sm">Rp</span>
                                            </div>
                                            <input type="number" name="gaji" id="inputGaji" class="block w-full rounded-md border-gray-300 pl-10 focus:border-blue-500 focus:ring-blue-500 sm:text-sm border p-2" placeholder="0">
                                        </div>
                                    </div>

                                </div>
                            </div>
                            
                            <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                                <button type="submit" class="inline-flex w-full justify-center rounded-md bg-blue-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-500 sm:ml-3 sm:w-auto">Simpan</button>
                                <button @click="showModal = false" type="button" class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">Batal</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            </div>
    </x-app-layout>

</body>
</html>