<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

//////////////////////////////////////////////////////////////////
//  Name:   ProductReceitpTable (Receipt Items)- migration (class)
//
//  Author: Jefferson Rodrigues de Oliveira
//
//  Date:   10/11/2019
//
//  Description:
//    Columns(Name     : description)
//      id_RECITEM(PK) : id for resolution table ProductReceipt, 
//      id_REC(FK)     : set receipt to which the items belong,
//      id_PRO(FK)     : set receipt items
//
//////////////////////////////////////////////////////////////////
class ProductReceiptTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
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
