<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function postlogin(Request $request){
        auth()->logout();
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ],[
            'email.required' => 'Need Email',
            'password.required' => 'Need Password',
        ]);
        $cre = $request->only('email','password');
        if(auth()->attempt($cre)){
            
            $user =  auth()->user();
            if($user->role === 'user'){
                return redirect()->back()->with('error','You are not admin yet');
            }
            return redirect('/admin')->with('success','Welcome admin');
        } 
     
    }
}
