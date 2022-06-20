<?php

use App\Http\Controllers\BackEnd\BackendController;
use App\Http\Controllers\BackEnd\ProductCategoriesController;
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



Route::get('/', [FrontEndController::class, 'index'])->name('front.index');
Route::get('/cart', [FrontEndController::class, 'cart'])->name('front.cart');
Route::get('/detail', [FrontEndController::class, 'detail'])->name('front.detail');
Route::get('/checkout', [FrontEndController::class, 'checkout'])->name('front.checkout');
Route::get('/shop', [FrontEndController::class, 'shop'])->name('front.shop');
Auth::routes(['verify' => true]);
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::group(['middleware' => 'guest'], function () {
        Route::get('/login', [BackendController::class, 'login'])->name('login');
        Route::get('/forget-password', [BackendController::class, 'forget_password'])->name('forget-password');
    });
    Route::group(['middleware' => ['roles', 'role:admin|supervisor']], function () {
        Route::get('/index', [BackendController::class, 'index'])->name('index')->middleware('roles');
        Route::get('/', [BackendController::class, 'index'])->name('route_index')->middleware('roles');
        Route::resource('product_categories', ProductCategoriesController::class);
    });
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
