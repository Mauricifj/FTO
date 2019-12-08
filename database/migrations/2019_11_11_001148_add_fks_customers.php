<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFksCustomers extends Migration
{
    public function up()
    {
        Schema::table('customers', function (Blueprint $table) {
            $table->integer('id_user')->unsigned();
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');

            $table->integer('id_refference')->unsigned();
            $table->foreign('id_refference')->references('id')->on('refferences')->onDelete('cascade');

            $table->integer('id_city')->unsigned();
            $table->foreign('id_city')->references('id')->on('cities')->onDelete('cascade');
        
            $table->integer('id_district')->unsigned();
            $table->foreign('id_district')->references('id')->on('districts')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('customers', function (Blueprint $table) {
            $table->dropForeign('id_user');
            $table->dropColumn('id_user');
          
            $table->dropForeign('id_refference');
            $table->dropColumn('id_refference');

            $table->dropForeign('id_city');
            $table->dropColumn('id_city');
          
            $table->dropForeign('id_district');
            $table->dropColumn('id_district');
        });
    }
}
