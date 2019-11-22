<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

//////////////////////////////////////////////////////////////////
//  Name:   CreateSuppliersTable - migration (class)
//
//  Author: Jefferson Rodrigues de Oliveira
//
//  Date:   27/10/2019
//
//  Description:
//    Columns(Name  : description)
//      id_SUP(PK)  : id for table Supplier, 
//      id_USU(FK) : user id who signed up,
//      cpname_SUP  : supplier company name, 
//      ftname_SUP  : supplier fantasy name,
//      cnpj_SUP    : supplier document, 
//      address_SUP : customer address, 
//      num_SUP     : supplier address number, 
//      comp_SUP    : supplier address complement, 
//      cep_SUP     : customer address cep, 
//      id_REF(FK)  : set state for supplier,    
//      id_CIT(FK)  : set City for supplier,
//      id_NGB(FK)  : set Neigh for supplier, 
//      extra_SUP   : extra information
//
//////////////////////////////////////////////////////////////////
class CreateSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->increments('id');
           // $table->timestamps();
           
            $table->string('fantasy_name',100);
            $table->string('company_name',100);
            $table->string('cnpj',14)->unique();
            $table->string('address',100);
            $table->string('number',6);
            $table->string('complement',20);
            $table->string('zipcode',8);
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
        Schema::dropIfExists('suppliers');
    }
}
