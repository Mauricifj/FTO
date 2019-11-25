<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

//////////////////////////////////////////////////////////////////
//  Name:   CreateRefferencesTable - migration (class)
//
//  Author: Jefferson Rodrigues de Oliveira
//
//  Date:   27/10/2019
//
//  Description:
//    Columns(Name : description)
//      id_REF(PK) : id for table Refferences, 
//      type_REF   : refferences type,
//      desc_REF   : refferences description, 
//      acro_REF   : refferences acronym,
//      extra_REF  : extra information
//
//////////////////////////////////////////////////////////////////
class CreateRefferencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('refferences', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('type', ['estado', 'forma_pagamento', 'forma_contato','forma_relatorio']);
            $table->string('description',100);
            $table->string('acronym',5);
            $table->string('extra',200)->nullable();
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('refferences');
    }
}
