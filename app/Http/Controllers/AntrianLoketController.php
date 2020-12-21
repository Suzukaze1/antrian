<?php

namespace App\Http\Controllers;

use App\AntrianLoket;
use Illuminate\Http\Request;

class AntrianLoketController extends Controller
{
    //
    public function index(){
        return view('pasien.index');
    }

    public function tipe(){
        return view('pasien.tipe');
    }

    public function antrian(){
        return view('pasien.antrian');

    }

    public function antrianlamaumum(){
        $antrian_loket = AntrianLoket::first();

        if ($antrian_loket == null) {
           $kosong = 0;
        }else{
            $kosong  = AntrianLoket::max('no_urut');
        }
        
        return view('pasien.antrianlama_umum', compact('kosong'));
    }

    public function umum(){
        $antrian_loket = AntrianLoket::first();

        if ($antrian_loket == null) {
           $kosong = 0;
        }else{
            $kosong  = AntrianLoket::max('no_urut');
        }
    
        return view('pasien.antrian_umum', compact('kosong'));
    }

    public function store_umum(Request $request){
        //dd($request->panggil);
        $request->validate([
            'id_loket' => 'required',
            'no_urut' => 'required',
            'no_pasien' => 'required',
            'panggil' => 'required'
        ]);

        $antrian_loket = AntrianLoket::create(
            [
                'id_loket' => $request->id_loket,
                'no_urut' => $request->no_urut,
                'no_pasien' => $request->no_pasien,
                'panggil' => $request->panggil
            ]
        );

        // dd($antrian_loket);
        return 'Ok';
    }

    public function antrianlama(){
        return view('pasien.pasien_lama');
    }

    public function antrianbaru(){
        return view('pasien.pasien_baru');
    }

    public function cetak(){
        //bentar2
        // gas ga?
        
        //mandi jap
    }
}
