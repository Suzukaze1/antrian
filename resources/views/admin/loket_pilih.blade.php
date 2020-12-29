<!-- menghubungkan dengan view template -->
@extends('admin.template')

<!-- isi bagian judul halaman -->
<!-- cara penulisan isi section yang pendek -->
@section('judul_halaman', 'Antrian Admin')
<!-- isi bagian konten -->
<!-- cara penulisan isi section yang panjang -->
@section('konten')

<div class="container">
    <br><br><br><br>
    <a type="button" class="btn btn-info btn-lg" href="/admin/loket">< Kembali</a>
    <h1>Loket : {{$loket}} </h1>

    <h2>Antrian Yang sudah dipanggil : <a id="sudah"></a></h2>
    <h2>Antrian yang belum dipanggil : <a id="belum"></a></h2>
    <h2>Total Antrian : <a id="semua"></a></h2>

    <h2>No urut sekarang : <a id="sekarang">{{$no_urut}}</a></h2>

    
    <button type="button" onclick="panggil()"> Panggil</button>

</div>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        setInterval(getAntrian,2000)
        const axios = require('axios');
        function getAntrian(id){
            this.axios.get('/api/getAntrian/{{$loket}}')
                .then(function (response) {
                    console.log(response)
                    $('#sudah').html(response.data[0])
                    $('#belum').html(response.data[1])
                    $('#semua').html(response.data[2])
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                })
                .then(function () {
                    // always executed
                });
        }
        function panggil(id){
            this.axios.get('/api/panggil/{{$loket}}')
                .then(function (response) {
                    if(response.data === "habis"){
                        return alert('habis');
                    }
                    var satu = "Nomor Antrian A001";
                    $('#sekarang').html(response.data),
                    responsiveVoice.speak($('#sekarang'), "UK English Male")
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                })
                .then(function () {
                    // always executed
                });
        }
        </script>

@endsection