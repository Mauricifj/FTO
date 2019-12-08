<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReceiptsTable extends Migration
{
    public function up()
    {
        Schema::create('receipts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('description',100);
            $table->string('invoice',20);
            $table->string('cond_REC',100);

            $table->date('date');
            $table->time('hour');
            $table->date('end_date')->nullable();
            $table->time('end_hour')->nullable();

            $table->float('amount',2);
            $table->float('discount',2);
            $table->float('total',2);
         
            $table->string('situa_REC',6); 
            $table->string('extra',200)->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('receipts');
    }
}
