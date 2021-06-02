<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\Reseller;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function arganoil()
    {
        return view('pages.argan_oil');
    }

    public function arganshampoo()
    {
        return view('pages.argan_shampoo');
    }

    public function kleanse()
    {
        return view('pages.kleanse');
    }

    public function termsconditions()
    {
        return view('pages.terms_conditions');
    }

    public function authorizedreseller()
    {
        $resellers = Reseller::all();
        return view('pages.authorized_reseller', compact('resellers'));
    }

    public function faq()
    {
        $faqs = Faq::all();
        return view('pages.faq', compact('faqs'));
    }

    public function returnpolicy()
    {
        return view('pages.return_policy');
    }

    public function productdetail()
    {
        return view('pages.product_detail');
    }

    public function checkout()
    {
        return view('pages.checkout');
    }

    public function paymentconfirmation()
    {
        return view('pages.payment_confirmation');
    }

    public function profile()
    {
        return view('pages.profile');
    }

    public function transactions()
    {
        return view('pages.transactions');
    }

    public function address()
    {
        return view('pages.my_address');
    }

    public function changepassword()
    {
        return view('pages.change_password');
    }
}
