<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Antrian Pasien</title>

    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <style>
        @media print
        {    
            .no-print, .no-print *
            {
                display: none !important;
            }
        }
        p{
            font-size: 21px;
        }
    </style>
</head>
<body>

    <br><br><br><br><br>
    <div class="content">
        <div class="container">
            <div class="row text-center">

                <div class="col-md-12 col-lg-12">

                    <!-- Simple card -->
                    <div class="card m-b-20">
                        <div class="card-body">
                            <p class="card-text">Nomor Antrian Anda</p>
                            <h1 class="card-title">{{$data->id_loket}}{{$data->no_urut}}</h4>
                            <a href="javascript:void(0)" onclick="window.print()" class="btn btn-primary pull-right no-print">Print</a>
                            <a href="javascript:void(0)" onclick="kembali()" class="btn btn-danger pull-right no-print">Kembali</a>
                        </div>
                    </div>

                </div><!-- end col -->

            </div>
            <!-- end row -->

        </div> <!-- container -->

    </div>
    <script type="text/javascript">
        window.print();
    </script>
    <script>
        function kembali(){
            location.href = "/antrian_loket";
        }
    </script>
</body>
</html>