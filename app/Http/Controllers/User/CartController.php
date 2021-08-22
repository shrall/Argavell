<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Payment;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $addresses = Address::where('user_id', Auth::id())->get();

        $cities = Http::withHeaders([
            'key' => config('services.rajaongkir.token'),
        ])->get('https://api.rajaongkir.com/starter/city')
            ->json()['rajaongkir']['results'];

        $provinces = Http::withHeaders([
            'key' => config('services.rajaongkir.token'),
        ])->get('https://api.rajaongkir.com/starter/province')
            ->json()['rajaongkir']['results'];

        $payments = Payment::where('id', '!=', 1001)->get();

        $useraddress = null;
        foreach ($cities as $city) {
            if ($city['city_name'] == Auth::user()->address->city) {
                $useraddress = $city['city_id'];
            }
        }
        $weight = 0;
        $items = Cart::where('transaction_id', null)->where('user_id', Auth::id())->get();
        foreach ($items as $item) {
            $weight += $item->product->weight;
        }

        $shipments = Http::withHeaders([
            'key' => config('services.rajaongkir.token'),
        ])->post('https://api.rajaongkir.com/starter/cost', [
            'origin' => $useraddress,
            'destination' => $useraddress,
            'weight' => $weight,
            'courier' => 'jne',
        ])->json()['rajaongkir']['results'][0];

        return view('user.Checkout.index', compact('addresses', 'cities', 'provinces', 'payments', 'shipments', 'weight'));
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
        $item = $cart;
        return view('inc.cart.product', compact('item'));
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
