<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Refference extends Model
{
    protected $fillable = ['type', 'description', 'acronym', 'extra', 'id_user'];

    protected $hidden = ['id_user'];

    public $timestamps = false;

    public function cities()
    {
        return $this->hasMany('App\City', 'id_refference');
    }

    public function contacts()
    {
        return $this->hasMany('App\Contact', 'id_refference');
    }

    public function customers()
    {
        return $this->hasMany('App\Customer', 'id_refference');
    }

    public function products()
    {
        return $this->hasMany('App\Product', 'id_refference');
    }

    public function receipts()
    {
        return $this->hasMany('App\Receipt', 'id_refference');
    }

    public function reports()
    {
        return $this->hasMany('App\Report', 'id_refference');
    }

    public function sales()
    {
        return $this->hasMany('App\Sale', 'id_refference');
    }

    public function suppliers()
    {
        return $this->hasMany('App\Supplier', 'id_refference');
    }
}