<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

//////////////////////////////////////////////////////////////////
//  Name:   AddFksCustomers - migration (class)
//
//  Author: Jefferson Rodrigues de Oliveira
//
//  Date:   10/11/2019
//
//  Description:
//    Columns(Name : description)
//      id_USU(FK) : user id who signed up,
//      id_REF(FK) : set state (Federative Unit) for customer,
//      id_CIT(FK) : set city for customer,
//      id_DIS(FK) : set district for customer
//
//
//////////////////////////////////////////////////////////////////
class AddFksCustomers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('customers', function (Blueprint $table) {
            $table->integer('id_user')->unsigned();
            $table->foreign('id_user')->references('id')->on('users');

            $table->integer('id_refference')->unsigned();
            $table->foreign('id_refference')->references('id')->on('refferences');

            $table->integer('id_city')->unsigned();
            $table->foreign('id_city')->references('id')->on('cities');
        
            $table->integer('id_district')->unsigned();
            $table->foreign('id_district')->references('id')->on('districts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('customers', function (Blueprint $table) {
            $table->dropForeign('id_USU');
            $table->dropColumn('id_USU');  
          
            $table->dropForeign('id_REF');
            $table->dropColumn('id_REF');

            $table->dropForeign('id_CIT');
            $table->dropColumn('id_CIT');  
          
            $table->dropForeign('id_DIS');
            $table->dropColumn('id_DIS');            
        });
    }
}
