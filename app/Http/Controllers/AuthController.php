<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
  
    public function register(Request $request){
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'address' => $request->city,
        ]);

        


        return redirect('/login');
    }

    public function login(){
        return view('auth.login');
    }

    public function postlogin(Request $request){
        auth()->logout();
        $cre =  $request->only('email','password');
        if(auth()->attempt($cre)){
            return redirect('/')->with('success','Login');
          
        }
        return redirect('/login')->with('error','Try Again!');
    }

    public function logout(){
        auth()->logout();
        return redirect('/');
    }

}
