<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

//////////////////////////////////////////////////////////////////
//  Name:   CreateSalesTable - migration (class)
//
//  Author: Jefferson Rodrigues de Oliveira
//
//  Date:   27/10/2019
//
//  Description:
//    Columns(Name : description)
//      id_SAL(PK) : id for table Sales, 
//      id_USU(FK) : user id who signed up,
//      date_SAL   : sale date,
//      hour_SAL   : sale hour,
//      id_CST     : sale customer,
//      invo_SAL   : sale invoice,
//      desc_SAL   : sale description, 
//      type_SAL   : sale type (sale or budget),
//      situa_SAL  : sale situation,
//      id_REF(FK) : set form for payment for sale, 
//      datef_SAL  : sale finalization date, 
//      hourf_SAL  : sale finalization hour,
//      disco_SAL  : discount amount,
//      total_SAl  : total sale
//
//////////////////////////////////////////////////////////////////
class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->increments('id');
           // $table->timestamps();
        
            $table->string('description',100);
            $table->string('invoice',20);
            $table->string('condition',100);
            $table->string('type',20);

            $table->date('date');
            $table->time('hour');
            $table->date('end_date');
            $table->time('end_hour');

            $table->float('amount',2);
            $table->float('discount',2);
            $table->float('total',2);
         
            $table->string('situation',20);
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
        Schema::dropIfExists('sales');
    }
}
