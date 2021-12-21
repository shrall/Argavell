<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Refund;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RefundController extends Controller
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
        if (Transaction::where('order_number', '=', $request['order_number'])->exists()) {
            $transaction = Transaction::where('order_number', $request['order_number'])->first();
            if ($transaction->status == '1') {
                if ($request->has('condition')) {
                    $condition = time() . '-' . $request['condition']->getClientOriginalName();
                    $request->condition->move(public_path('refunds'), $condition);
                } else {
                    $condition = null;
                }

                Refund::create([
                    'name' => $request['name'],
                    'notes' => $request['notes'],
                    'occasion' => $request['occasion'],
                    'phone' => $request['phone_number'],
                    'condition' => $condition,
                    'transaction_id' => $transaction->id,
                    'user_id' => Auth::id(),
                ]);
                return redirect()->route('page.policy')->with('Success', 'Pengajuan Berhasil Terkirim!');
            } else {
                return redirect()->route('page.policy')->with('Error', 'Order Belum Terselesaikan!');
            }
        } else {
            return redirect()->route('page.policy')->with('Error', 'Invoice ID tidak terdaftar!')->with('Additional', ' Silahkan cek pesanan anda melalui email atau halaman my account.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Refund  $refund
     * @return \Illuminate\Http\Response
     */
    public function show(Refund $refund)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Refund  $refund
     * @return \Illuminate\Http\Response
     */
    public function edit(Refund $refund)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Refund  $refund
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Refund $refund)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Refund  $refund
     * @return \Illuminate\Http\Response
     */
    public function destroy(Refund $refund)
    {
        //
    }
}
