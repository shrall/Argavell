<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function arganoil(){
        return view('pages.argan_oil');
    }
}
