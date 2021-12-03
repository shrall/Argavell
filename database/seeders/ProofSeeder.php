<?php

namespace Database\Seeders;

use App\Models\Proof;
use Illuminate\Database\Seeder;

class ProofSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $proof = new Proof();
        $proof->order_number = '000000000000';
        $proof->name = 'Marshall Ovierdo';
        $proof->payment_file = '1622660051-icon.png';
        $proof->user_id = 1;
        $proof->transaction_id = 2;
        $proof->save();

        $proof = new Proof();
        $proof->order_number = '000000000000';
        $proof->name = 'Marshall Ovierdo';
        $proof->payment_file = '1622660051-icon.png';
        $proof->user_id = 1;
        $proof->transaction_id = 3;
        $proof->save();

        $proof = new Proof();
        $proof->order_number = '000000000000';
        $proof->name = 'Marshall Ovierdo';
        $proof->payment_file = '1622660051-icon.png';
        $proof->user_id = 1;
        $proof->transaction_id = 4;
        $proof->save();

        $proof = new Proof();
        $proof->order_number = '000000000000';
        $proof->name = 'Marshall Ovierdo';
        $proof->payment_file = '1622660051-icon.png';
        $proof->user_id = 1;
        $proof->transaction_id = 5;
        $proof->save();

        $proof = new Proof();
        $proof->order_number = '000000000000';
        $proof->name = 'Marshall Ovierdo';
        $proof->payment_file = '1622660051-icon.png';
        $proof->user_id = 1;
        $proof->transaction_id = 6;
        $proof->save();

        $proof = new Proof();
        $proof->order_number = '000000000000';
        $proof->name = 'Marshall Ovierdo';
        $proof->payment_file = '1622660051-icon.png';
        $proof->user_id = 1;
        $proof->transaction_id = 7;
        $proof->save();
    }
}
