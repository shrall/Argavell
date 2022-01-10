<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRefundsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('refunds', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone');
            $table->enum('occasion', ['0','1', '2'])
            ->default('0')
            ->comment('0 = Full Refund, 1 = Item Replacement, 2 = Item Trade');
            $table->enum('status', ['0','1','2'])
            ->default('0')
            ->comment('0 = Pending, 1 = Accepted, 2 = Rejected');
            $table->text('condition');
            $table->text('notes')->nullable();
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
        Schema::dropIfExists('refunds');
    }
}
