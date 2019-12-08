<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProductSaleTable extends Migration
{
    public function up()
    {
        Schema::create('product_sale', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('id_product')->unsigned();
            $table->integer('id_sale')->unsigned();

            $table->foreign('id_product')->references('id')->on('products');
            $table->foreign('id_sale')->references('id')->on('sales');
        });
    }

    public function down()
    {
        Schema::dropIfExists('product_sale');
    }
}
