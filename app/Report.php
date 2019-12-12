<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $fillable = ['sales', 'id_user'];

    protected $hidden = ['id_user'];

    public $timestamps = false;
}