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
        $transaction->status = '0';
        $transaction->order_number = '0 = Waiting Payment Confirmation';
        $transaction->date = '2021-06-06';
        $transaction->shipment_name = 'JNE';
        $transaction->shipment_etd = 3;
        $transaction->shipping_cost = 13000;
        $transaction->price_total = 560000;
        $transaction->qty_total = 5;
        $transaction->payment_id = 1;
        $transaction->user_id = 1;
        $transaction->address_id = 1;
        $transaction->save();

        $transaction = new Transaction();
        $transaction->status = '1';
        $transaction->order_number = '1 = Shipped';
        $transaction->date = '2021-06-06';
        $transaction->shipment_name = 'SiCepat';
        $transaction->shipment_etd = 2;
        $transaction->shipping_cost = 11000;
        $transaction->price_total = 130000;
        $transaction->qty_total = 1;
        $transaction->nomor_resi = '01kd0k1002ke0';
        $transaction->payment_id = 1;
        $transaction->user_id = 1;
        $transaction->address_id = 1;
        $transaction->save();

        $transaction = new Transaction();
        $transaction->status = '2';
        $transaction->order_number = '2 = Canceled';
        $transaction->date = '2021-06-06';
        $transaction->shipment_name = 'SiCepat';
        $transaction->shipment_etd = 1;
        $transaction->shipping_cost = 11000;
        $transaction->price_total = 130000;
        $transaction->qty_total = 1;
        $transaction->payment_id = 1;
        $transaction->user_id = 1;
        $transaction->address_id = 1;
        $transaction->save();

        $transaction = new Transaction();
        $transaction->status = '3';
        $transaction->order_number = '3 = On Delivery';
        $transaction->date = '2021-06-06';
        $transaction->shipment_name = 'SiCepat';
        $transaction->shipment_etd = 1;
        $transaction->shipping_cost = 11000;
        $transaction->price_total = 130000;
        $transaction->qty_total = 1;
        $transaction->nomor_resi = '01kd0k1002ke0';
        $transaction->payment_id = 1;
        $transaction->user_id = 1;
        $transaction->address_id = 1;
        $transaction->save();

        $transaction = new Transaction();
        $transaction->status = '4';
        $transaction->order_number = '4 = Paid';
        $transaction->date = '2021-06-06';
        $transaction->shipment_name = 'SiCepat';
        $transaction->shipment_etd = 1;
        $transaction->shipping_cost = 11000;
        $transaction->price_total = 130000;
        $transaction->qty_total = 1;
        $transaction->payment_id = 1;
        $transaction->user_id = 1;
        $transaction->address_id = 1;
        $transaction->save();

        $transaction = new Transaction();
        $transaction->status = '5';
        $transaction->order_number = '5 = Confirmed';
        $transaction->date = '2021-06-06';
        $transaction->shipment_name = 'SiCepat';
        $transaction->shipment_etd = 3;
        $transaction->shipping_cost = 11000;
        $transaction->price_total = 130000;
        $transaction->qty_total = 1;
        $transaction->payment_id = 1;
        $transaction->user_id = 1;
        $transaction->address_id = 1;
        $transaction->save();

        $transaction = new Transaction();
        $transaction->status = '4';
        $transaction->order_number = '4 = Paid - Cetaked';
        $transaction->date = '2021-06-06';
        $transaction->shipment_name = 'SiCepat';
        $transaction->shipment_etd = 1;
        $transaction->shipping_cost = 11000;
        $transaction->price_total = 130000;
        $transaction->qty_total = 1;
        $transaction->payment_id = 1;
        $transaction->user_id = 1;
        $transaction->address_id = 1;
        $transaction->is_cetak = '1';
        $transaction->save();
    }
}
