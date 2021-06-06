<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Proof;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProofController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.payment_confirmation');
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
            $payment_file = time() . '-' . $request['payment_file']->getClientOriginalName();
            $request->payment_file->move(public_path('payment'), $payment_file);
        } else {
            $payment_file = null;
        }

        Proof::create([
            'name' => $request['sender_name'],
            'order_number' => $request['order_number'],
            'payment_file' => $payment_file,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('page.paymentconfirmation');
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