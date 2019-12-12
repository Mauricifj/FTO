<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = ['name', 'extra', 'id_user', 'id_refference'];

    protected $hidden = ['id_user', 'id_refference'];

    public $timestamps = false;

    public function districts()
    {
        return $this->hasMany('App\District', 'id_city');
    }

    public function customers()
    {
        return $this->hasMany('App\Customer', 'id_city');
    }

    public function suppliers()
    {
        return $this->hasMany('App\Supplier', 'id_city');
    }

    public function refference()
    {
        return $this->belongsTo('App\Refference', 'id_refference');
    }

}