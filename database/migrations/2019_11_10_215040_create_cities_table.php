<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

//////////////////////////////////////////////////////////////////
//  Name:   CreateCitiesTable - migration (class)
//
//  Author: Jefferson Rodrigues de Oliveira
//
//  Date:   27/10/2019
//
//  Description:
//    Columns(Name : description)
//      id_CIT(PK) : id for table Cities, 
//      id_USU(FK) : user id who signed up,
//      id_REF(FK) : set state for citie,  
//      name_CIT   : citie name, 
//      extra_CST  : extra information
//
//  Extra specifications:
//    When you enter a new city, the system will automatically  
//    register a downtown neighborhood for it.
//
//////////////////////////////////////////////////////////////////
class CreateCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->increments('id');
           // $table->timestamps();
            $table->string('name',100);
            $table->string('extra',200);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cities');
    }
}
