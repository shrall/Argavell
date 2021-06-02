<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToTransactions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->unsignedBigInteger('payment_id')->index()->after('date');
            $table->foreign('payment_id')->references('id')->on('payments');
            $table->unsignedBigInteger('shipment_id')->index()->after('payment_id');
            $table->foreign('shipment_id')->references('id')->on('shipments');
            $table->unsignedBigInteger('product_users_id')->index()->after('shipment_id');
            $table->foreign('product_users_id')->references('id')->on('product_users');
            $table->unsignedBigInteger('address_id')->index()->after('product_users_id');
            $table->foreign('address_id')->references('id')->on('addresses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('transactions', function (Blueprint $table) {
            //
        });
    }
}
