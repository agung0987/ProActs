<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class login extends Controller
{
    public function halamanlogin(){
        return view('login');
    }
    public function postlogin(request $request){
        if(Auth::attempt($request->only('email','password'))){
            return redirect('/datauser');
        }
        return redirect('/login');
    }
    public function registrasi(){
        return view('login.registrasi');
    }
    public function simpanregistrasi(request $request){

        User::create([
            'name' => $request -> name,
            'email']);
        }
}
