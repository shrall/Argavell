<?php

namespace App\Http\Controllers\Admin;

use App\Exports\ProductExport;
use App\Exports\TransactionExport;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Refund;
use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
use SnappyImage;

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
            $transactions_id = explode(",", $request->transaction_id[0]);
            foreach ($transactions_id as $transaction_id) {
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
        } else if ($request->input_method == 'send') {
            foreach ($request->transaction_id as $transaction_id) {
                $transaction = Transaction::where('id', $transaction_id)->first();
                $transaction->update([
                    'status' => '3',
                    'nomor_resi' => $request->resi
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
        $refunds = Refund::paginate(2);
        return view('admin.transaction.inc.refund', compact('refunds'))->render();
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
        } else if ($request->has('sort')) {
            if ($request->sort == 'latest') {
                $transactions = Transaction::whereHas('carts', function (Builder $query)  use ($request) {
                    $query->whereHas('product', function (Builder $query)  use ($request) {
                        $query->where('name', 'like', '%' . $request->data . '%');
                    });
                })->latest('created_at')->get();
            } else if ($request->sort == 'oldest') {
                $transactions = Transaction::whereHas('carts', function (Builder $query)  use ($request) {
                    $query->whereHas('product', function (Builder $query)  use ($request) {
                        $query->where('name', 'like', '%' . $request->data . '%');
                    });
                })->oldest('created_at')->get();
            }
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
        } else if ($request->has('sort')) {
            if ($request->sort == 'latest') {
                $transactions = Transaction::where('status', '4')->whereHas('carts', function (Builder $query)  use ($request) {
                    $query->whereHas('product', function (Builder $query)  use ($request) {
                        $query->where('name', 'like', '%' . $request->data . '%');
                    });
                })->latest('created_at')->get();
            } else if ($request->sort == 'oldest') {
                $transactions = Transaction::where('status', '4')->whereHas('carts', function (Builder $query)  use ($request) {
                    $query->whereHas('product', function (Builder $query)  use ($request) {
                        $query->where('name', 'like', '%' . $request->data . '%');
                    });
                })->oldest('created_at')->get();
            }
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
        } else if ($request->has('sort')) {
            if ($request->sort == 'latest') {
                $transactions = Transaction::where('status', '5')->whereHas('carts', function (Builder $query)  use ($request) {
                    $query->whereHas('product', function (Builder $query)  use ($request) {
                        $query->where('name', 'like', '%' . $request->data . '%');
                    });
                })->latest('created_at')->get();
            } else if ($request->sort == 'oldest') {
                $transactions = Transaction::where('status', '5')->whereHas('carts', function (Builder $query)  use ($request) {
                    $query->whereHas('product', function (Builder $query)  use ($request) {
                        $query->where('name', 'like', '%' . $request->data . '%');
                    });
                })->oldest('created_at')->get();
            }
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
        } else if ($request->has('sort')) {
            if ($request->sort == 'latest') {
                $transactions = Transaction::where('status', '3')->whereHas('carts', function (Builder $query)  use ($request) {
                    $query->whereHas('product', function (Builder $query)  use ($request) {
                        $query->where('name', 'like', '%' . $request->data . '%');
                    });
                })->latest('created_at')->get();
            } else if ($request->sort == 'oldest') {
                $transactions = Transaction::where('status', '3')->whereHas('carts', function (Builder $query)  use ($request) {
                    $query->whereHas('product', function (Builder $query)  use ($request) {
                        $query->where('name', 'like', '%' . $request->data . '%');
                    });
                })->oldest('created_at')->get();
            }
        } else {
            $transactions = Transaction::where('status', '3')->where('created_at', '>=', $request->start)->where('created_at', '<=', $request->end)->get();
        }
        return view('admin.transaction.inc.transaction', compact('transactions'));
    }

    function fetch_data_complain_search(Request $request)
    {
        if ($request->has('data')) {
            $refunds = Refund::whereHas('transaction', function (Builder $query)  use ($request) {
                $query->whereHas('carts', function (Builder $query)  use ($request) {
                    $query->whereHas('product', function (Builder $query)  use ($request) {
                        $query->where('name', 'like', '%' . $request->data . '%');
                    });
                });
            })->get();
        } else if ($request->has('sort')) {
            if ($request->sort == 'latest') {
                $refunds = Refund::whereHas('transaction', function (Builder $query)  use ($request) {
                    $query->whereHas('carts', function (Builder $query)  use ($request) {
                        $query->whereHas('product', function (Builder $query)  use ($request) {
                            $query->where('name', 'like', '%' . $request->data . '%');
                        });
                    });
                })->latest('created_at')->get();
            } else if ($request->sort == 'oldest') {
                $refunds = Refund::whereHas('transaction', function (Builder $query)  use ($request) {
                    $query->whereHas('carts', function (Builder $query)  use ($request) {
                        $query->whereHas('product', function (Builder $query)  use ($request) {
                            $query->where('name', 'like', '%' . $request->data . '%');
                        });
                    });
                })->oldest('created_at')->get();
            }
        } else {
            $refunds = Refund::where('created_at', '>=', $request->start)->where('created_at', '<=', $request->end)->get();
        }
        return view('admin.transaction.inc.refund', compact('refunds'))->render();
    }

    function fetch_data_canceled_search(Request $request)
    {
        if ($request->has('data')) {
            $transactions = Transaction::where('status', '2')->whereHas('carts', function (Builder $query)  use ($request) {
                $query->whereHas('product', function (Builder $query)  use ($request) {
                    $query->where('name', 'like', '%' . $request->data . '%');
                });
            })->get();
        } else if ($request->has('sort')) {
            if ($request->sort == 'latest') {
                $transactions = Transaction::where('status', '2')->whereHas('carts', function (Builder $query)  use ($request) {
                    $query->whereHas('product', function (Builder $query)  use ($request) {
                        $query->where('name', 'like', '%' . $request->data . '%');
                    });
                })->latest('created_at')->get();
            } else if ($request->sort == 'oldest') {
                $transactions = Transaction::where('status', '2')->whereHas('carts', function (Builder $query)  use ($request) {
                    $query->whereHas('product', function (Builder $query)  use ($request) {
                        $query->where('name', 'like', '%' . $request->data . '%');
                    });
                })->oldest('created_at')->get();
            }
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
        } else if ($request->has('sort')) {
            if ($request->sort == 'latest') {
                $transactions = Transaction::where('status', '1')->whereHas('carts', function (Builder $query)  use ($request) {
                    $query->whereHas('product', function (Builder $query)  use ($request) {
                        $query->where('name', 'like', '%' . $request->data . '%');
                    });
                })->latest('created_at')->get();
            } else if ($request->sort == 'oldest') {
                $transactions = Transaction::where('status', '1')->whereHas('carts', function (Builder $query)  use ($request) {
                    $query->whereHas('product', function (Builder $query)  use ($request) {
                        $query->where('name', 'like', '%' . $request->data . '%');
                    });
                })->oldest('created_at')->get();
            }
        } else {
            $transactions = Transaction::where('status', '1')->where('created_at', '>=', $request->start)->where('created_at', '<=', $request->end)->get();
        }
        return view('admin.transaction.inc.transaction', compact('transactions'));
    }

    function view_label_transaction(Request $request)
    {
        $transactions = Transaction::whereIn('id', $request->transaction_label)->get();
        return view('admin.transaction.create_label', compact('transactions'));
    }

    function download_label_transaction(Request $request)
    {
        $transactions_label = explode(",", $request->transaction_label[0]);
        $transactions = Transaction::whereIn('id', $transactions_label)->get();
        if ($request->checkbox_cetak == 'on') {
            foreach ($transactions as $transaction) {
                $transaction->update([
                    'is_cetak' => '1'
                ]);
            }
        }
        $pdf = PDF::loadview('admin.transaction.label', ['transactions' => $transactions])
            ->setOption('page-width', 200)
            ->setOption('page-height', 180);
        return $pdf->download('label-' . Carbon::now() . '.pdf');
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

    function export(Request $request)
    {
        return Excel::download(new TransactionExport($request->type, $request->report_date_start, $request->report_date_end), 'laporan_penjualan_' . Carbon::now() . '.xlsx');
    }

    function download_product_list(Request $request){
        $products = array();
        $transaction_ids = explode(",", $request->transactions[0]);
        $transactions = Transaction::whereIn('id', $transaction_ids)->get();
        foreach ($transactions as $transaction){
            foreach($transaction->carts as $cart){
                if($cart->transaction_id){
                    array_push($products, $cart->product_id);
                }
            }
        }
        return Excel::download(new ProductExport(array_unique($products, SORT_REGULAR)), 'daftar_produk_' . Carbon::now() . '.xlsx');
    }

    function refresh_transaction_list_on_accept_modal(Request $request)
    {
        $transactions = Transaction::whereIn('id', $request->data)->get();
        return view('admin.transaction.inc.transaction_accept_modal', compact('transactions'));
    }
}
