<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',100);
            $table->enum('gender', ['m', 'f']);
            $table->date('birthdate');
            $table->string('cpf',15)->unique();

            $table->string('address',100);
            $table->string('number',6);
            $table->string('complement',20)->nullable();
            $table->string('zipcode',8);
            $table->string('extra',200)->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
