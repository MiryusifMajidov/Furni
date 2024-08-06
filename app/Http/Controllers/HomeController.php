<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class HomeController extends Controller
{
    public function index()
    {
        return view('index');
    }
    public function setLocale($locale)
    {
        if(in_array($locale,['en','ru','az'])){
            App::setLocale($locale);
            session()->put('locale', $locale);
        }
        return redirect()->back();
    }

    public function shop()
    {
        return view('shop');
    }
    public function about()
    {
        return view('about');
    }
    public function blog()
    {
        return view('blog');
    }
    public function contact()
    {
        return view('contact');
    }
    public function services()
    {
        return view('services');
    }
    public function cart()
    {
        return view('cart');
    }
    public function checkout()
    {
        return view('checkout');
    }

}
