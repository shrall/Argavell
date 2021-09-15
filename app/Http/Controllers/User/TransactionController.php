<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Cart;
use App\Models\Refund;
use App\Models\Transaction;
use App\Models\User;
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
        $user = User::where('id', Auth::id())->first();
        if (!Auth::user()->address_id) {
            $request->validate([
                'shipping_method' => ['required'],
                'shipping_cost' => ['required'],
                'price_total' => ['required'],
                'qty_total' => ['required'],
                'weight_total' => ['required'],
                'province' => ['required'],
                'city' => ['required'],
                'postal_code' => ['required'],
                'phone_number' => ['required'],
                'address' => ['required'],
            ]);
            $address = Address::create([
                'first_name' => Auth::user()->first_name,
                'last_name' => Auth::user()->last_name,
                'phone' => $request->phone_number,
                'address' => $request->address,
                'address_type' => 'Home',
                'city' => $request->city,
                'province' => $request->province,
                'postal_code' => $request->postal_code,
                'user_id' => Auth::id(),
            ]);
            $user->update([
                'address_id' => $address['id'],
            ]);
        }
        $transactions = Transaction::where('date', Carbon::now()->format('Y-m-d'))->get();
        $ordernumber = 'INV' . Carbon::now()->format('Ymd') . '-' . strval(sprintf("%04s", count($transactions) + 1));

        if ($request->shipping_method == 'CTC') {
            $request->shipping_method = 'REG - JNE';
        } else if ($request->shipping_method == 'CTCYES') {
            $request->shipping_method = 'YES - JNE';
        }
        $transaction = Transaction::create([
            'status' => '0',
            'order_number' => $ordernumber,
            'date' => Carbon::now()->format('Y-m-d'),
            'shipment_name' => $request->shipping_method,
            'shipping_cost' => $request->shipping_cost,
            'price_total' => $request->price_total,
            'qty_total' => $request->qty_total,
            'weight_total' => $request->weight_total,
            'shipment_etd' => intval(substr($request->shipping_etd, 2)),
            'payment_id' => $request->payment_method,
            'address_id' =>$user->address_id,
            'user_id' => Auth::id(),
            'notes' => $request->notes
        ]);
        $carts = Cart::where('transaction_id', null)->get();
        foreach ($carts as $cart) {
            $cart->product->update([
                'stock' => $cart->product->stock - $cart->qty
            ]);
            $cart->update([
                'transaction_id' => $transaction->id
            ]);
            $othercarts = $cart->product->carts->where('transaction_id', null);
            foreach ($othercarts as $othercart) {
                if ($othercart->qty > $cart->product->stock) {
                    $othercart->delete();
                }
            }
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

    public function get_snap(Request $request)
    {
        $transactions = Transaction::where('date', Carbon::now()->format('Y-m-d'))->get();
        $ordernumber = 'INV' . Carbon::now()->format('Ymd') . '-' . strval(sprintf("%04s", count($transactions) + 1));


        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('services.midtrans.serverkey');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        //@marshall rubah ini kalo ga sandbox
        \Midtrans\Config::$isProduction = true;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => $ordernumber,
                'gross_amount' => $request->price,
            ),
            'customer_details' => array(
                'first_name' => Auth::user()->first_name,
                'last_name' => Auth::user()->last_name,
                'email' => Auth::user()->email,
                'phone' => $request->phone,
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);

        return $snapToken;
    }

    public function check()
    {
        \Midtrans\Config::$isProduction = true;
        \Midtrans\Config::$serverKey = config('services.midtrans.serverkey');
        $notif = new \Midtrans\Notification();

        $transaction = $notif->transaction_status;
        $type = $notif->payment_type;
        $order_id = $notif->order_id;
        $fraud = $notif->fraud_status;

        if ($transaction == 'capture') {
            // For credit card transaction, we need to check whether transaction is challenge by FDS or not
            if ($type == 'credit_card') {
                if ($fraud == 'challenge') {
                    // TODO set payment status in merchant's database to 'Challenge by FDS'
                    // TODO merchant should decide whether this transaction is authorized or not in MAP
                    echo "Transaction order_id: " . $order_id . " is challenged by FDS";
                } else {
                    // TODO set payment status in merchant's database to 'Success'
                    $transaction = Transaction::where('order_number', $order_id)->first()->update([
                        'status' => '3'
                    ]);
                }
            }
        } else if ($transaction == 'settlement') {
            // TODO set payment status in merchant's database to 'Settlement'
            $transaction = Transaction::where('order_number', $order_id)->first()->update([
                'status' => '3'
            ]);
        } else if ($transaction == 'pending') {
            // TODO set payment status in merchant's database to 'Pending'
            $transaction = Transaction::where('order_number', $order_id)->first()->update([
                'status' => '0'
            ]);
        } else if ($transaction == 'deny') {
            // TODO set payment status in merchant's database to 'Denied'
            $transaction = Transaction::where('order_number', $order_id)->first()->update([
                'status' => '2'
            ]);
        } else if ($transaction == 'expire') {
            // TODO set payment status in merchant's database to 'expire'
            $transaction = Transaction::where('order_number', $order_id)->first()->update([
                'status' => '2'
            ]);
        } else if ($transaction == 'cancel') {
            // TODO set payment status in merchant's database to 'Denied'
            $transaction = Transaction::where('order_number', $order_id)->first()->update([
                'status' => '2'
            ]);
        }
    }
    public function online_store(Request $request)
    {
        $user = User::where('id', Auth::id())->first();
        if (!Auth::user()->address_id) {
            $address = Address::create([
                'first_name' => Auth::user()->first_name,
                'last_name' => Auth::user()->last_name,
                'phone' => $request->phone_number,
                'address' => $request->address,
                'address_type' => 'Home',
                'city' => $request->city,
                'province' => $request->province,
                'postal_code' => $request->postal_code,
                'user_id' => Auth::id(),
            ]);
            $user->update([
                'address_id' => $address['id'],
            ]);
        }
        $transactions = Transaction::where('date', Carbon::now()->format('Y-m-d'))->get();
        $ordernumber = 'INV' . Carbon::now()->format('Ymd') . '-' . strval(sprintf("%04s", count($transactions) + 1));

        if ($request->data[7]['value'] == 'CTC') {
            $request->data[7]['value'] = 'REG - JNE';
        } else if ($request->data[7]['value'] == 'CTCYES') {
            $request->data[7]['value'] = 'YES - JNE';
        }

        $transaction = Transaction::create([
            'status' => $request->status,
            'order_number' => $ordernumber,
            'date' => Carbon::now()->format('Y-m-d'),
            'shipment_name' => $request->data[7]['value'],
            'shipping_cost' => $request->data[4]['value'],
            'price_total' => $request->data[1]['value'],
            'qty_total' => $request->data[2]['value'],
            'weight_total' => $request->data[3]['value'],
            'shipment_etd' => intval(substr($request->data[6]['value'], 2)),
            'payment_id' => $request->data[9]['value'],
            'address_id' => $user->address_id,
            'user_id' => Auth::id(),
            'notes' => $request->data[5]['value'],
            'snaptoken' => $request->snaptoken
        ]);
        $carts = Cart::where('transaction_id', null)->get();
        foreach ($carts as $cart) {
            $cart->product->update([
                'stock' => $cart->product->stock - $cart->qty
            ]);
            $cart->update([
                'transaction_id' => $transaction->id
            ]);
            $othercarts = $cart->product->carts->where('transaction_id', null);
            foreach ($othercarts as $othercart) {
                if ($othercart->qty > $cart->product->stock) {
                    $othercart->delete();
                }
            }
        }
    }
    public function buy_again(Request $request)
    {
        $transaction = Transaction::find($request->id);
        foreach ($transaction->carts as $item) {
            if ($item->product->stock >= $item->qty) {
                Cart::create([
                    'qty' => $item->qty,
                    'size' => $item->size,
                    'price' => $item->product->price,
                    'price_discount' => $item->product->price_discount,
                    'product_id' => $item->product_id,
                    'user_id' => Auth::id(),
                    'transaction_id' => null
                ]);
            }
        }
        return redirect()->route('user.cart.index');
    }
}
