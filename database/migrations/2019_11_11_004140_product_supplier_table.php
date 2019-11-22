<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

//////////////////////////////////////////////////////////////////
//  Name:   ProductSupplierTable (Catalog) - migration (class)
//
//  Author: Jefferson Rodrigues de Oliveira
//
//  Date:   10/11/2019
//
//  Description:
//    Columns(Name    : description)
//      id_PROSAL(PK) : id for resolution table ProductSupplier, 
//      id_SUP(FK)    : set supplier to which the items belong,
//      id_PRO(FK)    : set catalog products
//
//////////////////////////////////////////////////////////////////
class ProductSupplierTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
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

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_supplier');
    }
}
