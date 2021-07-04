<?php

namespace Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Model::unguard();

        $this->call([
            PaymentSeeder::class,
            UserSeeder::class,
            ResellerSeeder::class,
            FaqSeeder::class,
            PolicySeeder::class,
            RefundSeeder::class,
            TncSeeder::class,
            ProofSeeder::class,
            AddressSeeder::class,
            ProductSeeder::class,
            TransactionSeeder::class,
            CartSeeder::class,
            BundleSeeder::class
        ]);

        Model::reguard();
    }
}
