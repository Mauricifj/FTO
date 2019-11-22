<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

//////////////////////////////////////////////////////////////////
//  Name:   CreateUsersTable (class)
//
//  Author: Laravel (Jefferson Rodrigues de Oliveira)
//
//  Date:   27/10/2019
//
//  Description:
//    Columns(Name   : description)
//      id_USU       : user id,
//      status_USU   : user status,
//      isop_USU     : user is operative?,
//      name_USU     : user name,
//      email_USU    : user e-mail for login, 
//      password_USU : user password,
//
//////////////////////////////////////////////////////////////////
class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->boolean('is_active');
            $table->enum('role', ['admin', 'manager', 'member']);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->timestamps();

            $table->rememberToken();
         //   $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
