<?php

namespace App\Http\Controllers;

use App\Admin;
use App\AntrianLoket;
use App\Kelompok;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    //method view login
    public function login(){
        return view('admin.login');
    }

    //method view index
    public function index(){
        return view('admin.index');
    }

    //method view antrian
    public function loket(){
        //$kelompok_umum = Kelompok::all();
        $kelompok_umum = Kelompok::where('is_bpjs', 0)->get();
        $kelompok_bpjs = Kelompok::where('is_bpjs', 1)->get();
        return view('admin.loket', ['kelompok_umum' => $kelompok_umum, 'kelompok_bpjs' => $kelompok_bpjs]);
    }

    //method view pegawai
    public function pegawai(){
        $pegawai = Admin::all();
        //$name = DB::table('pegawai.tb_pegawai')->where('nama_lengkap', 'FAHRUDDIN')->pluck('nama_lengkap');
        return view('admin.pegawai', ['pegawai' => $pegawai]);
    }

    //
    public function loketpilih($loket){
        $data = AntrianLoket::where('id_loket',$loket)->where('panggil',true)->latest()->first();
        if($data != null){
            $no_urut = sprintf("%03s", $data->no_urut);
        }
        else{
            $no_urut = sprintf("%03s", 0);
        }
        return view('admin.loket_pilih',['loket' => $loket, 'no_urut' => $no_urut]);
    }

    public function getAntrian($loket){
        $jumlahsudahdipanggil = AntrianLoket::where('id_loket',$loket)->where('panggil',true)->get()->count();
        $jumlahbelumdipanggil = AntrianLoket::where('id_loket',$loket)->where('panggil',false)->get()->count();
        $jumlahsemua = AntrianLoket::where('id_loket',$loket)->get()->count();
        return response([$jumlahsudahdipanggil,$jumlahbelumdipanggil,$jumlahsemua],200);
    }

    public function panggil($loket){
        $data = AntrianLoket::where('id_loket',$loket)->where('panggil',false)->get()->first();

        if($data == null){
            return response("habis",200);
        }
        $data->panggil = true;
        $data->save();

        $no_urut = sprintf("%03s", $data->no_urut);
        return response($no_urut,200);
    }
}
