<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/category',[PageController::class,'category']);
Route::get('/food',[PageController::class,'food']);
Route::get('/order',[PageController::class,'order']);
Route::get('/category-food',[PageController::class,'categoryfood']);


Route::get('/admin/login',[AuthController::class,'login']);
Route::post('/admin/login',[AuthController::class,'postlogin']);
