<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Database\Eloquent\Builder;
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
        $this->check_response_limit();
        $this->check_shipping_etd();
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

    function fetch_data_all()
    {
        $transactions = Transaction::paginate(2);
        return view('admin.transaction.inc.transaction', compact('transactions'))->render();
    }

    function fetch_data_new()
    {
        $transactions = Transaction::where('status', '4')->paginate(2);
        return view('admin.transaction.inc.transaction', compact('transactions'))->render();
    }

    function fetch_data_ready()
    {
        $transactions = Transaction::where('status', '5')->paginate(2);
        return view('admin.transaction.inc.transaction', compact('transactions'))->render();
    }

    function fetch_data_ondelivery()
    {
        $transactions = Transaction::where('status', '3')->paginate(2);
        return view('admin.transaction.inc.transaction', compact('transactions'))->render();
    }

    function fetch_data_complain()
    {
        //belum
        $transactions = Transaction::paginate(2);
        return view('admin.transaction.inc.transaction', compact('transactions'))->render();
    }
    function fetch_data_canceled()
    {
        $transactions = Transaction::where('status', '2')->paginate(2);
        return view('admin.transaction.inc.transaction', compact('transactions'))->render();
    }

    function fetch_data_delivered()
    {
        $transactions = Transaction::where('status', '1')->paginate(2);
        return view('admin.transaction.inc.transaction', compact('transactions'))->render();
    }
    function fetch_data_all_search(Request $request)
    {
        if ($request->has('data')) {
            $transactions = Transaction::whereHas('carts', function (Builder $query)  use ($request) {
                $query->whereHas('product', function (Builder $query)  use ($request) {
                    $query->where('name', 'like', '%' . $request->data . '%');
                });
            })->get();
        } else {
            $transactions = Transaction::where('created_at', '>=', $request->start)->where('created_at', '<=', $request->end)->get();
        }
        return view('admin.transaction.inc.transaction', compact('transactions'));
    }

    function fetch_data_new_search(Request $request)
    {
        if ($request->has('data')) {
            $transactions = Transaction::where('status', '4')->whereHas('carts', function (Builder $query)  use ($request) {
                $query->whereHas('product', function (Builder $query)  use ($request) {
                    $query->where('name', 'like', '%' . $request->data . '%');
                });
            })->get();
        } else {
            $transactions = Transaction::where('status', '4')->where('created_at', '>=', $request->start)->where('created_at', '<=', $request->end)->get();
        }
        return view('admin.transaction.inc.transaction', compact('transactions'));
    }

    function fetch_data_ready_search(Request $request)
    {
        if ($request->has('data')) {
            $transactions = Transaction::where('status', '5')->whereHas('carts', function (Builder $query)  use ($request) {
                $query->whereHas('product', function (Builder $query)  use ($request) {
                    $query->where('name', 'like', '%' . $request->data . '%');
                });
            })->get();
        } else {
            $transactions = Transaction::where('status', '5')->where('created_at', '>=', $request->start)->where('created_at', '<=', $request->end)->get();
        }
        return view('admin.transaction.inc.transaction', compact('transactions'));
    }

    function fetch_data_ondelivery_search(Request $request)
    {
        if ($request->has('data')) {
            $transactions = Transaction::where('status', '3')->whereHas('carts', function (Builder $query)  use ($request) {
                $query->whereHas('product', function (Builder $query)  use ($request) {
                    $query->where('name', 'like', '%' . $request->data . '%');
                });
            })->get();
        } else {
            $transactions = Transaction::where('status', '3')->where('created_at', '>=', $request->start)->where('created_at', '<=', $request->end)->get();
        }
        return view('admin.transaction.inc.transaction', compact('transactions'));
    }

    function fetch_data_complain_search(Request $request)
    {
        //belum
    }

    function fetch_data_canceled_search(Request $request)
    {
        if ($request->has('data')) {
            $transactions = Transaction::where('status', '2')->whereHas('carts', function (Builder $query)  use ($request) {
                $query->whereHas('product', function (Builder $query)  use ($request) {
                    $query->where('name', 'like', '%' . $request->data . '%');
                });
            })->get();
        } else {
            $transactions = Transaction::where('status', '2')->where('created_at', '>=', $request->start)->where('created_at', '<=', $request->end)->get();
        }
        return view('admin.transaction.inc.transaction', compact('transactions'));
    }

    function fetch_data_delivered_search(Request $request)
    {
        if ($request->has('data')) {
            $transactions = Transaction::where('status', '1')->whereHas('carts', function (Builder $query)  use ($request) {
                $query->whereHas('product', function (Builder $query)  use ($request) {
                    $query->where('name', 'like', '%' . $request->data . '%');
                });
            })->get();
        } else {
            $transactions = Transaction::where('status', '1')->where('created_at', '>=', $request->start)->where('created_at', '<=', $request->end)->get();
        }
        return view('admin.transaction.inc.transaction', compact('transactions'));
    }

    function view_label()
    {
        return view('admin.transaction.label');
    }

    function view_label_transaction(Transaction $transaction)
    {
        return view('admin.transaction.label', compact('transaction'));
    }

    function check_response_limit()
    {
        $transactions = Transaction::all();
        foreach ($transactions as $transaction) {
            if ((strtotime($transaction->created_at . ' +1 day') - strtotime(\Carbon\Carbon::now())) < 0 && $transaction->status == '4') {
                $transaction->update([
                    'status' => '2'
                ]);
            }
        }
    }

    function check_shipping_etd()
    {
        $transactions = Transaction::all();
        foreach ($transactions as $transaction) {
            if ((strtotime($transaction->created_at . ' +' . $transaction->shipment_etd . ' day') - strtotime(\Carbon\Carbon::now())) < 0 && $transaction->status == '3') {
                $transaction->update([
                    'status' => '1'
                ]);
            }
        }
    }
}
