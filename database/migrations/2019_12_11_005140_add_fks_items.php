<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFksItems extends Migration
{
    public function up()
    {
        Schema::table('items', function (Blueprint $table) {
            $table->integer('id_sale')->unsigned()->nullable();
            $table->foreign('id_sale')->references('id')->on('sales')->onDelete('cascade');

            $table->integer('id_receipt')->unsigned()->nullable();
            $table->foreign('id_receipt')->references('id')->on('receipts')->onDelete('cascade');

            $table->integer('id_product')->unsigned();
            $table->foreign('id_product')->references('id')->on('products')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('items', function (Blueprint $table) {
            $table->dropForeign('id_sale');
            $table->dropColumn('id_sale');

            $table->dropForeign('id_receipt');
            $table->dropColumn('id_receipt');

            $table->dropForeign('id_product');
            $table->dropColumn('id_product');
        });
    }
}
