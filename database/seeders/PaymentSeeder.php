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
        $payment->account_number = 8292791789;
        $payment->howto = ["BCA Lorem Ipsum", "Dolor Sit", "Amet"];
        $payment->save();

        $payment = new Payment();
        $payment->id = 1001;
        $payment->name = "Payment Online";
        $payment->account_number = 130000789;
        $payment->howto = ["BCA Lorem Ipsum", "Dolor Sit", "Amet"];
        $payment->save();
    }
}
