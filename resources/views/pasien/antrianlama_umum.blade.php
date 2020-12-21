<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Antrian Umum</title>
    <meta name="author" content="Coderthemes">

    <!-- Custom box css -->
    
    <!-- <link href="../../assets/plugins/custombox/dist/custombox.min.css" rel="stylesheet"> -->
    <link href="{{url('/assets/plugins/custombox/dist/custombox.min.css')}}" rel="stylesheet">

    <!-- App css -->
    <link href="{{url('/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{url('/assets/css/icons.css')}}" rel="stylesheet" type="text/css" /> 
    <link href="{{url('/assets/css/style.css')}}" rel="stylesheet" type="text/css" /> 

    <script src="{{url('/assets/js/modernizr.min.js')}}"></script>
</head>
<body>
    <h1>Masukan Nomor Pasien</h1>

    <?php
    //ambil data dari no_urut dari id yang tertinggi
    //kemudian select 1 data aja
    //masukin ke $add


    $add = (int) substr($kosong, 0, 3);
    $add++;

    $no_urut = sprintf("%03s", $add);

    //$id_loket dapakan dari db dan ambil 1 data
    $id_loket = "A";
    ?>

    
    <div class="form-group row">
        <label class="col-1 col-form-label">No. Pasien</label>
        <div class="col-6">
            <input id="get_no_pasien" type="number" name="no_pasien" class="form-control" required="required">
        </div>
    </div>

         <!-- Large modal -->
        <button onclick="getNoPasien()" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target=".bs-example-modal-lg">Large modal</button> 

        <!--  Modal content for the above example -->
        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myLargeModalLabel">Large modal</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <form action="/antrian_loket/antrian/umum/store-umum" method="post">
                    <div class="modal-body">
                        <h4>Apakah Nomor Pasien Sudah Benar?</h4>
                            {{-- {{ csrf_field() }} --}}
                            @csrf
                            <span>No. Pasien :</span>
                            <span style="font-size:24px;" id="set_no_pasien"></span>
                            <br>
                            {{-- Nomor antrian anda : {{ $id_loket . $no_urut }} --}}
                            <input id="no_pasien" type="hidden" name="no_pasien" value="">
                            <input type="hidden" name="id_loket" value="{{$id_loket}}">
                            <input type="hidden" name="no_urut" value="{{$no_urut}}"> 
                            <input type="hidden" name="panggil" value="0">
                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Gak Yakin</button>
                            <button type="submit" class="btn btn-primary waves-effect waves-light" >OK</button>
                        </div>
                    </form>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        <!-- jQuery  -->
        <script src="{{url('/assets/js/jquery.min.js')}}"></script>
        <script src="{{url('/assets/js/popper.min.js')}}"></script>
        <script src="{{url('/assets/js/bootstrap.min.js')}}"></script>
        <script src="{{url('assets/js/detect.js')}}"></script>
        <script src="{{url('assets/js/fastclick.js')}}"></script>
        <script src="{{url('assets/js/jquery.blockUI.js')}}"></script>
        <script src="{{url('assets/js/waves.js')}}"></script>
        <script src="{{url('assets/js/jquery.nicescroll.js')}}"></script>
        <script src="{{url('assets/js/jquery.slimscroll.js')}}"></script>
        <script src="{{url('assets/js/jquery.scrollTo.min.js')}}"></script>

        <!-- Modal-Effect -->
        <script src="{{url('assets/plugins/custombox/dist/custombox.min.js')}}"></script>
        <script src="{{url('assets/plugins/custombox/dist/legacy.min.js')}}"></script>

        <!-- App js -->
        <script src="{{url('assets/js/jquery.core.js')}}"></script>
        <script src="{{url('assets/js/jquery.app.js')}}"></script>

        <script>
            function getNoPasien() {
                var a = document.getElementById('get_no_pasien').value
                var noPasien = document.getElementById('no_pasien')
                var setNoPasien = document.getElementById('set_no_pasien')
                noPasien.value = a
                setNoPasien.innerHTML = a
            }
        </script>
</body>
</html>