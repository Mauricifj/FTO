<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

//////////////////////////////////////////////////////////////////
//  Name:   ProductSaleTable (Sale Items) - migration (class)
//
//  Author: Jefferson Rodrigues de Oliveira
//
//  Date:   10/11/2019
//
//  Description:
//    Columns(Name     : description)
//      id_SALITEM(PK) : id for resolution table ProductSale, 
//      id_SAL(FK)     : set sale to which the items belong,
//      id_PRO(FK)     : set sale items
//
//////////////////////////////////////////////////////////////////
class ProductSaleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
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

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_sale');
    }
}
