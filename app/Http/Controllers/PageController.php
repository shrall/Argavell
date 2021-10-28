<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Faq;
use App\Models\Policy;
use App\Models\Product;
use App\Models\Reseller;
use App\Models\Tnc;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PageController extends Controller
{
    public function arganoil()
    {
        $products = Product::where('type', '0')->get();
        return view('pages.argan_oil', compact('products'));
    }

    public function arganshampoo()
    {
        $products = Product::where('type', '0')->get();
        return view('pages.argan_shampoo', compact('products'));
    }

    public function kleanse()
    {
        $products = Product::where('type', '1')->get();
        return view('pages.kleanse', compact('products'));
    }

    public function termsconditions()
    {
        $tncs = Tnc::all();
        return view('pages.terms_conditions', compact('tncs'));
    }

    public function contactus()
    {
        return view('pages.contact_us');
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
        $policies = Policy::all();
        return view('pages.return_policy', compact('policies'));
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

    public function order()
    {
        return view('pages.order');
    }

    public function dashboard()
    {
        $transactions = Transaction::all();
        $users = User::all();
        $carts = Cart::all();
        return view('admin.dashboard', compact('transactions', 'users', 'carts'));
    }

    public function redirect_login(Request $request){
        Session::put('route.intended', $request->prev_route);
        if($request->product_slug){
            Session::put('product.slug', $request->product_slug);
        }
        return redirect()->route('login');
    }
}
