<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFksReceipts extends Migration
{
    public function up()
    {
        Schema::table('receipts', function (Blueprint $table) {
            $table->integer('id_user')->unsigned();
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');

            $table->integer('id_refference')->unsigned();
            $table->foreign('id_refference')->references('id')->on('refferences')->onDelete('cascade');

            $table->integer('id_supplier')->unsigned();
            $table->foreign('id_supplier')->references('id')->on('suppliers')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('receipts', function (Blueprint $table) {
            $table->dropForeign('id_user');
            $table->dropColumn('id_user');
          
            $table->dropForeign('id_refference');
            $table->dropColumn('id_refference');

            $table->dropForeign('id_supplier');
            $table->dropColumn('id_supplier');
        });
    }
}
