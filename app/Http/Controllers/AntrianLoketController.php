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
        return view('pasien.antrian_umum');
    }

    public function store_umum(Request $request){
        $antrian_loket = AntrianLoket::first();

        if ($antrian_loket == null) {
           $kosong = 0;
        }else{
            $kosong  = AntrianLoket::max('no_urut');
        }

        $add = (int) substr($kosong, 0, 3);
        $add++;

        $no_urut = sprintf("%03s", $add);

        $request->validate([
            'id_loket' => 'required',
            'no_pasien' => 'required',
            'panggil' => 'required'
        ]);

        $antrian_loket = AntrianLoket::create(
            [
                'id_loket' => $request->id_loket,
                'no_urut' => $no_urut,
                'no_pasien' => $request->no_pasien,
                'panggil' => $request->panggil
            ]
        );
        return view('print',['data'=>$antrian_loket]);
    }

    public function store_bpjs(Request $request){
        $antrian_loket = AntrianLoket::where('is_bpjs',1)->get();

        if(count($antrian_loket) == 0){
            $id_loket = "B";
        }else{
            $no = count($antrian_loket) - 1;
            $huruf = $antrian_loket[$no];
            $huruf2 = $huruf->id_loket;

            if($huruf2 == "B"){
                $id_loket = "C";
            }elseif($huruf2 == "C"){
                $id_loket = "D";
            }elseif($huruf2 == "D"){
                $id_loket = "E";
            }elseif($huruf2 == "E"){
                $id_loket = "F";
            }elseif($huruf2 == "F"){
                $id_loket = "B";
            }else{
                $id_loket = "B";
            }
        }

        if ($antrian_loket == null) {
            $kosong = 0;
         }else{
             $kosong  = AntrianLoket::where('id_loket', $id_loket)->max('no_urut');
         }
 
         $add = (int) substr($kosong, 0, 3);
         $add++;
 
         $no_urut = sprintf("%03s", $add);
 
         $request->validate([
             'id_loket' => 'required',
             'no_pasien' => 'required',
             'panggil' => 'required'
         ]);

         $is_bpjs = true;
 
         $antrian_loket = AntrianLoket::create(
             [
                 'id_loket' => $id_loket,
                 'no_urut' => $no_urut,
                 'is_bpjs' => $is_bpjs,
                 'no_pasien' => $request->no_pasien,
                 'panggil' => $request->panggil
             ]
         );
        
         return view('print',['data'=>$antrian_loket]);
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

    public function umum_baru(){
        $antrian_loket = AntrianLoket::first();

        if ($antrian_loket == null) {
           $kosong = 0;
        }else{
            $kosong  = AntrianLoket::max('no_urut');
        }

        $add = (int) substr($kosong, 0, 3);
        $add++;

        $no_urut = sprintf("%03s", $add);

        $antrian_loket = AntrianLoket::create(
            [
                'id_loket' => "A",
                'no_urut' => $no_urut,
                
                'panggil' => 0
            ]
        );
        return view('print',['data'=>$antrian_loket]);
    }

    public function antrianlamabpjs(){
        $antrian_loket = AntrianLoket::where('is_bpjs',1)->get();

        
        return view('pasien.antrianlama_bpjs', compact('kosong'));
    }

    public function bpjs_baru(){
        $antrian_loket = AntrianLoket::where('is_bpjs',1)->get();

        if(count($antrian_loket) == 0){
            $id_loket = "B";
        }else{
            $no = count($antrian_loket) - 1;
            $huruf = $antrian_loket[$no];
            $huruf2 = $huruf->id_loket;

            if($huruf2 == "B"){
                $id_loket = "C";
            }elseif($huruf2 == "C"){
                $id_loket = "D";
            }elseif($huruf2 == "D"){
                $id_loket = "E";
            }elseif($huruf2 == "E"){
                $id_loket = "F";
            }elseif($huruf2 == "F"){
                $id_loket = "B";
            }else{
                $id_loket = "B";
            }
        }

        if ($antrian_loket == null) {
            $kosong = 0;
         }else{
             $kosong  = AntrianLoket::where('id_loket', $id_loket)->max('no_urut');
         }
 
         $add = (int) substr($kosong, 0, 3);
         $add++;
 
         $no_urut = sprintf("%03s", $add);

         //$is_bpjs = true;
 
         $antrian_loket = AntrianLoket::create(
             [
                 'id_loket' => $id_loket,
                 'no_urut' => $no_urut,
                
                 'is_bpjs' => 1,
                 'panggil' => 0
             ]
         );
        
         return view('print',['data'=>$antrian_loket]);
    }
}
