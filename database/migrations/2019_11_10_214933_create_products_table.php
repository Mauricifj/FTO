<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

//////////////////////////////////////////////////////////////////
//  Name:   CreateProductsTable - migration (class)
//
//  Author: Jefferson Rodrigues de Oliveira
//
//  Date:   04/11/2019
//
//  Description:
//    Columns(Name : description)
//      id_PRO(PK) : id for table Contact, 
//      id_USU(FK) : user id who signed up,
//      type_PRO   : product type (product, material or service)
//      id_REF(FK) : set class for product, 
//      id_SUP(FK) : set product supplier,
//      desc_PRO   : product description, 
//      umea_PRO   : product unit of measurement
//      cost_PRO   : product cost,
//      value_PRO  : product value (desnormalized),
//      min_PRO    : minimum stock quantity,
//      stoc_PRO   : quantity in stock,
//      extra_CON  : extra information 
//
//////////////////////////////////////////////////////////////////
class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            // $table->timestamps();
         
            $table->string('type',10);
            $table->string('description',100);
            $table->string('unit_measurement',10);
            $table->float('cost',2);
            $table->float('amount',2);
            $table->integer('stock_minimum');
            $table->integer('quantity');
            $table->string('extra',200)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
