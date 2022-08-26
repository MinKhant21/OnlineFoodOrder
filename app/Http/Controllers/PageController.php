<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function category(){
        return view('category');
    }

    public function food(){
        return view('food');
    }

    public function order(){
        return view('order');
    }

    public function categoryfood(){
        return view('category-food');
    }
}
