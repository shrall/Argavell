<?php

namespace Database\Seeders;

use App\Models\Refund;
use Illuminate\Database\Seeder;

class RefundSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $refund = new Refund();
        $refund->name = 'Marshall Ovierdo';
        $refund->phone = '0';
        $refund->order_number = '000000000000';
        $refund->condition = '1622660051-icon.png';
        $refund->user_id = 1;
        $refund->save();
    }
}
