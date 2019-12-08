<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProductSupplierTable extends Migration
{
    public function up()
    {
        Schema::create('product_supplier', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('id_product')->unsigned();
            $table->integer('id_supplier')->unsigned();

            $table->foreign('id_product')->references('id')->on('products');
            $table->foreign('id_supplier')->references('id')->on('suppliers');
        });
    }

    public function down()
    {
        Schema::dropIfExists('product_supplier');
    }
}
