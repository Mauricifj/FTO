<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

//////////////////////////////////////////////////////////////////
//  Name:   AddFksSales - migration (class)
//
//  Author: Jefferson Rodrigues de Oliveira
//
//  Date:   10/11/2019
//
//  Description:
//    Columns(Name : description)
//      id_USU(FK) : user id who signed up,
//      id_REF(FK) : set sale payment form,
//      id_CST(FK) : set sale customer
//
//////////////////////////////////////////////////////////////////
class AddFksSales extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sales', function (Blueprint $table) {
            $table->integer('id_user')->unsigned();
            $table->foreign('id_user')->references('id')->on('users');

            $table->integer('id_refference')->unsigned();
            $table->foreign('id_refference')->references('id')->on('refferences');

            $table->integer('id_customer')->unsigned();
            $table->foreign('id_customer')->references('id')->on('customers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sales', function (Blueprint $table) {
            $table->dropForeign('id_USU');
            $table->dropColumn('id_USU');  
          
            $table->dropForeign('id_REF');
            $table->dropColumn('id_REF');

            $table->dropForeign('id_CST');
            $table->dropColumn('id_CST');  
        });
    }
}
