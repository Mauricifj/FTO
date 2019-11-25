<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

//////////////////////////////////////////////////////////////////
//  Name:   CreateReportsTable - migration (class)
//
//  Author: Jefferson Rodrigues de Oliveira
//
//  Date:   27/10/2019
//
//  Description:
//    Columns(Name : description)
//      id_REP(PK) : id for table Reports, 
//      id_USU(FK) : user id who signed up,
//      desc_REP   : report description, 
//      data_REP   : report creation date,
//      id_REF(FK) : set report type,    
//      extra_REP  : extra information
//
//////////////////////////////////////////////////////////////////
class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->increments('id');
           // $table->timestamps();

            $table->string('description',100);
            $table->date('date');
            $table->string('extra',200)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reports');
    }
}
