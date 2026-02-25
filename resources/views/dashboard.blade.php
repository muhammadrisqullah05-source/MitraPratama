<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>Dashboard - CV Mitra Pratama</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

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
                            200: '#bae6fd',
                            300: '#7dd3fc',
                            400: '#38bdf8',
                            500: '#0ea5e9',
                            600: '#0284c7', // Warna Biru Utama
                            700: '#0369a1',
                            800: '#075985', 
                            900: '#0c4a6e',
                        }
                    },
                    animation: {
                        'fade-in-up': 'fadeInUp 0.8s ease-out forwards',
                        'bounce-slow': 'bounce 3s infinite',
                    },
                    keyframes: {
                        fadeInUp: {
                            '0%': { opacity: '0', transform: 'translateY(20px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' },
                        }
                    }
                }
            }
        }
    </script>

    <style>
        html { scroll-behavior: smooth; }
        .hero-gradient {
            background: linear-gradient(135deg, #0c4a6e 0%, #075985 100%);
        }
    </style>
</head>
<body class="font-sans antialiased bg-slate-50 text-slate-900">

    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-bold text-2xl text-slate-800 leading-tight">
                {{ __('Dashboard Overview') }}
            </h2>
        </x-slot>

        <section class="relative hero-gradient py-24 lg:py-36 overflow-hidden">
            <div class="absolute inset-0 opacity-30">
                <img src="https://images.unsplash.com/photo-1541888946425-d81bb19240f5?q=80&w=2070&auto=format&fit=crop" class="w-full h-full object-cover" alt="Background Konstruksi">
                <div class="absolute inset-0 bg-brand-900 mix-blend-multiply"></div>
            </div>
            
            <div class="relative container mx-auto px-6 text-center z-10 animate-fade-in-up">
                <span class="inline-block px-4 py-1.5 mb-6 text-xs font-semibold tracking-widest text-brand-100 uppercase bg-white/10 rounded-full border border-white/20 backdrop-blur-sm shadow-lg">
                    Infrastruktur & Pengadaan
                </span>
                <h1 class="text-5xl md:text-6xl lg:text-7xl font-extrabold text-white mb-8 leading-[1.1]">
                    CV Mitra Pratama
                </h1>
                <p class="text-xl md:text-2xl text-slate-200 max-w-3xl mx-auto mb-10 font-light leading-relaxed">
                    Membangun masa depan dengan presisi. Mitra terpercaya dalam <span class="text-white font-semibold">konstruksi proyek</span> dan pengadaan barang interior berkualitas tinggi.
                </p>
                
                <div class="flex flex-col sm:flex-row justify-center gap-4">
                    <a href="#about" class="px-10 py-4 bg-white text-brand-900 font-bold rounded-2xl hover:bg-brand-50 transform hover:-translate-y-1 transition-all duration-300 shadow-xl">
                        Mulai Jelajahi
                    </a>
                    
                </div>
            </div>

            <div class="absolute bottom-0 left-0 w-full overflow-hidden leading-[0]">
                <svg class="relative block w-full h-[60px]" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                    <path d="M1200 120L0 120 309.19 8.18 1200 120z" fill="#f8fafc"></path>
                </svg>
            </div>
        </section>

        <section class="py-12 -mt-16 relative z-20">
            <div class="container mx-auto px-6">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="bg-white p-8 rounded-3xl shadow-xl shadow-slate-200/50 border border-slate-100 flex items-center gap-6 group hover:border-brand-600 transition-colors">
                        <div class="w-14 h-14 bg-brand-50 rounded-2xl flex items-center justify-center text-brand-600 group-hover:bg-brand-600 group-hover:text-white transition-all duration-300">
                            <i class="fa-solid fa-building-shield text-2xl"></i>
                        </div>
                        <div>
                            <p class="text-slate-500 text-sm font-medium">Pengalaman</p>
                            <h4 class="text-2xl font-bold text-slate-900 italic">Teruji & Profesional</h4>
                        </div>
                    </div>
                    <div class="bg-white p-8 rounded-3xl shadow-xl shadow-slate-200/50 border border-slate-100 flex items-center gap-6 group hover:border-brand-600 transition-colors">
                        <div class="w-14 h-14 bg-emerald-50 rounded-2xl flex items-center justify-center text-emerald-600 group-hover:bg-emerald-600 group-hover:text-white transition-all duration-300">
                            <i class="fa-solid fa-award text-2xl"></i>
                        </div>
                        <div>
                            <p class="text-slate-500 text-sm font-medium">Kualitas</p>
                            <h4 class="text-2xl font-bold text-slate-900 italic">Standar Tertinggi</h4>
                        </div>
                    </div>
                    <div class="bg-white p-8 rounded-3xl shadow-xl shadow-slate-200/50 border border-slate-100 flex items-center gap-6 group hover:border-brand-600 transition-colors">
                        <div class="w-14 h-14 bg-amber-50 rounded-2xl flex items-center justify-center text-amber-600 group-hover:bg-amber-600 group-hover:text-white transition-all duration-300">
                            <i class="fa-solid fa-clock-rotate-left text-2xl"></i>
                        </div>
                        <div>
                            <p class="text-slate-500 text-sm font-medium">Layanan</p>
                            <h4 class="text-2xl font-bold text-slate-900 italic">Tepat Waktu</h4>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @if ( auth()->user()->role == 'admin')
        <section id="about" class="py-20 bg-white border-t border-slate-100">
            <div class="container mx-auto px-6">
                <div class="flex flex-col md:flex-row items-center gap-16">
                    <div class="w-full md:w-1/2 relative">
                        <div class="absolute -top-4 -left-4 w-32 h-32 bg-brand-100 rounded-full z-0 opacity-50 blur-xl"></div>
                        <div class="relative rounded-[2rem] overflow-hidden shadow-2xl z-10 border-8 border-slate-50">
                            <img src="https://images.unsplash.com/photo-1504307651254-35680f356dfd?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" 
                                 alt="Karyawan" class="w-full h-[450px] object-cover hover:scale-105 transition duration-700">
                        </div>
                    </div>
                    <div class="w-full md:w-1/2">
                        <div class="inline-block px-4 py-1 bg-brand-50 text-brand-600 rounded-lg text-xs font-bold uppercase tracking-wider mb-6">
                            Expert Team
                        </div>
                        <h2 class="text-4xl font-extrabold text-slate-900 mb-6 leading-tight">
                            SDM Sebagai Pilar <br><span class="text-brand-600">Keunggulan Layanan</span>
                        </h2>
                        <p class="text-slate-600 leading-relaxed mb-6 text-lg font-light">
                            Didukung oleh tenaga ahli yang profesional dan berpengalaman, kami memastikan setiap proyek dikerjakan dengan standar ketelitian yang tinggi.
                        </p>
                        <ul class="space-y-4 mb-10">
                            <li class="flex items-center gap-3 text-slate-700 font-medium italic">
                                <i class="fa-solid fa-circle-check text-emerald-500 text-xl"></i>
                                Tenaga Ahli Bersertifikat & Berpengalaman
                            </li>
                            <li class="flex items-center gap-3 text-slate-700 font-medium italic">
                                <i class="fa-solid fa-circle-check text-emerald-500 text-xl"></i>
                                Manajemen Proyek yang Transparan & Efisien
                            </li>
                        </ul>
                        <a href="/karyawan" class="group inline-flex items-center justify-center px-8 py-4 bg-slate-900 text-white font-bold rounded-2xl hover:bg-brand-700 transition-all duration-300 shadow-xl hover:shadow-brand-600/30">
                            Kelola Data Karyawan
                            <i class="fa-solid fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform"></i>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <section id="proyek" class="py-20 bg-slate-50">
            <div class="container mx-auto px-6">
                <div class="bg-brand-900 rounded-[3rem] p-8 md:p-16 flex flex-col md:flex-row items-center gap-12 shadow-2xl relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-64 h-64 bg-white/5 rounded-full -translate-y-1/2 translate-x-1/2"></div>
                    
                    <div class="w-full md:w-1/2 z-10">
                        <span class="text-brand-300 font-bold uppercase text-xs tracking-widest mb-4 block flex items-center gap-2">
                            <span class="w-8 h-[2px] bg-brand-400 inline-block"></span> Portfolio
                        </span>
                        <h2 class="text-4xl font-bold text-white mb-6 italic leading-snug">
                            Wujudkan Infrastruktur <br>Berkualitas Global
                        </h2>
                        <p class="text-brand-100/80 leading-relaxed mb-10 text-lg font-light">
                            CV Mitra Pratama menyediakan layanan kontraktor <em>end-to-end</em>. Kami membangun bukan sekadar struktur, tapi masa depan yang kokoh dan presisi.
                        </p>
                        <a href="/project" class="inline-block px-10 py-4 bg-emerald-500 text-white font-bold rounded-2xl hover:bg-emerald-600 transform hover:scale-105 transition-all shadow-lg shadow-emerald-900/40">
                            Eksplorasi Proyek
                        </a>
                    </div>
                    
                    <div class="w-full md:w-1/2 z-10">
                        <div class="grid grid-cols-2 gap-4">
                            <div class="rounded-3xl overflow-hidden h-48 md:h-64 shadow-xl border-4 border-white/10 group">
                                <img src="https://images.unsplash.com/photo-1503387762-592deb58ef4e?q=80&w=800" alt="Proyek 1" class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                            </div>
                            <div class="rounded-3xl overflow-hidden h-48 md:h-64 mt-8 shadow-xl border-4 border-white/10 group">
                                <img src="/assets/img/proyek.jpg" alt="Proyek 2" class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="pembelian" class="pb-20 bg-slate-50">
            <div class="container mx-auto px-6">
                <div class="group bg-white rounded-[3rem] p-8 md:p-16 flex flex-col md:flex-row items-center gap-12 shadow-2xl shadow-slate-200/50 border border-slate-100 relative overflow-hidden">
                    
                    <div class="absolute top-0 right-0 w-96 h-96 bg-brand-50 rounded-full blur-3xl -translate-y-1/2 translate-x-1/3 z-0"></div>

                    <div class="w-full md:w-1/2 relative z-10">
                        <div class="relative">
                            <div class="rounded-[2rem] overflow-hidden shadow-2xl border-4 border-white transform group-hover:rotate-1 transition-transform duration-500">
                                <img src="https://images.unsplash.com/photo-1554224155-8d04cb21cd6c?q=80&w=800" alt="Data Administrasi" class="w-full h-auto object-cover">
                            </div>
                            
                        </div>
                    </div>

                    <div class="w-full md:w-1/2 relative z-10">
                        <span class="text-brand-600 font-bold uppercase text-xs tracking-widest mb-4 block flex items-center gap-2">
                            <span class="w-8 h-[2px] bg-brand-600 inline-block"></span> Administrasi
                        </span>
                        <h2 class="text-4xl font-extrabold text-slate-900 mb-6 leading-tight">
                            Data Pesanan <br> <span class="text-brand-600 italic"></span>
                        </h2>
                        <p class="text-slate-500 text-lg leading-relaxed mb-8 font-light">
                            Sistem pencatatan kami memastikan setiap pesanan dan log logistik terlacak dengan akurat. Kelola arus barang dan keuangan perusahaan Anda dengan efisiensi tingkat tinggi.
                        </p>
                        
                        <div class="flex flex-wrap gap-4">
                            <a href="/data-pesanan" class="inline-flex items-center px-8 py-4 bg-slate-900 text-white font-bold rounded-2xl hover:bg-brand-600 transition-all duration-300 shadow-xl hover:shadow-brand-600/30">
                                <i class="fa-solid fa-chart-line mr-2"></i> Kelola Transaksi
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="katalog" class="pb-20 bg-slate-50">
            <div class="container mx-auto px-6">
                <div class="group bg-brand-900 rounded-[3rem] p-8 md:p-16 flex flex-col-reverse md:flex-row items-center gap-12 shadow-2xl relative overflow-hidden">
                    
                    <div class="absolute bottom-0 left-0 w-80 h-80 bg-brand-600 rounded-full blur-[100px] opacity-20 z-0"></div>
                    
                    <div class="w-full md:w-1/2 relative z-10">
                        <span class="text-brand-300 font-bold uppercase text-xs tracking-widest mb-4 block flex items-center gap-2">
                            <span class="w-8 h-[2px] bg-brand-400 inline-block"></span> Interior Supply
                        </span>
                        <h2 class="text-4xl font-extrabold text-white mb-6 leading-tight italic">
                            Koleksi Furniture <br> <span class="text-transparent bg-clip-text bg-gradient-to-r from-brand-200 to-white not-italic">Premium & Modern</span>
                        </h2>
                        <p class="text-brand-100/80 text-lg leading-relaxed mb-8 font-light">
                            Tingkatkan estetika ruang kerja dan hunian Anda. Kami menyediakan Custom Backdrop, Meja Executive, Kursi Ergonomis, hingga Partisi Ruangan berkualitas terbaik.
                        </p>
                        
                        <ul class="space-y-3 mb-10 text-brand-100">
                            <li class="flex items-center gap-3">
                                <i class="fa-solid fa-circle-check text-emerald-400"></i> Material Kuat (HPL & Solid Wood)
                            </li>
                            <li class="flex items-center gap-3">
                                <i class="fa-solid fa-circle-check text-emerald-400"></i> Desain Custom Sesuai Ukuran Ruangan
                            </li>
                        </ul>

                        <a href="/products" class="inline-flex items-center px-8 py-4 bg-white text-brand-900 font-bold rounded-2xl hover:bg-brand-50 hover:scale-105 transition-all duration-300 shadow-xl">
                            <i class="fa-solid fa-couch mr-2"></i> Buka Katalog Produk
                        </a>
                    </div>

                    <div class="w-full md:w-1/2 relative z-10">
                        <div class="grid grid-cols-2 gap-4">
                            <div class="space-y-4 mt-8">
                                <div class="rounded-3xl shadow-xl overflow-hidden border-4 border-white/10 group-hover:border-white/20 transition duration-500">
                                    <img src="/assets/img/Produk/locker.jfif" class="w-full h-40 object-cover opacity-80 hover:opacity-100 hover:scale-110 transition duration-500" alt="Backdrop">
                                </div>
                                <div class="rounded-3xl shadow-xl overflow-hidden border-4 border-white/10 group-hover:border-white/20 transition duration-500">
                                    <img src="/assets/img/Produk/meja.jfif" class="w-full h-56 object-cover hover:scale-110 transition duration-500" alt="Meja">
                                </div>
                            </div>
                            <div class="space-y-4">
                                <div class="rounded-3xl shadow-xl overflow-hidden border-4 border-white/10 group-hover:border-white/20 transition duration-500">
                                    <img src="/assets/img/Produk/partisi.jfif" class="w-full h-56 object-cover hover:scale-110 transition duration-500" alt="Sofa">
                                </div>
                                <div class="rounded-3xl shadow-xl overflow-hidden border-4 border-white/10 group-hover:border-white/20 transition duration-500">
                                    <img src="/assets/img/Produk/sofa.jfif" class="w-full h-40 object-cover opacity-80 hover:opacity-100 hover:scale-110 transition duration-500" alt="Partisi">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        @elseif ( auth()->user()->role == 'kasir')
        

        <section id="proyek" class="py-20 bg-slate-50">
            <div class="container mx-auto px-6">
                <div class="bg-brand-900 rounded-[3rem] p-8 md:p-16 flex flex-col md:flex-row items-center gap-12 shadow-2xl relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-64 h-64 bg-white/5 rounded-full -translate-y-1/2 translate-x-1/2"></div>
                    
                    <div class="w-full md:w-1/2 z-10">
                        <span class="text-brand-300 font-bold uppercase text-xs tracking-widest mb-4 block flex items-center gap-2">
                            <span class="w-8 h-[2px] bg-brand-400 inline-block"></span> Portfolio
                        </span>
                        <h2 class="text-4xl font-bold text-white mb-6 italic leading-snug">
                            Wujudkan Infrastruktur <br>Berkualitas Global
                        </h2>
                        <p class="text-brand-100/80 leading-relaxed mb-10 text-lg font-light">
                            CV Mitra Pratama menyediakan layanan kontraktor <em>end-to-end</em>. Kami membangun bukan sekadar struktur, tapi masa depan yang kokoh dan presisi.
                        </p>
                        <a href="/project" class="inline-block px-10 py-4 bg-emerald-500 text-white font-bold rounded-2xl hover:bg-emerald-600 transform hover:scale-105 transition-all shadow-lg shadow-emerald-900/40">
                            Eksplorasi Proyek
                        </a>
                    </div>
                    
                    <div class="w-full md:w-1/2 z-10">
                        <div class="grid grid-cols-2 gap-4">
                            <div class="rounded-3xl overflow-hidden h-48 md:h-64 shadow-xl border-4 border-white/10 group">
                                <img src="https://images.unsplash.com/photo-1503387762-592deb58ef4e?q=80&w=800" alt="Proyek 1" class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                            </div>
                            <div class="rounded-3xl overflow-hidden h-48 md:h-64 mt-8 shadow-xl border-4 border-white/10 group">
                                <img src="/assets/img/proyek.jpg" alt="Proyek 2" class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="pembelian" class="pb-20 bg-slate-50">
            <div class="container mx-auto px-6">
                <div class="group bg-white rounded-[3rem] p-8 md:p-16 flex flex-col md:flex-row items-center gap-12 shadow-2xl shadow-slate-200/50 border border-slate-100 relative overflow-hidden">
                    
                    <div class="absolute top-0 right-0 w-96 h-96 bg-brand-50 rounded-full blur-3xl -translate-y-1/2 translate-x-1/3 z-0"></div>

                    <div class="w-full md:w-1/2 relative z-10">
                        <div class="relative">
                            <div class="rounded-[2rem] overflow-hidden shadow-2xl border-4 border-white transform group-hover:rotate-1 transition-transform duration-500">
                                <img src="https://images.unsplash.com/photo-1554224155-8d04cb21cd6c?q=80&w=800" alt="Data Administrasi" class="w-full h-auto object-cover">
                            </div>
                            
                        </div>
                    </div>

                    <div class="w-full md:w-1/2 relative z-10">
                        <span class="text-brand-600 font-bold uppercase text-xs tracking-widest mb-4 block flex items-center gap-2">
                            <span class="w-8 h-[2px] bg-brand-600 inline-block"></span> Administrasi
                        </span>
                        <h2 class="text-4xl font-extrabold text-slate-900 mb-6 leading-tight">
                            Data Pesanan <br> <span class="text-brand-600 italic"></span>
                        </h2>
                        <p class="text-slate-500 text-lg leading-relaxed mb-8 font-light">
                            Sistem pencatatan kami memastikan setiap pesanan dan log logistik terlacak dengan akurat. Kelola arus barang dan keuangan perusahaan Anda dengan efisiensi tingkat tinggi.
                        </p>
                        
                        <div class="flex flex-wrap gap-4">
                            <a href="/data-pesanan" class="inline-flex items-center px-8 py-4 bg-slate-900 text-white font-bold rounded-2xl hover:bg-brand-600 transition-all duration-300 shadow-xl hover:shadow-brand-600/30">
                                <i class="fa-solid fa-chart-line mr-2"></i> Kelola Transaksi
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="katalog" class="pb-20 bg-slate-50">
            <div class="container mx-auto px-6">
                <div class="group bg-brand-900 rounded-[3rem] p-8 md:p-16 flex flex-col-reverse md:flex-row items-center gap-12 shadow-2xl relative overflow-hidden">
                    
                    <div class="absolute bottom-0 left-0 w-80 h-80 bg-brand-600 rounded-full blur-[100px] opacity-20 z-0"></div>
                    
                    <div class="w-full md:w-1/2 relative z-10">
                        <span class="text-brand-300 font-bold uppercase text-xs tracking-widest mb-4 block flex items-center gap-2">
                            <span class="w-8 h-[2px] bg-brand-400 inline-block"></span> Interior Supply
                        </span>
                        <h2 class="text-4xl font-extrabold text-white mb-6 leading-tight italic">
                            Koleksi Furniture <br> <span class="text-transparent bg-clip-text bg-gradient-to-r from-brand-200 to-white not-italic">Premium & Modern</span>
                        </h2>
                        <p class="text-brand-100/80 text-lg leading-relaxed mb-8 font-light">
                            Tingkatkan estetika ruang kerja dan hunian Anda. Kami menyediakan Custom Backdrop, Meja Executive, Kursi Ergonomis, hingga Partisi Ruangan berkualitas terbaik.
                        </p>
                        
                        <ul class="space-y-3 mb-10 text-brand-100">
                            <li class="flex items-center gap-3">
                                <i class="fa-solid fa-circle-check text-emerald-400"></i> Material Kuat (HPL & Solid Wood)
                            </li>
                            <li class="flex items-center gap-3">
                                <i class="fa-solid fa-circle-check text-emerald-400"></i> Desain Custom Sesuai Ukuran Ruangan
                            </li>
                        </ul>

                        <a href="/products" class="inline-flex items-center px-8 py-4 bg-white text-brand-900 font-bold rounded-2xl hover:bg-brand-50 hover:scale-105 transition-all duration-300 shadow-xl">
                            <i class="fa-solid fa-couch mr-2"></i> Buka Katalog Produk
                        </a>
                    </div>

                    <div class="w-full md:w-1/2 relative z-10">
                        <div class="grid grid-cols-2 gap-4">
                            <div class="space-y-4 mt-8">
                                <div class="rounded-3xl shadow-xl overflow-hidden border-4 border-white/10 group-hover:border-white/20 transition duration-500">
                                    <img src="/assets/img/Produk/locker.jfif" class="w-full h-40 object-cover opacity-80 hover:opacity-100 hover:scale-110 transition duration-500" alt="Backdrop">
                                </div>
                                <div class="rounded-3xl shadow-xl overflow-hidden border-4 border-white/10 group-hover:border-white/20 transition duration-500">
                                    <img src="/assets/img/Produk/meja.jfif" class="w-full h-56 object-cover hover:scale-110 transition duration-500" alt="Meja">
                                </div>
                            </div>
                            <div class="space-y-4">
                                <div class="rounded-3xl shadow-xl overflow-hidden border-4 border-white/10 group-hover:border-white/20 transition duration-500">
                                    <img src="/assets/img/Produk/partisi.jfif" class="w-full h-56 object-cover hover:scale-110 transition duration-500" alt="Sofa">
                                </div>
                                <div class="rounded-3xl shadow-xl overflow-hidden border-4 border-white/10 group-hover:border-white/20 transition duration-500">
                                    <img src="/assets/img/Produk/sofa.jfif" class="w-full h-40 object-cover opacity-80 hover:opacity-100 hover:scale-110 transition duration-500" alt="Partisi">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        @else
        <section id="katalog" class="pb-20 bg-slate-50">
            <div class="container mx-auto px-6">
                <div class="group bg-brand-900 rounded-[3rem] p-8 md:p-16 flex flex-col-reverse md:flex-row items-center gap-12 shadow-2xl relative overflow-hidden">
                    
                    <div class="absolute bottom-0 left-0 w-80 h-80 bg-brand-600 rounded-full blur-[100px] opacity-20 z-0"></div>
                    
                    <div class="w-full md:w-1/2 relative z-10">
                        <span class="text-brand-300 font-bold uppercase text-xs tracking-widest mb-4 block flex items-center gap-2">
                            <span class="w-8 h-[2px] bg-brand-400 inline-block"></span> Interior Supply
                        </span>
                        <h2 class="text-4xl font-extrabold text-white mb-6 leading-tight italic">
                            Koleksi Furniture <br> <span class="text-transparent bg-clip-text bg-gradient-to-r from-brand-200 to-white not-italic">Premium & Modern</span>
                        </h2>
                        <p class="text-brand-100/80 text-lg leading-relaxed mb-8 font-light">
                            Tingkatkan estetika ruang kerja dan hunian Anda. Kami menyediakan Custom Backdrop, Meja Executive, Kursi Ergonomis, hingga Partisi Ruangan berkualitas terbaik.
                        </p>
                        
                        <ul class="space-y-3 mb-10 text-brand-100">
                            <li class="flex items-center gap-3">
                                <i class="fa-solid fa-circle-check text-emerald-400"></i> Material Kuat (HPL & Solid Wood)
                            </li>
                            <li class="flex items-center gap-3">
                                <i class="fa-solid fa-circle-check text-emerald-400"></i> Desain Custom Sesuai Ukuran Ruangan
                            </li>
                        </ul>

                        <a href="/produk" class="inline-flex items-center px-8 py-4 bg-white text-brand-900 font-bold rounded-2xl hover:bg-brand-50 hover:scale-105 transition-all duration-300 shadow-xl">
                            <i class="fa-solid fa-couch mr-2"></i> Buka Katalog Produk
                        </a>
                    </div>

                    <div class="w-full md:w-1/2 relative z-10">
                        <div class="grid grid-cols-2 gap-4">
                            <div class="space-y-4 mt-8">
                                <div class="rounded-3xl shadow-xl overflow-hidden border-4 border-white/10 group-hover:border-white/20 transition duration-500">
                                    <img src="/assets/img/Produk/locker.jfif" class="w-full h-40 object-cover opacity-80 hover:opacity-100 hover:scale-110 transition duration-500" alt="Backdrop">
                                </div>
                                <div class="rounded-3xl shadow-xl overflow-hidden border-4 border-white/10 group-hover:border-white/20 transition duration-500">
                                    <img src="/assets/img/Produk/meja.jfif" class="w-full h-56 object-cover hover:scale-110 transition duration-500" alt="Meja">
                                </div>
                            </div>
                            <div class="space-y-4">
                                <div class="rounded-3xl shadow-xl overflow-hidden border-4 border-white/10 group-hover:border-white/20 transition duration-500">
                                    <img src="/assets/img/Produk/partisi.jfif" class="w-full h-56 object-cover hover:scale-110 transition duration-500" alt="Sofa">
                                </div>
                                <div class="rounded-3xl shadow-xl overflow-hidden border-4 border-white/10 group-hover:border-white/20 transition duration-500">
                                    <img src="/assets/img/Produk/sofa.jfif" class="w-full h-40 object-cover opacity-80 hover:opacity-100 hover:scale-110 transition duration-500" alt="Partisi">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <section id="pembelian" class="pb-20 bg-slate-50">
            <div class="container mx-auto px-6">
                <div class="group bg-white rounded-[3rem] p-8 md:p-16 flex flex-col md:flex-row items-center gap-12 shadow-2xl shadow-slate-200/50 border border-slate-100 relative overflow-hidden">
                    
                    <div class="absolute top-0 right-0 w-96 h-96 bg-brand-50 rounded-full blur-3xl -translate-y-1/2 translate-x-1/3 z-0"></div>

                    <div class="w-full md:w-1/2 relative z-10">
                        <div class="relative">
                            <div class="rounded-[2rem] overflow-hidden shadow-2xl border-4 border-white transform group-hover:rotate-1 transition-transform duration-500">
                                <img src="https://images.unsplash.com/photo-1554224155-8d04cb21cd6c?q=80&w=800" alt="Data Administrasi" class="w-full h-auto object-cover">
                            </div>
                            
                        </div>
                    </div>

                    <div class="w-full md:w-1/2 relative z-10">
                        <span class="text-brand-600 font-bold uppercase text-xs tracking-widest mb-4 block flex items-center gap-2">
                            <span class="w-8 h-[2px] bg-brand-600 inline-block"></span> Administrasi
                        </span>
                        <h2 class="text-4xl font-extrabold text-slate-900 mb-6 leading-tight">
                            Data Pesanan <br> <span class="text-brand-600 italic"></span>
                        </h2>
                        <p class="text-slate-500 text-lg leading-relaxed mb-8 font-light">
                            Sistem pencatatan kami memastikan setiap pesanan dan log logistik terlacak dengan akurat. Kelola arus barang dan keuangan perusahaan Anda dengan efisiensi tingkat tinggi.
                        </p>
                        
                        <div class="flex flex-wrap gap-4">
                            <a href="/pesanan" class="inline-flex items-center px-8 py-4 bg-slate-900 text-white font-bold rounded-2xl hover:bg-brand-600 transition-all duration-300 shadow-xl hover:shadow-brand-600/30">
                                <i class="fa-solid fa-chart-line mr-2"></i> Kelola Transaksi
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        @endif

        <footer class="bg-slate-950 text-white pt-20 pb-10">
            <div class="container mx-auto px-6">
                <div class="grid grid-cols-1 lg:grid-cols-4 gap-12 mb-16">
                    <div class="col-span-1 lg:col-span-2">
                        <h3 class="text-3xl font-extrabold mb-8 italic">CV Mitra <span class="text-brand-500">Pratama</span></h3>
                        <p class="text-slate-400 max-w-md leading-relaxed mb-8">
                            Melayani dengan integritas sejak awal berdiri. Kami berkomitmen menyediakan solusi terbaik bagi industri konstruksi dan interior di Indonesia, dari proses perencanaan hingga pengadaan barang.
                        </p>
                    </div>

                    <div>
                        <h4 class="text-lg font-bold mb-8 text-brand-500 italic uppercase tracking-widest">Hubungi Kami</h4>
                        <ul class="space-y-6">
                            <li class="flex items-start gap-4 group">
                                <div class="w-10 h-10 bg-brand-900/50 rounded-xl flex items-center justify-center text-brand-400 group-hover:bg-brand-600 group-hover:text-white transition-all">
                                    <i class="fa-solid fa-phone"></i>
                                </div>
                                <div>
                                    <p class="text-xs text-slate-500 font-bold uppercase mb-1">Telepon</p>
                                    <p class="text-slate-200">0812-6858-4910</p>
                                </div>
                            </li>
                            <li class="flex items-start gap-4 group">
                                <div class="w-10 h-10 bg-brand-900/50 rounded-xl flex items-center justify-center text-brand-400 group-hover:bg-brand-600 group-hover:text-white transition-all">
                                    <i class="fa-solid fa-location-dot"></i>
                                </div>
                                <div>
                                    <p class="text-xs text-slate-500 font-bold uppercase mb-1">Alamat</p>
                                    <p class="text-slate-200 text-sm leading-relaxed">
                                        Jl. Korong Gadang No.97,<br>Kec. Kuranji, Kota Padang,<br>Sumatera Barat 25175
                                    </p>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <div>
                        <h4 class="text-lg font-bold mb-8 text-brand-500 italic uppercase tracking-widest">Kantor Pusat</h4>
                        <div class="rounded-2xl overflow-hidden border border-white/10 shadow-2xl relative group">
                            <iframe width="100%" height="180" frameborder="0" style="border:0; filter: grayscale(0.8) invert(0.9);" src="https://maps.google.com/maps?q=Jl.+Korong+Gadang+No.97,+Padang&t=&z=13&ie=UTF8&iwloc=&output=embed" allowfullscreen></iframe>
                             <div class="absolute inset-0 bg-brand-600/10 group-hover:bg-transparent transition duration-300 pointer-events-none"></div>
                        </div>
                    </div>
                </div>

                
        </footer>
    </x-app-layout>

</body>
</html>