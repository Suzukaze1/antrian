<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Antrian BPJS</title>
</head>
<body>
    <h1>Masukan Nomor Pasien</h1>

    <?php
    //ambil data dari no_urut dari id yang tertinggi dari db
    //kemudian select 1 data aja
    //masukin ke $a
    
    $a = 0;
    $add = (int) substr($a, 0, 3);
    $add++;

    $no_urut = sprintf("%03s", $add);


    //$id_loket dapakan dari db dan ambil 1 data
    $id_loket = "B";

    if($id_loket == "B"){
        $id_loket = "C";
    }elseif($id_loket == "C"){
        $id_loket = "D";
    }elseif($id_loket == "D"){
        $id_loket = "E";
    }elseif($id_loket == "E"){
        $id_loket = "F";
    }elseif($id_loket == "F"){
        $id_loket = "B";
    }else{
        $id_loket = "B";
    }
    ?>

    <form action="#" method="post">
        {{ csrf_field() }}
        No. Pasien <input type="number" name="no_pasien" required="required"><br>
        <input type="hidden" name="id_loket" value="<?php echo $id_loket ?>">
        <input type="hidden" name="no_urut" value="<?php echo $no_urut?>">
        <input type="hidden" name="panggil" value="0">
        <input type="submit" value="Ok">
    </form>

</body>
</html>