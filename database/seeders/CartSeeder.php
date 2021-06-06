<?php

namespace Database\Seeders;

use App\Models\Cart;
use Illuminate\Database\Seeder;

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cart = new Cart();
        $cart->qty = 3;
        $cart->price = 390000;
        $cart->price_discount = 90000;
        $cart->product_id = 1;
        $cart->user_id = 1;
        $cart->transaction_id = 1;
        $cart->save();

        $cart = new Cart();
        $cart->qty = 2;
        $cart->price = 260000;
        $cart->product_id = 2;
        $cart->user_id = 1;
        $cart->transaction_id = 1;
        $cart->save();

        $cart = new Cart();
        $cart->qty = 1;
        $cart->price = 130000;
        $cart->product_id = 2;
        $cart->user_id = 1;
        $cart->transaction_id = 2;
        $cart->save();

        $cart = new Cart();
        $cart->qty = 1;
        $cart->price = 130000;
        $cart->product_id = 4;
        $cart->user_id = 1;
        $cart->transaction_id = 3;
        $cart->save();

        $cart = new Cart();
        $cart->qty = 1;
        $cart->price = 130000;
        $cart->product_id = 4;
        $cart->user_id = 1;
        $cart->transaction_id = 4;
        $cart->save();
    }
}
