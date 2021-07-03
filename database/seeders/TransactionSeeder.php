<?php

namespace Database\Seeders;

use App\Models\Transaction;
use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $transaction = new Transaction();
        $transaction->status = '1';
        $transaction->order_number = 'INV20210606-1001';
        $transaction->date = '2021-06-06';
        $transaction->shipment_name = 'JNE';
        $transaction->shipping_cost = 13000;
        $transaction->price_total = 560000;
        $transaction->qty_total = 5;
        $transaction->payment_id = 1;
        $transaction->user_id = 1;
        $transaction->address_id = 1;
        $transaction->save();

        $transaction = new Transaction();
        $transaction->status = '2';
        $transaction->order_number = 'INV20210606-1002';
        $transaction->date = '2021-06-06';
        $transaction->shipment_name = 'SiCepat';
        $transaction->shipping_cost = 11000;
        $transaction->price_total = 130000;
        $transaction->qty_total = 1;
        $transaction->payment_id = 1;
        $transaction->user_id = 1;
        $transaction->address_id = 1;
        $transaction->save();

        $transaction = new Transaction();
        $transaction->status = '0';
        $transaction->order_number = 'INV20210606-1003';
        $transaction->date = '2021-06-06';
        $transaction->shipment_name = 'SiCepat';
        $transaction->shipping_cost = 11000;
        $transaction->price_total = 130000;
        $transaction->qty_total = 1;
        $transaction->payment_id = 1;
        $transaction->user_id = 1;
        $transaction->address_id = 1;
        $transaction->save();

        $transaction = new Transaction();
        $transaction->status = '3';
        $transaction->order_number = 'INV20210606-1004';
        $transaction->date = '2021-06-06';
        $transaction->shipment_name = 'SiCepat';
        $transaction->shipping_cost = 11000;
        $transaction->price_total = 130000;
        $transaction->qty_total = 1;
        $transaction->payment_id = 1;
        $transaction->user_id = 1;
        $transaction->address_id = 1;
        $transaction->save();

        $transaction = new Transaction();
        $transaction->status = '4';
        $transaction->order_number = 'INV20210606-1005';
        $transaction->date = '2021-06-06';
        $transaction->shipment_name = 'SiCepat';
        $transaction->shipping_cost = 11000;
        $transaction->price_total = 130000;
        $transaction->qty_total = 1;
        $transaction->payment_id = 1;
        $transaction->user_id = 1;
        $transaction->address_id = 1;
        $transaction->save();
    }
}
