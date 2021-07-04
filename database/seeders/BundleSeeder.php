<?php

namespace Database\Seeders;

use App\Models\Bundle;
use Illuminate\Database\Seeder;

class BundleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bundle = new Bundle();
        $bundle->bundle_id = 3;
        $bundle->product_id = 1;
        $bundle->save();

        $bundle = new Bundle();
        $bundle->bundle_id = 3;
        $bundle->product_id = 2;
        $bundle->save();

        $bundle = new Bundle();
        $bundle->bundle_id = 6;
        $bundle->product_id = 4;
        $bundle->save();

        $bundle = new Bundle();
        $bundle->bundle_id = 6;
        $bundle->product_id = 5;
        $bundle->save();
    }
}
