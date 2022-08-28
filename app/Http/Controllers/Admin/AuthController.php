<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(){
        return view('admin.auth.login');
    }

    public function postlogin(Request $request){

        $cre =  $request->only('email','password');
        if(!auth()->attempt($cre)){
            return redirect()->back()->with('error','Please Try Again');
        }
        return view('admin.index');
    }
}
