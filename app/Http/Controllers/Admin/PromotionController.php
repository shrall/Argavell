<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Promotion;
use Illuminate\Http\Request;

class PromotionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $promotions = Promotion::all();
        return view('admin.promotion.index', compact('promotions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::whereDoesntHave('promotions')->get();
        return view('admin.promotion.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = Product::where('id', $request->product_id)->first();
        $price_discounts = [];
        $amount = 0;
        foreach ($request->percent as $key => $value) {
            if ($value == 0) {
                $amount = $request->amount[$key];
            } else {
                $amount = $request->amount[$key] / 100 * $product->price[$key];
            }
            array_push($price_discounts, $amount);
        }
        $product->update([
            'price_discount' => $price_discounts
        ]);
        Promotion::create([
            'name' => $request->name,
            'product_id' => $request->product_id,
            'amount' => $request->amount,
            'percent' => $request->percent
        ]);
        return redirect()->route('admin.promotion.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function show(Promotion $promotion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function edit(Promotion $promotion)
    {
        return view('admin.promotion.edit', compact('promotion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Promotion $promotion)
    {
        $product = Product::where('id', $request->product_id)->first();
        $price_discounts = [];
        $amount = 0;
        foreach ($request->percent as $key => $value) {
            if ($value == 0) {
                $amount = $request->amount[$key];
            } else {
                $amount = $request->amount[$key] / 100 * $product->price[$key];
            }
            array_push($price_discounts, $amount);
        }
        $promotion->product->update([
            'price_discount' => $price_discounts
        ]);
        $promotion->update([
            'name' => $request->name,
            'amount' => $request->amount,
            'percent' => $request->percent
        ]);
        return redirect()->route('admin.promotion.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Promotion $promotion)
    {
        $price_discounts = [];
        foreach ($promotion->percent as $key => $value){
            array_push($price_discounts, 0);
        }
        $promotion->product->update([
            'price_discount' => $price_discounts
        ]);
        $promotion->delete();
        return redirect()->route('admin.promotion.index');
    }

    public function get_product(Request $request)
    {
        $product = Product::where('id', $request->id)->first();
        return view('admin.promotion.inc.product', compact('product'));
    }
}
