<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = Transaction::where('user_id', Auth::id())->get();
        return view('user.User.transaction', compact('transactions'));
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
        $transactions = Transaction::where('date', Carbon::now()->format('Y-m-d'))->get();
        $ordernumber = 'INV' . Carbon::now()->format('Ymd') . '-' . strval(sprintf("%04s", count($transactions) + 1));

        if ($request->shipping_method == 'CTC' || $request->shipping_method == 'CTCYES') {
            $request->shipping_method = 'JNE';
        }
        $transaction = Transaction::create([
            'status' => '0',
            'order_number' => $ordernumber,
            'date' => Carbon::now()->format('Y-m-d'),
            'shipment_name' => $request->shipping_method,
            'shipping_cost' => $request->shipping_cost,
            'price_total' => $request->price_total,
            'qty_total' => $request->qty_total,
            'payment_id' => $request->payment_method,
            'address_id' => Auth::user()->address_id,
            'user_id' => Auth::id(),
            'notes' => $request->notes
        ]);
        $carts = Cart::where('transaction_id', null)->get();
        foreach ($carts as $cart) {
            $cart->update([
                'transaction_id' => $transaction->id
            ]);
        }
        return view('pages.order');
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
        //
    }
}
