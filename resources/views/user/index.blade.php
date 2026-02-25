<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>Pelanggan CV Mitra Pratama</title>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <script src="https://cdn.tailwindcss.com"></script>
    
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <link href="{{ asset('css/footer.css') }}" rel="stylesheet">
</head>
<body class="font-sans antialiased bg-gray-100">

    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Data Pelanggan') }}
            </h2>
        </x-slot>

        <div class="py-12" x-data="{ openModal: false }">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        
                        <div class="flex justify-between items-center mb-6">
                            <h3 class="text-lg font-medium text-gray-700">Daftar Pelanggan</h3>
                            <button @click="openModal = true" type="button" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded shadow transition duration-150 flex items-center gap-2">
                                <i class="fa fa-plus"></i> Tambah Data
                            </button>
                        </div>

                        <div class="relative overflow-x-auto border rounded-lg">
                            <table class="w-full text-sm text-left text-gray-500">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-b">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">Nama</th>
                                        <th scope="col" class="px-6 py-3">Email</th>
                                        <th scope="col" class="px-6 py-3">Role</th>
                                        <th scope="col" class="px-6 py-3 text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200">
                                    @foreach($data_user as $user) 
                                    <tr class="bg-white hover:bg-gray-50">
                                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">{{ $user->name }}</td>
                                        <td class="px-6 py-4">{{ $user->email }}</td>
                                        <td class="px-6 py-4">
                                            <span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded">{{ $user->role }}</span>
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            <a href="/datapelanggan/{{ $user->id }}/edit" class="inline-flex items-center px-3 py-1.5 bg-amber-400 hover:bg-amber-500 text-white text-xs font-bold rounded transition">
                                                <i class="fa fa-pencil mr-1"></i> Edit
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach 
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>

            <div x-show="openModal" 
                 style="display: none;"
                 class="fixed inset-0 z-50 overflow-y-auto" 
                 aria-labelledby="modal-title" role="dialog" aria-modal="true">
                
                <div x-show="openModal"
                     x-transition:enter="ease-out duration-300"
                     x-transition:enter-start="opacity-0"
                     x-transition:enter-end="opacity-100"
                     x-transition:leave="ease-in duration-200"
                     x-transition:leave-start="opacity-100"
                     x-transition:leave-end="opacity-0"
                     class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

                <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
                    <div x-show="openModal"
                         x-transition:enter="ease-out duration-300"
                         x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                         x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                         x-transition:leave="ease-in duration-200"
                         x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                         x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                         @click.away="openModal = false"
                         class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all sm:my-8 sm:w-full sm:max-w-2xl">
                        
                        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 border-b">
                            <div class="flex items-center justify-between">
                                <h3 class="text-lg font-semibold leading-6 text-gray-900" id="modal-title">Tambahkan Data</h3>
                                <button @click="openModal = false" class="text-gray-400 hover:text-gray-500">
                                    <span class="sr-only">Close</span>
                                    <i class="fa fa-times text-xl"></i>
                                </button>
                            </div>
                        </div>

                        <form action="/karyawan/create" method="POST">
                            {{ csrf_field() }}
                            <div class="px-4 py-5 sm:p-6">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    
                                    <div>
                                        <label for="inputNama" class="block text-sm font-medium text-gray-700">Nama</label>
                                        <input type="text" name="nama" id="inputNama" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm border p-2" placeholder="Nama Lengkap">
                                    </div>

                                    <div>
                                        <label for="inputAlamat" class="block text-sm font-medium text-gray-700">Alamat</label>
                                        <input type="text" name="alamat" id="inputAlamat" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm border p-2" placeholder="Alamat">
                                    </div>

                                    <div>
                                        <label for="inputHp" class="block text-sm font-medium text-gray-700">Nomor HP</label>
                                        <input type="number" name="no_hp" id="inputHp" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm border p-2" placeholder="08xxx">
                                    </div>

                                    <div>
                                        <label for="inputTgl" class="block text-sm font-medium text-gray-700">Tanggal Lahir</label>
                                        <input type="date" name="tanggal_lahir" id="inputTgl" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm border p-2">
                                    </div>

                                    <div>
                                        <label for="inputTempat" class="block text-sm font-medium text-gray-700">Tempat Lahir</label>
                                        <input type="text" name="tempat_lahir" id="inputTempat" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm border p-2" placeholder="Kota Kelahiran">
                                    </div>

                                    <div>
                                        <label for="inputJmlhKlg" class="block text-sm font-medium text-gray-700">Jumlah Keluarga</label>
                                        <input type="number" name="jumlah_keluarga" id="inputJmlhKlg" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm border p-2" placeholder="Jumlah">
                                    </div>

                                    <div>
                                        <label for="inputPosisi" class="block text-sm font-medium text-gray-700">Posisi</label>
                                        <input type="text" name="posisi" id="inputPosisi" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm border p-2" placeholder="Jabatan">
                                    </div>

                                    <div>
                                        <label for="inputGaji" class="block text-sm font-medium text-gray-700">Gaji</label>
                                        <input type="number" name="gaji" id="inputGaji" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm border p-2" placeholder="Nominal Gaji">
                                    </div>

                                </div>
                            </div>
                            
                            <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                                <button type="submit" class="inline-flex w-full justify-center rounded-md bg-blue-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-blue-500 sm:ml-3 sm:w-auto">Simpan Data</button>
                                <button type="button" @click="openModal = false" class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto">Batal</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </x-app-layout>

</body>
</html>