<?php

namespace App\Http\Controllers;

use App\Models\Bundle;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $bundles = Product::where('bundle', '1')
            ->where('bundle_start', '<=', Carbon::now())
            ->where('bundle_end', '>=', Carbon::now())
            ->whereHas('bundles', function (Builder $query)  use ($product) {
                $query->where('product_id',  $product->id);
            })->get();
        if ($product->bundle) {
            $bundledProducts = Bundle::where('bundle_id', $product->id)
                ->with('product')
                ->get();
            $bundledSize = join(
                " + ",
                array_map(function($bundledProduct) {
                    return $bundledProduct['size']."ml"." ".$bundledProduct['product']['name'];
                }, $bundledProducts->toArray())
            );
            return view('user.Product.show', compact('product', 'bundles', 'bundledProducts', 'bundledSize'));
        } else {
            return view('user.Product.show', compact('product', 'bundles'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
