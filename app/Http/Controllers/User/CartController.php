<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
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
        $product = Product::find($request->id);
        $cart = Cart::create([
            'qty' => $request->quantity,
            'size' => $request->size . "ml",
            'price' => $product['price'],
            'price_discount' => $product['price_discount'],
            'product_id' => $request->id,
            'user_id' => Auth::id(),
            'transaction_id' => null
        ]);
        return response()->json($cart);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Cart::find($id);
        $item->delete();
        return response()->json($item);
    }

    public function add_item(Request $request)
    {
        $item = Cart::find($request->id);
        $item->update([
            'qty' => $item['qty'] + 1
        ]);
        return response()->json($item);
    }

    public function subtract_item(Request $request)
    {
        $item = Cart::find($request->id);
        $item->update([
            'qty' => $item['qty'] - 1
        ]);
        return response()->json($item);
    }
}