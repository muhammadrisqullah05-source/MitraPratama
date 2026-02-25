<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Proyek CV Mitra Pratama</title>

    <script src="https://cdn.tailwindcss.com"></script>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        .gm-style .gm-style-iw-c {
            padding: 12px !important;
            border-radius: 12px !important;
        }
        .gm-style-iw-d {
            overflow: hidden !important;
        }
        /* Hapus tombol close default yang jelek, ganti styling jika perlu */
        .gm-ui-hover-effect {
            top: 2px !important;
            right: 2px !important;
        }
    </style>
</head>
<body class="font-sans antialiased bg-gray-100">

    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
                <i class="fa fa-map-o mr-2 text-blue-600"></i> {{ __('Peta Project Mitra Pratama') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-2xl border border-gray-200">
                    
                    <div class="px-6 py-4 border-b border-gray-200 bg-gray-50 flex justify-between items-center">
                        <span class="text-sm text-gray-500">Sebaran Lokasi Proyek & Kantor</span>
                        <span class="text-xs font-bold text-blue-600 bg-blue-100 px-2 py-1 rounded-full">Live Map</span>
                    </div>

                    <div class="relative w-full h-[600px] bg-gray-200">
                        <div id="map" class="w-full h-full"></div>
                    </div>

                </div>

            </div>
        </div>
    </x-app-layout>

    <script>
        var map;
        var InforObj = [];

        // Definisi Icon (Pastikan path gambar '../assets/...' benar di server Anda)
        var icons = {
            mark: {
                icon: '../assets/icons/marker.png' // Ganti URL ini jika gambar tidak muncul
            },
            kantor: {
                icon: '../assets/icons/office.png' // Ganti URL ini jika gambar tidak muncul
            },
        };

        // Data Markers
        var markersOnMap = [
            {
                nama: 'Kantor Mitra Pratama',
                Alamat: 'Jl. Korong Gadang No.97, Kota Padang',
                Pekerjaan: 'Kantor Pusat',
                Latlng: [{ lat: -0.9207688422167979, lng: 100.39916888147354 }],
                type: 'kantor'
            },
            {
                nama: 'Bank BRI Solok',
                Alamat: 'Jl. Jend. Sudirman No.1, Kota Solok',
                Pekerjaan: 'Renovasi Kantor',
                Latlng: [{ lat: -0.7893023541211288, lng: 100.65500007962852 }],
                type: 'mark'
            },
            {
                nama: 'Bank BRI UNIT Batang Kapas',
                Alamat: 'Pasar Kuok, Pesisir Selatan',
                Pekerjaan: 'Pembangunan Baru',
                Latlng: [{ lat: -1.4459904647455841, lng: 100.5994134949695 }],
                type: 'mark'
            },
            {
                nama: 'Bank BRI Unit Sumani',
                Alamat: 'Jl. Sumani Sutama Raya, Kab. Solok',
                Pekerjaan: 'Renovasi Kantor',
                Latlng: [{ lat: -0.7155892854500698, lng: 100.59281395185553 }],
                type: 'mark'
            },
            {
                nama: 'Bank BRI Unit Sitiung',
                Alamat: 'Sungai Duo, Dharmasraya',
                Pekerjaan: 'Renovasi Kantor',
                Latlng: [{ lat: -1.033780919628542, lng: 101.68602693066508 }],
                type: 'mark'
            },
            {
                nama: 'Bank BRI Unit Pasar Tempurung',
                Alamat: 'Ampek Koto, Pasaman Barat',
                Pekerjaan: 'Renovasi Kantor',
                Latlng: [{ lat: -0.037806096292576905, lng: 99.87238290846302 }],
                type: 'mark'
            },
            {
                nama: 'Bank BRI Unit Muaro',
                Alamat: 'Muaro, Kab. Sijunjung',
                Pekerjaan: 'Renovasi Kantor',
                Latlng: [{ lat: -0.6653097823408026, lng: 100.93683037088489 }],
                type: 'mark'
            },
            {
                nama: 'Bank BRI KC Simpang Empat',
                Alamat: 'Simpang Empat, Pasaman Barat',
                Pekerjaan: 'Renovasi Kantor',
                Latlng: [{ lat: 0.0942458745690909, lng: 99.82491801849227 }],
                type: 'mark'
            },
            {
                nama: 'Bank BRI UNIT Simpang Empat Pasaman',
                Alamat: 'Simpang IV, Pasaman Barat',
                Pekerjaan: 'Renovasi Kantor',
                Latlng: [{ lat: 0.10381598184206708, lng: 99.82230018275541 }],
                type: 'mark'
            },
            {
                nama: 'Bank BRI Unit Sungai Geringging',
                Alamat: 'Sungai Geringging, Padang Pariaman',
                Pekerjaan: 'Renovasi Kantor',
                Latlng: [{ lat: -0.42280828468671255, lng: 100.08644735185379 }],
                type: 'mark'
            },
            {
                nama: 'Bank BRI Unit Kodya II Padang Panjang',
                Alamat: 'Ps. Baru, Padang Panjang',
                Pekerjaan: 'Renovasi Kantor',
                Latlng: [{ lat: -0.4646987729089196, lng: 100.40899278147313 }],
                type: 'mark'
            },
            {
                nama: 'Bank BRI Unit Koto Baru',
                Alamat: 'Koto Baru, Dharmasraya',
                Pekerjaan: 'Pembangunan Baru',
                Latlng: [{ lat: -1.0933749182689505, lng: 101.71340622777937 }],
                type: 'mark'
            },
            {
                nama: 'Bank BRI Unit Surian',
                Alamat: 'Pantai Cermin, Kab. Solok',
                Pekerjaan: 'Renovasi Kantor',
                Latlng: [{ lat: -1.2510418009376538, lng: 100.88475730875459 }],
                type: 'mark'
            },
            {
                nama: 'Bank BRI Unit Lakitan',
                Alamat: 'Lakitan, Pesisir Selatan',
                Pekerjaan: 'Renovasi Kantor',
                Latlng: [{ lat: -1.7287131389698147, lng: 100.73603326613521 }],
                type: 'mark'
            },
            {
                nama: 'UNP Mart',
                Alamat: 'Jl. Raya Gadut, Lubuk Kilangan',
                Pekerjaan: 'Renovasi Interior / Eksterior',
                Latlng: [{ lat: -0.9447798382050816, lng: 100.44774183517139 }],
                type: 'mark'
            },
        ];

        var centerCords = {
            lat: -0.9207688422167979,
            lng: 100.39916888147354,
        };

        function addMarkerInfo() {
            for (var i = 0; i < markersOnMap.length; i++) {
                // Styling konten InfoWindow dengan Tailwind classes (inline style karena google maps memblokir class luar terkadang)
                var contentString = `
                    <div style="min-width: 200px; padding: 5px;">
                        <h2 style="font-weight: bold; font-size: 16px; margin-bottom: 4px; color: #1e40af;">${markersOnMap[i].nama}</h2>
                        <span style="display:inline-block; background-color: #dbeafe; color: #1e3a8a; padding: 2px 8px; border-radius: 99px; font-size: 10px; font-weight: bold; margin-bottom: 8px;">${markersOnMap[i].Pekerjaan}</span>
                        <p style="font-size: 13px; color: #4b5563; line-height: 1.4;">${markersOnMap[i].Alamat}</p>
                    </div>
                `;

                // Cek icon, jika tidak ada fallback ke null (default google marker)
                var iconUrl = icons[markersOnMap[i].type] ? icons[markersOnMap[i].type].icon : null;

                const marker = new google.maps.Marker({
                    position: markersOnMap[i].Latlng[0],
                    icon: iconUrl,
                    map: map,
                    animation: google.maps.Animation.DROP, // Tambah animasi drop biar keren
                    title: markersOnMap[i].nama
                });

                const infowindow = new google.maps.InfoWindow({
                    content: contentString
                });

                marker.addListener('click', function() {
                    closeotherinfo();
                    infowindow.open(map, marker);
                    InforObj[0] = infowindow;
                });
            }
        }

        function closeotherinfo() {
            if (InforObj.length > 0) {
                InforObj[0].set("marker", null);
                InforObj[0].close();
                InforObj[0].length = 0;
            }
        }

        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                zoom: 11,
                mapId: 'a826b6818c6b696a6f5a50f2', // Cloud styling ID Anda
                center: centerCords,
                disableDefaultUI: false, // Menampilkan kontrol zoom dll
                zoomControl: true,
                mapTypeControl: false,
                scaleControl: true,
                streetViewControl: true,
                rotateControl: true,
                fullscreenControl: true
            });
            addMarkerInfo();
        }

        // Panggil fungsi initMap setelah window load (backup jika callback API gagal)
        window.onload = function() {
            if(typeof google !== 'undefined' && typeof google.maps !== 'undefined'){
               initMap(); 
            }
        };
    </script>

    <script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDasaE7B6aIWahyNYnKLe2ZxdKbFBuLU3A&loading=async&callback=initMap"></script>

</body>
</html>