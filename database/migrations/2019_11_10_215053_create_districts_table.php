<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDistrictsTable extends Migration
{
    public function up()
    {
        Schema::create('districts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',100);
            $table->string('extra',200)->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('districts');
    }
}
