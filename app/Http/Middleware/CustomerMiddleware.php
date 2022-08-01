<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\View;

class CustomerMiddleware
{
    public function handle(
        Request $request,
        Closure $next
    ) {
        $products =  Product::where('bundle', "0")->get();
        View::share('allProducts', $products);
        return $next($request);
    }
}
