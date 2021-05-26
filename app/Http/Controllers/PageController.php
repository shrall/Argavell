<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function arganoil(){
        return view('pages.argan_oil');
    }

    public function arganshampoo(){
        return view('pages.argan_shampoo');
    }

    public function kleanse(){
        return view('pages.kleanse');
    }

    public function termsconditions(){
        return view('pages.terms_conditions');
    }
}
