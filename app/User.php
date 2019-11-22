<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

//////////////////////////////////////////////////////////////////
//  Name:   User - Authenticatable (class)
//
//  Author: Laravel (Jefferson Rodrigues de Oliveira)
//
//  Date:   27/10/2019
//
//  Description:
//    Columns(Name   : description)
//      name     : user name,
//      email    : user e-mail for login,
//      password : user password,
//      status   : user status,
//      is_active     : user is active?,
//
//////////////////////////////////////////////////////////////////
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'status', 'is_active'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token'
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
