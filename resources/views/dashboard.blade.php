<html>
    <head>
        <title>CV mitra pratama</title>
         <link href="{{ asset('assets/css/dashboard.css') }}" rel="stylesheet">

        
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    </head>
    <body>
        <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard') }}
            </h2>
        </x-slot>
        <section class="hero" id="home">
            <main class="content">
                <h1>CV Mitra Pratama</h1>
                <p> Merupakan perusahaan yang bergerak di ranah konstruksi proyek dan pengadaan barang </p>
                <p>CV. MITRA PRATAMA  memiliki reputasi baik dalam memberikan layanan berkualitas tinggi di area development</p>
            </main>
        </section>
        <section class="about" id="about">
        
            <h2>Karyawan</h2>
            <div class="row">
                <div class="about-img">
                    <img src="/assets/img/pekerja.jpg" 
                    alt="">
                </div>
                <div class="content">
                    <h3>Karyawan Mitra Pratama</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos voluptate, iusto sit non laborum porro, magni saepe ut a blanditiis unde quod excepturi ab sapiente.</p>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. A, impedit?</p>
                    <a href="/karyawan" class="dk">Lihat Data Karyawan</a>
                </div>
                
            </div>
        </section>

        <section class="proyek" id="proyek">
            <h2>Proyek</h2>
            <div class="row">
                <div class="content">
                    <h3>Proyek Mitra Pratama</h3>
                    <p>CV Mitra Pratama adalah kontraktor yang menyediakan layanan end to end mulai dari desain sampai dengan pembangunan dengan memberikan kualitas dan layanan yang terbaik</p>
                    <p>Khususnya pekerjaan proyek infrastruktur bangunan</p>
                    <a href="/project" class="dk">Lihat Peta Proyek</a>
                </div>
                <div class="about-img">
                    <img src="/assets/img/proyek.jpg" 
                    alt="">
                </div>
            </div>
        </section> 
        <section class="pembelian" id="pembelian">
            <h2>Data Pesanan CV Mitra Pratama</h2>
            <div class="row">
                <div class="about-img">
                    <img src="/assets/img/pembelian.jpg" 
                    alt="">
                </div>
                <div class="content">
                    <h3>Data Pemesanan</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos voluptate, iusto sit non laborum porro, magni saepe ut a blanditiis unde quod excepturi ab sapiente.</p>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. A, impedit?</p>
                    <a href="/pesanan" class="dk">Lihat Data Pengeluaran</a>
                </div>
                
            </div>
        </section>

        <section class="penjualan" id="penjualan">
            <h2>Produk</h2>
            <div class="row">
                <div class="content">
                    <h3>Produk CV Mitra Pratama</h3>
                    <p>Selain menyadiakan layanan konstruksi CV Mitra Pratama juga memiliki pelayanan pengadaan barang.</p>
                    <p>Berupa Beckdrop, Meja, Locker, Kursi, Sofa, Partisi, dan lainnya</p>
                    <a href="/products" class="dk">Lihat Produk</a>
                </div>
                <div class="about-img">
                    <img src="/assets/img/sales.jfif" 
                    alt="">
                </div>
            </div>
        </section>

        
        
    </x-app-layout>

        
    </body>
</html>
