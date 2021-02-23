<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
//            Notes

            $table->id();
            $table->foreignId('vendor_id');
            $table->foreignId('product_id');
            $table->string('quantity');
            $table->string('amount');
            $table->string('unit_price');
            $table->string('payed_by');
            $table->string('purchase_receipt');
            $table->string('attachment')->nullable();
            $table->string('notes');
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
        Schema::dropIfExists('purchases');
    }
}
