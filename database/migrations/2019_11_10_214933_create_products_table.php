<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('class', ['product', 'material', 'service']);
            $table->string('description',100);
            $table->string('measurement_unit',10)->nullable();
            $table->decimal('cost',9,2);
            $table->decimal('price',9,2);
            $table->integer('minimum_quantity');
            $table->integer('quantity');
            $table->string('extra',200)->nullable();
            $table->dateTime('updated_at')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
}
