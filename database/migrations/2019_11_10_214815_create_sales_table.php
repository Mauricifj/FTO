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

            $table->string('description', 100);
            $table->string('invoice', 29);
            $table->enum('condition', ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10']);
            $table->string('type', 20);

            $table->datetime('ended_at')->nullable();

            $table->float('amount', 10, 2);
            $table->float('discount', 10, 2);
            $table->float('total', 10, 2);

            $table->enum('situation', ['canceled', 'not_paid', 'awaiting_payment', 'paid']);
            $table->string('extra', 200)->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sales');
    }
}
