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
        View::share('allProducts', Product::all());
        return $next($request);
    }
}
