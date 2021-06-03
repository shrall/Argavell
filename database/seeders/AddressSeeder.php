<?php

namespace Database\Seeders;

use App\Models\Address;
use Illuminate\Database\Seeder;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $address = new Address();
        $address->first_name = 'Marshall';
        $address->last_name = 'Ovierdo';
        $address->phone = '08123456789';
        $address->address = 'Jl. Tidar 117';
        $address->address_type = 'Home';
        $address->city = 'Surabaya';
        $address->province = 'Jawa Timur';
        $address->postal_code = '60252';
        $address->user_id = 1;
        $address->save();
    }
}
