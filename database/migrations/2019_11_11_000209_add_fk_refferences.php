<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFkRefferences extends Migration
{
    public function up()
    {
        Schema::table('refferences', function (Blueprint $table) {
            $table->integer('id_user')->unsigned();
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('refferences', function (Blueprint $table) {
            $table->dropForeign('id_user');
            $table->dropColumn('id_user');
        });
    }
}
