<?php

namespace Database\Seeders;

use App\Models\Reseller;
use Illuminate\Database\Seeder;

class ResellerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $reseller = new Reseller();
        $reseller->name = 'Travitopia Beauty';
        $reseller->city = 'Jakarta';
        $reseller->line = 'travitopiabeauty';
        $reseller->whatsapp = '087878078800';
        $reseller->save();

        $reseller = new Reseller();
        $reseller->name = 'The Coco Shop';
        $reseller->city = 'Jakarta';
        $reseller->line = 'thecoco_shop';
        $reseller->whatsapp = null;
        $reseller->save();

        $reseller = new Reseller();
        $reseller->name = 'San Wijaya';
        $reseller->city = 'Medan';
        $reseller->line = 'sannwijaya88';
        $reseller->whatsapp = '08196021144';
        $reseller->save();

        $reseller = new Reseller();
        $reseller->name = 'The Coco Shop';
        $reseller->city = 'Medan';
        $reseller->line = 'thecoco_shop';
        $reseller->whatsapp = null;
        $reseller->save();

        $reseller = new Reseller();
        $reseller->name = 'Oil For Gewd';
        $reseller->city = 'Batam';
        $reseller->line = 'oilforgewd';
        $reseller->whatsapp = '0811696916';
        $reseller->save();

        $reseller = new Reseller();
        $reseller->name = 'Chichicz';
        $reseller->city = 'Makassar';
        $reseller->line = 'chichicz';
        $reseller->whatsapp = '08124127099';
        $reseller->save();
    }
}
