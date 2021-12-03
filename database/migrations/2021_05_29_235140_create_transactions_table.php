<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->enum('status', ['0', '1', '2', '3', '4', '5'])
                ->default('0')
                ->comment('0 = Waiting Payment Confirmation, 1 = Shipped, 2 = Canceled, 3 = On Delivery, 4 = Paid, 5 = Confirmed');
            $table->string('order_number')->unique();
            $table->date('date');
            $table->string('shipment_name');
            $table->integer('shipment_etd');
            $table->integer('shipping_cost');
            $table->integer('price_total');
            $table->integer('qty_total');
            $table->integer('weight_total')->comment('gram');
            $table->enum('is_cetak', ['0', '1'])
                ->default('0')
                ->comment('0 = No, 1 = Yes');
            $table->string('nomor_resi')->nullable();
            $table->string('notes')->nullable();
            $table->string('snaptoken')->nullable();
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
        Schema::dropIfExists('transactions');
    }
}
