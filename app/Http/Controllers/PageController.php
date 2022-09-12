<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\FoodMenu;
use App\Models\Order;
use Illuminate\Http\Request;

class PageController extends Controller
{   
    public function index(){
        $category = Category::all();
        $food = FoodMenu::all();
        return view('index',compact('category','food'));
    }

   
    public function category(){
        $category = Category::all();
        return view('category',compact('category'));
    }

    public function food(){
        $food = FoodMenu::all();
        return view('food',compact('food'));
    }

    public function order($id){
       
       $food = FoodMenu::where('id',$id)->first();
       return view('order',compact('food'));
       
    }

    public function categoryfood($slug){
        $category = Category::where('id',$slug)->first();

        $food = FoodMenu::where('title','like','%'.$category->name.'%')->get();
        return view('category-food',compact('food'));
    }

    public function foodsearch(Request $request){
        $title = $request->title;
        $food = FoodMenu::where('title','like',"%{$title}%")->get();
        return view('food-search',compact('food','title'));
    }
}
