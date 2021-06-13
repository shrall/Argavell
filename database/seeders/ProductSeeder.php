<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = new Product();
        $product->name = "Argan Oil";
        $product->slug = "argan-oil";
        $product->price = 130000;
        $product->price_discount = 30000;
        $product->description = "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.";
        $product->size = [10, 20, 30];
        $product->facts = ["Suitable for Sensitive Skin", "Dermatologist Tested", "Non-Comedogenic Certified"];
        $product->howtouse = ["Suitable for Sensitive Skin", "Dermatologist Tested", "Non-Comedogenic Certified"];
        $product->ingredients = "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.";
        $product->img = 'argan-oil.jpg';
        $product->type = '0';
        $product->bundle = '0';
        $product->save();

        $product = new Product();
        $product->name = "Argan Shampoo";
        $product->slug = "argan-shampoo";
        $product->price = 130000;
        $product->description = "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.";
        $product->size = [300];
        $product->facts = ["Suitable for Sensitive Skin", "Dermatologist Tested", "Non-Comedogenic Certified"];
        $product->howtouse = ["Suitable for Sensitive Skin", "Dermatologist Tested", "Non-Comedogenic Certified"];
        $product->ingredients = "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.";
        $product->img = 'argan-oil-shampoo.jpg';
        $product->type = '0';
        $product->bundle = '0';
        $product->save();

        $product = new Product();
        $product->name = "Argan Oil + Argan Shampoo";
        $product->slug = "argan-oil-+-argan-shampoo";
        $product->price = 230000;
        $product->price_discount = 30000;
        $product->description = "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.";
        $product->size = [10, 20, 30];
        $product->facts = ["Suitable for Sensitive Skin", "Dermatologist Tested", "Non-Comedogenic Certified"];
        $product->howtouse = ["Suitable for Sensitive Skin", "Dermatologist Tested", "Non-Comedogenic Certified"];
        $product->ingredients = "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.";
        $product->img = 'argan-oil-argan-shampoo.jpg';
        $product->type = '0';
        $product->bundle = '1';
        $product->save();

        $product = new Product();
        $product->name = "Kleanse Hand Gel";
        $product->slug = "kleanse-hand-gel";
        $product->price = 130000;
        $product->description = "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.";
        $product->size = [300, 400];
        $product->facts = ["Suitable for Sensitive Skin", "Dermatologist Tested", "Non-Comedogenic Certified"];
        $product->howtouse = ["Suitable for Sensitive Skin", "Dermatologist Tested", "Non-Comedogenic Certified"];
        $product->ingredients = "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.";
        $product->img = 'kleanse-hand-gel.jpg';
        $product->type = '1';
        $product->bundle = '0';
        $product->save();

        $product = new Product();
        $product->name = "Kleanse Hand Gel + Kleanse Antiseptic Handwash";
        $product->slug = "kleanse-hand-gel-+-kleanse-antiseptic-handwash";
        $product->price = 260000;
        $product->price_discount = 70000;
        $product->description = "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.";
        $product->size = [300, 400];
        $product->facts = ["Suitable for Sensitive Skin", "Dermatologist Tested", "Non-Comedogenic Certified"];
        $product->howtouse = ["Suitable for Sensitive Skin", "Dermatologist Tested", "Non-Comedogenic Certified"];
        $product->ingredients = "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.";
        $product->img = 'kleanse-antiseptic-handwash.jpg';
        $product->type = '1';
        $product->bundle = '1';
        $product->save();
    }
}
