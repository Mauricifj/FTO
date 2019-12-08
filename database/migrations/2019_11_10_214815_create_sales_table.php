<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesTable extends Migration
{

    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->increments('id');

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
            $table->string('extra',200)->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sales');
    }
}
