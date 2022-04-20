<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    //
    public function index(){
return view('frontend.index');
    }
    public function cart(){
        return view('frontend.cart');
    }
    public function detail(){
        return view('frontend.detail');
    }
    public function checkout(){
        return view('frontend.checkout');
    }
    public function shop(){
        return view('frontend.shop');
    }



}
