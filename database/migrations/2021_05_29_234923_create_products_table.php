<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->integer('price');
            $table->integer('price_discount')->nullable();
            $table->text('description');
            $table->json('size');
            $table->json('facts');
            $table->json('howtouse');
            $table->text('ingredients');
            $table->text('img');
            $table->enum('type', ['0','1',])
            ->default('0')
            ->comment('0 = Argavell, 1 = Kleanse');
            $table->enum('bundle', ['0','1',])
            ->default('0')
            ->comment('0 = No, 1 = Yes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
