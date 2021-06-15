<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Refund;
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

    public function get_snap(Request $request)
    {
        $transactions = Transaction::where('date', Carbon::now()->format('Y-m-d'))->get();
        $ordernumber = 'INV' . Carbon::now()->format('Ymd') . '-' . strval(sprintf("%04s", count($transactions) + 1));


        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('services.midtrans.serverkey');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
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
                'phone' => Auth::user()->address->phone,
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
        $transactions = Transaction::where('date', Carbon::now()->format('Y-m-d'))->get();
        $ordernumber = 'INV' . Carbon::now()->format('Ymd') . '-' . strval(sprintf("%04s", count($transactions) + 1));
        $shipmentname = $request->data[5]['value'];

        if ($request->data[5]['value'] == 'CTC' || $request->data[5]['value'] == 'CTCYES') {
            $shipmentname = 'JNE';
        }

        $transaction = Transaction::create([
            'status' => $request->status,
            'order_number' => $ordernumber,
            'date' => Carbon::now()->format('Y-m-d'),
            'shipment_name' => $shipmentname,
            'shipping_cost' => $request->data[3]['value'],
            'price_total' => $request->data[1]['value'],
            'qty_total' => $request->data[2]['value'],
            'payment_id' => $request->data[6]['value'],
            'address_id' => Auth::user()->address_id,
            'user_id' => Auth::id(),
            'notes' => $request->data[4]['value'],
            'snaptoken' => $request->snaptoken
        ]);
        $carts = Cart::where('transaction_id', null)->get();
        foreach ($carts as $cart) {
            $cart->update([
                'transaction_id' => $transaction->id
            ]);
        }
    }
}
