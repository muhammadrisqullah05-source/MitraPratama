<html>
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
        <title>Proyek CV mitra pratama</title>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="http://maps.google.com/maps/api/js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/gmaps.js/0.4.24/gmaps.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="{{ asset('css/map.css') }}" rel="stylesheet">
        <style>
            .map{
                height:621px;
                width: 1288px;
            }
        </style>

    </head>
    <body>
        <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Peta Project Mitra Pratama') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <section class="gmaps" id="gmaps">
                    <div class="map" id="map"></div>
            </section>
        </div>
        <script>
    var map;
    var InforObj =[];

    var icons = {
        mark: {
            icon:'../assets/icons/marker.png'
        },
        kantor: {
            icon:'../assets/icons/office.png'
        },
    };

    var markersOnMap = [
        {
            nama: 'Kantor Mitra Pratama',
            Alamat:'Jl. Korong Gadang No.97, Korong Gadang, Kec. Kuranji, Kota Padang, Sumatera Barat 25175',
            Pekerjaan:'Kantor',
            Latlng: [{
                lat: -0.9207688422167979,
                lng: 100.39916888147354
            }],
            type: 'kantor'
        },
        {
            nama: 'Bank BRI Solok',
            Alamat:'Jl. Jend. Sudirman No.1, Ps. Pandan Air Mati, Kec. Tj. Harapan, Kota Solok, Sumatera Barat 27317, Indonesia',
            Pekerjaan:'Renovasi Kantor',
            Latlng: [{
                lat: -0.7893023541211288,
                lng: 100.65500007962852
            }],
            type: 'mark'
        },
        {
            nama: 'Bank BRI UNIT Batang Kapas',
            Alamat:'Pasar Kuok, Iv Koto Hilie, Kec. Batang Kapas, Kabupaten Pesisir Selatan, Sumatera Barat 25661, Indonesia',
            Pekerjaan:'Pembangunan Baru',
            Latlng: [{
                lat: -1.4459904647455841,
                lng: 100.5994134949695
            }],
            type: 'mark'
        },
        {
            nama: 'Bank BRI Unit Sumani',
            Alamat:'Jl. Sumani Sutama Raya, Sumani, Kec. X Koto Singkarak, Kabupaten Solok, Sumatera Barat 27777, Indonesia',
            Pekerjaan:'Renovasi Kantor',
            Latlng: [{
                lat: -0.7155892854500698, 
                lng: 100.59281395185553
            }],
            type: 'mark'
        },
        {
            nama: 'Bank BRI Unit Sitiung',
            Alamat:'Jl. simp.3 koto agung jorong, Sungai Duo, Kec. Sitiung, Kabupaten Dharmasraya, Sumatera Barat 27681, Indonesia',
            Pekerjaan:'Renovasi Kantor',
            Latlng: [{
                lat: -1.033780919628542, 
                lng: 101.68602693066508
            }],
            type: 'mark'
        },
        {
            nama: 'Bank BRI Unit Pasar Tempurung',
            Alamat:'Jl. Lintas Kinali, Jorong, Ampek Koto, Kabupaten Pasaman Barat, Sumatera Barat 26316, Indonesia',
            Pekerjaan:'Renovasi Kantor',
            Latlng: [{
                lat: -0.037806096292576905,
                lng: 99.87238290846302
            }],
            type: 'mark'
        },
        {
            nama: 'Bank BRI Unit Muaro',
            Alamat:'Jl. Prof. M. Yamin, Jorong Berambai, Muaro, Kecamaten Sijunjung, Kabupaten Sijunjung, Sumatera Barat 27553, Indonesia',
            Pekerjaan:'Renovasi Kantor',
            Latlng: [{
                lat: -0.6653097823408026, 
                lng: 100.93683037088489
            }],
            type: 'mark'
        },
        {
            nama: 'Bank BRI KC Simpang Empat',
            Alamat:'Jl. Jendral Sudirman Jorong, Jl. Raya SP. Empat, Kabupaten Pasaman Barat, Sumatera Barat 27321, Indonesia',
            Pekerjaan:'Renovasi Kantor',
            Latlng: [{
                lat: 0.0942458745690909, 
                lng: 99.82491801849227
            }],
            type: 'mark'
        },
        {
            nama: 'Bank BRI UNIT Simpang Empat Pasaman',
            Alamat:'Jl. Lintas Manggopoh, Simpang IV, Kec. Pasaman, Kabupaten Pasaman Barat, Sumatera Barat 26368, Indonesia',
            Pekerjaan:'Renovasi Kantor',
            Latlng: [{
                lat: 0.10381598184206708, 
                lng: 99.82230018275541
            }],
            type: 'mark'
        },
        {
            nama: 'Bank BRI Unit Sungai Geringging',
            Alamat:'Pasar di dekat, Malai III Koto, Sungai Geringging, Padang Pariaman Regency, West Sumatra 25562, Indonesia',
            Pekerjaan:'Renovasi Kantor',
            Latlng: [{
                lat: -0.42280828468671255, 
                lng: 100.08644735185379
            }],
            type: 'mark'
        },
        {
            nama: 'Bank BRI Unit Kodya II Padang Panjang ',
            Alamat:'Ps. Baru, Kec. Padang Panjang Bar., Kota Padang Panjang, Sumatera Barat 27111',
            Pekerjaan:'Renovasi Kantor',
            Latlng: [{
                lat: -0.4646987729089196, 
                lng: 100.40899278147313
            }],
            type: 'mark'
        },
        {
            nama: 'Bank BRI Unit Koto Baru',
            Alamat:'Jl. Lintas Sumatera, Koto Baru, Kec. Koto Baru, Kabupaten Dharmasraya, Sumatera Barat 27681',
            Pekerjaan:'Pembangunan Baru',
            Latlng: [{
                lat: -1.0933749182689505,
                lng: 101.71340622777937
            }],
            type: 'mark'
        },
        {
            nama: 'Bank BRI Unit Surian',
            Alamat:'Jl. Raya, Surian, Kec. Pantai Cermin, Kabupaten Solok, Sumatera Barat 27365',
            Pekerjaan:'Renovasi Kantor',
            Latlng: [{
                lat: -1.2510418009376538,
                lng: 100.88475730875459
            }],
            type: 'mark'
        },
        {
            nama: 'Bank BRI Unit Lakitan',
            Alamat:'Jl. Raya Lakitan (Lintas Jl. Padang - Muko-Muko, Lakitan, Kec. Lengayang, Kabupaten Pesisir Selatan, Sumatera Barat 25674',
            Pekerjaan:'Renovasi Kantor',
            Latlng: [{
                lat: -1.7287131389698147, 
                lng: 100.73603326613521
            }],
            type: 'mark'
        },
        {
            nama: 'UNP Mart',
            Alamat:'Jl. Raya Gadut, Padang Besi, Kec. Lubuk Kilangan, Kota Padang, Sumatera Barat 25157',
            Pekerjaan:'Renovasi Interior / Ekseterior',
            Latlng: [{
                lat:-0.9447798382050816,
                lng:  100.44774183517139 
            }],
            type: 'mark'
        },
    ];


    var centerCords ={ 
        lat: -0.9207688422167979,
        lng: 100.39916888147354,
    };
    

    window.onload = function(){
        initMap();
    };


    function addMarkerInfo(){
        for( var i = 0; i < markersOnMap.length; i++){
            var contentString = '<h2>' + markersOnMap[i].nama + '</h2>'+ '<p>' + markersOnMap[i].Alamat + '</p>'+'<h3>' + markersOnMap[i].Pekerjaan + '</h3>';
            const marker = new google.maps.Marker({
                position: markersOnMap[i].Latlng[0],
                icon: icons[markersOnMap[i].type].icon,
                map: map,
                className:'marker',
                label:   {  color: '#000000ff' , fontWeight: '200', fontSize: '20px', text: markersOnMap[i].nama }
            });
            const infowindow = new google.maps.InfoWindow({
                content: contentString
            });
            marker.addListener('click',function(){
                closeotherinfo();
                infowindow.open(marker.get('map'),marker);
                InforObj [0]= infowindow;
                
            });
        }
    }
    function closeotherinfo(){
        if(InforObj.length > 0 ){
            InforObj[0].set("marker",null);
            InforObj[0].close();
            InforObj[0].length=0;
        }
        

    }
    function initMap(){
        map = new google.maps.Map(document.getElementById('map'),{
            zoom: 11,
            mapId: 'a826b6818c6b696a6f5a50f2', 
            center: centerCords,
            
        });
        addMarkerInfo();
    }
</script>
  <script async
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDasaE7B6aIWahyNYnKLe2ZxdKbFBuLU3A&loading=async&callback=initMap">
  </script>
    </div>
</x-app-layout>
        
    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</html>