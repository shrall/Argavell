<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Proof;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ProofController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Session::has('transaction.id')) {
            $latest_transaction_id = Session::get('transaction.id');
            Session::forget('transaction.id');
        } else {
            $latest_transaction_id = '';
        }
        return view('pages.payment_confirmation', compact('latest_transaction_id'));
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
        if ($request->has('payment_file')) {
            if (Transaction::where('order_number', '=', $request['order_number'])->exists()) {
                $transaction = Transaction::where('order_number', $request['order_number'])->first();
                if ($transaction->user_id == Auth::id()) {
                    $payment_file = time() . '-' . $request['payment_file']->getClientOriginalName();
                    $request->payment_file->move(public_path('payment'), $payment_file);

                    Proof::create([
                        'name' => $request['sender_name'],
                        'order_number' => $request['order_number'],
                        'payment_file' => $payment_file,
                        'user_id' => Auth::id(),
                        'transaction_id' => $transaction->id
                    ]);
                    return redirect()->route('page.paymentconfirmation')->with('Success', 'Bukti Pembayaran Berhasil Terupload!');
                } else {
                    return redirect()->route('page.paymentconfirmation')->with('Error', 'Invoice ID yang anda pilih bukan milik anda!');
                }
            } else {
                return redirect()->route('page.paymentconfirmation')->with('Error', 'Invoice ID tidak terdaftar!')->with('Additional', ' Silahkan cek pesanan anda melalui email atau halaman my account.');
            }
        } else {
            return redirect()->route('page.paymentconfirmation')->with('Error', 'Sertakan bukti pembayaran!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Proof  $proof
     * @return \Illuminate\Http\Response
     */
    public function show(Proof $proof)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Proof  $proof
     * @return \Illuminate\Http\Response
     */
    public function edit(Proof $proof)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Proof  $proof
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proof $proof)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Proof  $proof
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proof $proof)
    {
        //
    }
}
