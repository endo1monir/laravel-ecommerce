<?php

use App\Http\Controllers\FrontEnd\FrontEndController;
use Illuminate\Support\Facades\Auth;
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



    Route::get('/', [FrontEndController::class,'index'])->name('front.index');
    Route::get('/cart',[FrontEndController::class,'cart'])->name('front.cart');
     Route::get('/detail',[FrontEndController::class,'detail'])->name('front.detail');
    Route::get('/checkout',[FrontEndController::class,'checkout'])->name('front.checkout');
    Route::get('/shop',[FrontEndController::class,'shop'])->name('front.shop');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
