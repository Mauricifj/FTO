<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

//////////////////////////////////////////////////////////////////
//  Name:   CreateCustomersTable - migration (class)
//
//  Description:
//    Columns(Name  : description)
//      id_CST(PK)  : id for table Customer, 
//      id_USU(FK)  : user id who signed up,
//      name_CST    : customer name, 
//      sex_CST     : customer gender, 
//      birth_CST   : customer birth,
//      cpf_CST     : customer document, 
//      address_CST : customer address, 
//      num_CST     : customer address number, 
//      comp_CST    : customer address complement, 
//      cep_CST     : customer address cep, 
//      id_REF(FK)  : set state for customer,    
//      id_CIT(FK)  : set City for customer,
//      id_NGB(FK)  : set Neigh for customer, 
//      extra_CST   : extra information
//
//////////////////////////////////////////////////////////////////
class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
           // $table->timestamps();

            $table->string('name',100);
            $table->string('gender',1);
            $table->date('birthdate');
            $table->string('cpf',15)->unique();
              
            $table->string('address',100);
            $table->string('number',6);
            $table->string('complement',20)->nullable();
            $table->string('zipcode',8);
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
        Schema::dropIfExists('customers');
    }
}
