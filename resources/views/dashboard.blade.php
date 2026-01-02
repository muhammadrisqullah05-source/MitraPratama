<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>Dashboard - CV Mitra Pratama</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Poppins', 'sans-serif'],
                    },
                    colors: {
                        brand: {
                            50: '#f0f9ff',
                            100: '#e0f2fe',
                            600: '#0284c7', // Warna Biru Utama
                            800: '#075985', // Warna Biru Gelap
                            900: '#0c4a6e',
                        }
                    }
                }
            }
        }
    </script>

    <style>
        /* Smooth Scrolling */
        html { scroll-behavior: smooth; }
    </style>
</head>
<body class="font-sans antialiased bg-gray-50">

    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard') }}
            </h2>
        </x-slot>

        <section class="relative bg-brand-900 py-20 lg:py-32 overflow-hidden">
            <div class="absolute inset-0 opacity-20">
                <img src="https://images.unsplash.com/photo-1541888946425-d81bb19240f5?q=80&w=2070&auto=format&fit=crop" class="w-full h-full object-cover" alt="Background Konstruksi">
            </div>
            
            <div class="relative container mx-auto px-6 text-center z-10">
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-6 leading-tight">
                    CV Mitra Pratama
                </h1>
                <p class="text-lg md:text-xl text-gray-200 max-w-2xl mx-auto mb-4 leading-relaxed">
                    Mitra terpercaya di bidang konstruksi proyek dan pengadaan barang berkualitas tinggi.
                </p>
                <p class="text-gray-400 text-sm md:text-base max-w-xl mx-auto">
                    Reputasi unggul dalam layanan development dan infrastruktur.
                </p>
                
                <div class="mt-10">
                    <a href="#about" class="inline-block px-8 py-3 bg-white text-brand-900 font-semibold rounded-full hover:bg-gray-100 transition duration-300 shadow-lg">
                        Pelajari Lebih Lanjut
                    </a>
                </div>
            </div>
        </section>

        <section id="about" class="py-16 md:py-24 bg-white">
            <div class="container mx-auto px-6">
                <div class="flex flex-col md:flex-row items-center gap-12">
                    <div class="w-full md:w-1/2">
                        <div class="relative rounded-2xl overflow-hidden shadow-2xl transform hover:scale-[1.02] transition duration-500">
                            <img src="/assets/img/pekerja.jpg" 
                                 onerror="this.src='https://images.unsplash.com/photo-1504307651254-35680f356dfd?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80'"
                                 alt="Karyawan" class="w-full h-80 md:h-96 object-cover">
                        </div>
                    </div>
                    <div class="w-full md:w-1/2">
                        <span class="text-brand-600 font-semibold tracking-wide uppercase text-sm">Tim Kami</span>
                        <h2 class="text-3xl font-bold text-gray-900 mt-2 mb-4">Karyawan Mitra Pratama</h2>
                        <p class="text-gray-600 leading-relaxed mb-4">
                            Didukung oleh tenaga ahli yang profesional dan berpengalaman, kami memastikan setiap proyek dikerjakan dengan standar tertinggi.
                        </p>
                        <p class="text-gray-600 leading-relaxed mb-8">
                            Kami percaya bahwa sumber daya manusia adalah aset utama dalam memberikan pelayanan terbaik bagi klien kami.
                        </p>
                        <a href="/karyawan" class="inline-flex items-center text-brand-600 font-semibold hover:text-brand-800 transition-colors">
                            Lihat Data Karyawan 
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <section id="proyek" class="py-16 md:py-24 bg-gray-50">
            <div class="container mx-auto px-6">
                <div class="flex flex-col-reverse md:flex-row items-center gap-12">
                    <div class="w-full md:w-1/2">
                        <span class="text-brand-600 font-semibold tracking-wide uppercase text-sm">Portfolio</span>
                        <h2 class="text-3xl font-bold text-gray-900 mt-2 mb-4">Proyek Infrastruktur</h2>
                        <p class="text-gray-600 leading-relaxed mb-4">
                            CV Mitra Pratama adalah kontraktor yang menyediakan layanan <em>end-to-end</em>, mulai dari tahap perencanaan desain hingga eksekusi pembangunan.
                        </p>
                        <p class="text-gray-600 leading-relaxed mb-8">
                            Kami berkomitmen memberikan kualitas bangunan yang kokoh, estetis, dan tepat waktu.
                        </p>
                        <a href="/project" class="inline-block px-6 py-3 bg-brand-600 text-white font-medium rounded-lg hover:bg-brand-700 transition shadow-md">
                            Lihat Peta Proyek
                        </a>
                    </div>
                    <div class="w-full md:w-1/2">
                        <div class="relative rounded-2xl overflow-hidden shadow-2xl transform hover:scale-[1.02] transition duration-500">
                             <img src="/assets/img/proyek.jpg" 
                                 onerror="this.src='https://images.unsplash.com/photo-1503387762-592deb58ef4e?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80'"
                                 alt="Proyek" class="w-full h-80 md:h-96 object-cover">
                        </div>
                    </div>
                </div>
            </div>
        </section> 

        <section id="pembelian" class="py-16 md:py-24 bg-white">
            <div class="container mx-auto px-6">
                <div class="flex flex-col md:flex-row items-center gap-12">
                    <div class="w-full md:w-1/2">
                        <div class="relative rounded-2xl overflow-hidden shadow-2xl transform hover:scale-[1.02] transition duration-500">
                             <img src="/assets/img/pembelian.jpg" 
                                 onerror="this.src='https://images.unsplash.com/photo-1554224155-8d04cb21cd6c?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80'"
                                 alt="Data Pembelian" class="w-full h-80 md:h-96 object-cover">
                        </div>
                    </div>
                    <div class="w-full md:w-1/2">
                        <span class="text-brand-600 font-semibold tracking-wide uppercase text-sm">Administrasi</span>
                        <h2 class="text-3xl font-bold text-gray-900 mt-2 mb-4">Data Pesanan & Pengadaan</h2>
                        <p class="text-gray-600 leading-relaxed mb-4">
                            Transparansi dan akurasi data adalah prioritas kami. Sistem pencatatan kami memastikan setiap pesanan dan pengeluaran terdata dengan rapi.
                        </p>
                        <p class="text-gray-600 leading-relaxed mb-8">
                            Kelola dan pantau arus barang dan keuangan perusahaan dengan lebih efisien.
                        </p>
                        <a href="/pesanan" class="inline-block px-6 py-3 bg-gray-800 text-white font-medium rounded-lg hover:bg-gray-900 transition shadow-md">
                            Lihat Data Pengeluaran
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <section id="penjualan" class="py-16 md:py-24 bg-brand-50">
            <div class="container mx-auto px-6">
                <div class="flex flex-col-reverse md:flex-row items-center gap-12">
                    <div class="w-full md:w-1/2">
                        <span class="text-brand-600 font-semibold tracking-wide uppercase text-sm">Pengadaan Barang</span>
                        <h2 class="text-3xl font-bold text-gray-900 mt-2 mb-4">Produk Interior & Furniture</h2>
                        <p class="text-gray-600 leading-relaxed mb-4">
                            Selain konstruksi, kami menyediakan solusi interior lengkap. Mulai dari Backdrop, Meja kerja, Loker, Kursi, Sofa, hingga Partisi ruangan.
                        </p>
                        <p class="text-gray-600 leading-relaxed mb-8">
                            Kualitas material terbaik untuk kenyamanan kantor dan hunian Anda.
                        </p>
                        <a href="/products" class="inline-block px-6 py-3 bg-brand-600 text-white font-medium rounded-lg hover:bg-brand-700 transition shadow-md">
                            Lihat Katalog Produk
                        </a>
                    </div>
                    <div class="w-full md:w-1/2">
                        <div class="relative rounded-2xl overflow-hidden shadow-2xl transform hover:scale-[1.02] transition duration-500">
                             <img src="/assets/img/sales.jfif" 
                                 onerror="this.src='https://images.unsplash.com/photo-1493663284031-b7e3aefcae8e?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80'"
                                 alt="Produk Furniture" class="w-full h-80 md:h-96 object-cover">
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </x-app-layout>

</body>
</html>