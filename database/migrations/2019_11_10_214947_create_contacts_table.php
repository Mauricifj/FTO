<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

//////////////////////////////////////////////////////////////////
//  Name:   CreateContactsTable - migration (class)
//
//  Description:
//    Columns(Name : description)
//      id_CON(PK) : id for table Contacts, 
//      id_USU(FK) : user id who signed up,
//      desc_CON   : contact description, 
//      extra_CON  : extra information,
//      id_REF(FK) : set Contact type(tel, e-mail, etc),  
//      id_CST(FK) : set contact custommer, (id_CST or id_SUP)
//      id_SUP(FK) : set contact supplier
//
//////////////////////////////////////////////////////////////////
class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->increments('id');
            // $table->timestamps();
    
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
        Schema::dropIfExists('contacts');
    }
}
