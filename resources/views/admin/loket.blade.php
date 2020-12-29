<!-- menghubungkan dengan view template -->
@extends('admin.template')

<!-- isi bagian judul halaman -->
<!-- cara penulisan isi section yang pendek -->
@section('judul_halaman', 'Antrian Admin')
<!-- isi bagian konten -->
<!-- cara penulisan isi section yang panjang -->
@section('konten')
    <div class="content">
        <div class="container-fluid">
            <div class="row">

            @foreach($kelompok_umum as $umum)
            <div class="col-md-6 col-lg-3">
                <!-- Simple card -->
                <div class="card m-b-20">
                    <img class="card-img-top img-fluid" src="../assets/images/gallery/1.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h4 class="card-title">Loket {{$umum->kelompok_loket}}</h4>
                        <p class="card-text">Antrian Untuk Pasien Umum.</p>
                        <a href="/admin/loket/A" class="btn btn-primary pull-right">Cek</a>
                    </div>
                </div>
            </div><!-- end col -->
            @endforeach

            @foreach($kelompok_bpjs as $bpjs)
            <div class="col-md-6 col-lg-3">
                <!-- Simple card -->
                <div class="card m-b-20">
                    <img class="card-img-top img-fluid" src="../assets/images/gallery/1.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h4 class="card-title">Loket {{$bpjs->kelompok_loket}}</h4>
                        <p class="card-text">Antrian Untuk Pasien BPJS.</p>
                        <a href="/admin/loket/{{$bpjs->kelompok_loket}}" class="btn btn-primary pull-right">Cek</a>
                    </div>
                </div>
            </div><!-- end col -->
            @endforeach

            </div>
            <!-- end row -->

        </div> <!-- container -->

    </div>


@endsection    