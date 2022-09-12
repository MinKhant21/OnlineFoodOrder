<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\FoodController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\AuthController as ControllersAuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;
use App\Models\Cart;


Route::get('/test', function() {
    $carts = Cart::with('FoodMenus')->get();
    dd($carts);
    dd($carts->food->title);
});

//Register

Route::view('/register','auth.register');
Route::post('/register',[ControllersAuthController::class,'register']);

//Login Logout

Route::get('/login',[ControllersAuthController::class,'login']);
Route::post('/login',[ControllersAuthController::class,'postlogin']);
Route::get('/logout',[ControllersAuthController::class,'logout']);

//Home
Route::get('/',[PageController::class,'index']);
Route::get('/category',[PageController::class,'category']);
Route::get('/food',[PageController::class,'food']);
Route::post('/food-search',[PageController::class,'foodsearch']);
Route::get('/order/{id}',[PageController::class,'order']);
Route::get('/category-food/{id}',[PageController::class,'categoryfood']);

//User logined

Route::group(['middleware'=>'Auth'],function(){

    //Cart
    Route::post('addtocart/{slug}',[CartController::class,'addtocart']);
    Route::get('cart',[CartController::class,'showcart']);
    Route::get('add-cart/{id}',[CartController::class,'addcart']);
    Route::get('remove-cart/{id}',[CartController::class,'removecart']);
    Route::get('cancel/{id}',[CartController::class,'cancel']);

    //Order
    Route::get('checkout',[CartController::class,'checkout']);
});

//Admin

Route::view('/admin/login','admin.auth.login');
Route::post('/admin/login',[AuthController::class,'postlogin']);

Route::group([ 'prefix'=>'/admin','namespace' => 'App\Http\Controllers\Admin' ,'middleware'=> 'IsAdmin'],function(){
       
    Route::view('/','admin.layout.master');
    Route::get('dashboard',[DashboardController::class,'dashboard']);
    Route::resource('category',CategoryController::class);
    Route::resource('food',FoodController::class);
    
});
