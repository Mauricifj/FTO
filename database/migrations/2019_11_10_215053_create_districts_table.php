<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

//////////////////////////////////////////////////////////////////
//  Name:   CreateDistrictsTable - migration (class)
//
//  Author: Jefferson Rodrigues de Oliveira
//
//  Date:   27/10/2019
//
//  Description:
//    Columns(Name : description)
//      id_DIS(PK) : id for table Districts, 
//      id_USU(FK) : user id who signed up,
//      id_CIT(FK) : set citie for district, 
//      name_DIS   : district name, 
//      extra_DIS  : extra information
//
//  Extra specifications:
//    When you enter a new city, the system will automatically 
//    register adowntown district for it.
//
//////////////////////////////////////////////////////////////////
class CreateDistrictsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('districts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',100);
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
        Schema::dropIfExists('districts');
    }
}
