<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportsTable extends Migration
{
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->increments('id');
            $table->string('description',100);
            $table->date('date');
            $table->string('extra',200)->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('reports');
    }
}
