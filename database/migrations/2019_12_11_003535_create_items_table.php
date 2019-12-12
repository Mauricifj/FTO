<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->increments('id');

            $table->float('price', 10, 2)->nullable();
            $table->float('total', 10, 2)->nullable();
            $table->integer('quantity');
            $table->string('description');
        });
    }

    public function down()
    {
        Schema::dropIfExists('items');
    }
}
