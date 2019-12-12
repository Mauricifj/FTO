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
            $table->string('invoice',29);
            $table->enum('situation', ['active', 'canceled']);
            $table->string('extra',200)->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('receipts');
    }
}
