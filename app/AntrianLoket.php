<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AntrianLoket extends Model
{
    //
    protected $table = 'antrian.antrian_lokets';

    protected $fillable = ["id_loket", "no_urut", "no_pasien", "is_bpjs", "panggil"];
}
