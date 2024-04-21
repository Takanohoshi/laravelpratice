<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index (){
        return view ('login');
    }
    public function poslog (Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        $info = [
            'email' => $request->email,
            'password' => $request->password
        ];
        if(Auth::attempt($info)){
            $request -> session() -> regenerate();

            if (Auth::user()->level=='admin'){
                return redirect('admindash')->with('loginberhasil', 'Login berhasil!!');
                }
                if (Auth::user()->level=='petugas')
                return redirect('petugasdash')->with('loginberhasil', 'Login berhasil!!');
                }
                if  (Auth::user()->level=='guest'){
                    return redirect('guestdash')->with('loginberhasi', 'login berhasil!!');
                }
        else{
            return redirect('/login')->with('loginError', 'Login gagal!, silahkan cek email atau password anda ');
        }

    }
}
