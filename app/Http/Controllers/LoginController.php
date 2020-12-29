<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index(){
        return view('login');
        
    }

    public function login(Request $request){
        $user = User::where('nip',$request->nip)->get()->first();
        if($user == null){
            return redirect('/login')->with(['error' => "User Tidak Ditemukan"]);
        }
        $password = Hash::check($request->password,$user->password);
        if($password){
            Session::put('login',true);
            if($user->isAdmin){
                Session::put('isAdmin',true);
            }
        }
        return redirect('/admin');
    }

    public function logout(){
        Session::flush();
        return redirect('/login');
    }
}
