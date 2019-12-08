<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProductReceiptTable extends Migration
{
    public function up()
    {
        Schema::create('product_receipt', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('id_product')->unsigned();
            $table->integer('id_receipt')->unsigned();

            $table->foreign('id_product')->references('id')->on('products');
            $table->foreign('id_receipt')->references('id')->on('receipts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_receipt');
    }
}
