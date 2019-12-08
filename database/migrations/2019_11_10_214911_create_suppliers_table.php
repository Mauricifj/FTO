<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuppliersTable extends Migration
{
    public function up()
    {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fantasy_name',100);
            $table->string('company_name',100);
            $table->string('cnpj',14)->unique();

            $table->string('address',100);
            $table->string('number',6);
            $table->string('complement',20)->nullable();
            $table->string('zipcode',8);
            $table->string('extra',200)->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('suppliers');
    }
}
