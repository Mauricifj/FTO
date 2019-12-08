<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFksDistricts extends Migration
{
    public function up()
    {
        Schema::table('districts', function (Blueprint $table) {

            $table->integer('id_user')->unsigned();
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
         
            $table->integer('id_city')->unsigned();
            $table->foreign('id_city')->references('id')->on('cities')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('districts', function (Blueprint $table) {
            $table->dropForeign('id_user');
            $table->dropColumn('id_user');
          
            $table->dropForeign('id_city');
            $table->dropColumn('id_city');
        });
    }
}
