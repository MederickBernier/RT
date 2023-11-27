<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function home(){
        return view('front.home');
    }

    public function contact(){
        return view('front.contact');
    }

    public function legal(){
        return view('front.legal');
    }

    public function aboutus(){
        return view('front.aboutus');
    }

    public function sendContactMessage(Request $request){
        throw new \Nette\NotImplementedException;
    }
}
