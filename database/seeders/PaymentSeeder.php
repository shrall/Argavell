<?php

namespace Database\Seeders;

use App\Models\Payment;
use Illuminate\Database\Seeder;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $payment = new Payment();
        $payment->name = "Transfer BCA";
        $payment->account_number = 130000789;
        $payment->howto = ["BCA Lorem Ipsum", "Dolor Sit", "Amet"];
        $payment->save();

        $payment = new Payment();
        $payment->name = "Transfer Mandiri";
        $payment->account_number = 8785485289;
        $payment->howto = ["Mandiri Lorem Ipsum", "Dolor Sit", "Amet"];
        $payment->save();
    }
}
