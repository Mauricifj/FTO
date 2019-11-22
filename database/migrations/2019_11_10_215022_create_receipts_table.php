<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

//////////////////////////////////////////////////////////////////
//  Name:   CreateReceiptsTable - migration (class)
//
//  Author: Jefferson Rodrigues de Oliveira
//
//  Date:   27/10/2019
//
//  Description:
//    Columns(Name : description)
//      id_REC(PK) : id for table Receipts, 
//      id_USU(FK) : user id who signed up,
//      date_REC   : receipt date,
//      hour_REC   : receipt hour,
//      id_SUP     : receipt supplier,
//      invo_REC   : receipt invoice,
//      desc_REC   : receipt description, 
//      situa_REC  : receipt situation,
//      id_REF(FK) : set the payment method of the receipt, 
//      datef_REC  : receipt finalization date, 
//      hourf_REC  : receipt finalization hour,
//      disco_REC  : discount amount,
//      total_REC  : total receipt  
//      extra_REC  : extra information
//
//////////////////////////////////////////////////////////////////
class CreateReceiptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receipts', function (Blueprint $table) {
            $table->increments('id');
           // $table->timestamps();
           
          
            $table->string('description',100);
            $table->string('invoice',20);
            $table->string('cond_REC',100);

            $table->date('date');
            $table->time('hour');
            $table->date('end_date');
            $table->time('end_hour');

            $table->float('amount',2);
            $table->float('discount',2);
            $table->float('total',2);
         
            $table->string('situa_REC',6); 
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
        Schema::dropIfExists('receipts');
    }
}
