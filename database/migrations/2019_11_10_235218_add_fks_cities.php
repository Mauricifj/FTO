<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

//////////////////////////////////////////////////////////////////
//  Name:   AddFksCities - migration (class)
//
//  Author: Jefferson Rodrigues de Oliveira
//
//  Date:   10/11/2019
//
//  Description:
//    Columns(Name : description)
//      id_USU(FK) : user id who signed up,
//      id_REF(FK) : set state (Federative Unit) for citie
//
//////////////////////////////////////////////////////////////////
class AddFksCities extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cities', function (Blueprint $table) {

            $table->integer('id_user')->unsigned();
            $table->foreign('id_user')->references('id')->on('users');
         
            $table->integer('id_refference')->unsigned();
            $table->foreign('id_refference')->references('id')->on('refferences');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cities', function (Blueprint $table) {
            $table->dropForeign('id_USU');
            $table->dropColumn('id_USU');  
          
            $table->dropForeign('id_REF');
            $table->dropColumn('id_REF');
        });
    }
}
