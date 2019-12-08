<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRefferencesTable extends Migration
{
    public function up()
    {
        Schema::create('refferences', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('type', ['type', 'state', 'payment_method', 'contact_type','report_type']);
            $table->string('description',100);
            $table->string('acronym',10);
            $table->string('extra',200)->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('refferences');
    }
}
