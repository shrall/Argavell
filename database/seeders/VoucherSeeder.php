<?php

namespace Database\Seeders;

use App\Models\Voucher;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class VoucherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $voucher = new Voucher();
        $voucher->title = 'Marshall';
        $voucher->code = 'Ovierdo';
        $voucher->expired_date = Carbon::now();
        $voucher->minimum_charge = 10000;
        $voucher->img = 'kleanse-hand-gel.jpg';
        $voucher->tnc = 'hayoloanjay';
        $voucher->save();
    }
}
