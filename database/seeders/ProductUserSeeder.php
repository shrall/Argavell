<?php

namespace Database\Seeders;

use App\Models\ProductUser;
use Illuminate\Database\Seeder;

class ProductUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $productuser = new ProductUser();
        $productuser->qty = 3;
        $productuser->price = 390000;
        $productuser->price_discount = 90000;
        $productuser->order_number = "INV20210606-1001";
        $productuser->product_id = 1;
        $productuser->user_id = 1;
        $productuser->save();
    }
}
