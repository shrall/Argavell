<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = Transaction::paginate(2);
        return view('admin.transaction.index', compact('transactions'));
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
        if ($request->input_method == 'new') {
            foreach ($request->transaction_id as $transaction_id) {
                $transaction = Transaction::where('id', $transaction_id)->first();
                $transaction->update([
                    'status' => '5'
                ]);
            }
        } else if ($request->input_method == 'cancel') {
            foreach ($request->transaction_id as $transaction_id) {
                $transaction = Transaction::where('id', $transaction_id)->first();
                $transaction->update([
                    'status' => '2'
                ]);
            }
        }
        return redirect()->route('admin.transaction.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        //
    }

    function fetch_data_all(Request $request)
    {
        if ($request->ajax()) {
            $transactions = Transaction::paginate(2);
            return view('admin.transaction.inc.transaction', compact('transactions'))->render();
        }
    }

    function fetch_data_new(Request $request)
    {
        if ($request->ajax()) {
            $transactions = Transaction::where('status', '4')->paginate(2);
            return view('admin.transaction.inc.transaction', compact('transactions'))->render();
        }
    }

    function fetch_data_ready(Request $request)
    {
        if ($request->ajax()) {
            $transactions = Transaction::where('status', '5')->paginate(2);
            return view('admin.transaction.inc.transaction', compact('transactions'))->render();
        }
    }

    function fetch_data_ondelivery(Request $request)
    {
        if ($request->ajax()) {
            $transactions = Transaction::where('status', '3')->paginate(2);
            return view('admin.transaction.inc.transaction', compact('transactions'))->render();
        }
    }

    function fetch_data_complain(Request $request)
    {
        if ($request->ajax()) {
            //belum
            $transactions = Transaction::paginate(2);
            return view('admin.transaction.inc.transaction', compact('transactions'))->render();
        }
    }

    function fetch_data_canceled(Request $request)
    {
        if ($request->ajax()) {
            $transactions = Transaction::where('status', '2')->paginate(2);
            return view('admin.transaction.inc.transaction', compact('transactions'))->render();
        }
    }

    function fetch_data_delivered(Request $request)
    {
        if ($request->ajax()) {
            $transactions = Transaction::where('status', '1')->paginate(2);
            return view('admin.transaction.inc.transaction', compact('transactions'))->render();
        }
    }

    function view_label(){
        return view('admin.transaction.label');
    }

    function view_label_transaction(Transaction $transaction){
        return view('admin.transaction.label', compact('transaction'));
    }
}
