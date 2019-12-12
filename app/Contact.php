<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = ['description', 'extra', 'id_user', 'id_refference', 'id_customer', 'id_supplier'];

    protected $hidden = ['id_user', 'id_refference', 'id_customer', 'id_supplier'];

    public $timestamps = false;

    public function refference()
    {
        return $this->belongsTo('App\Refference', 'id_refference');
    }

    public function customer()
    {
        return $this->belongsTo('App\Customer', 'id_customer');
    }

    public function supplier()
    {
        return $this->belongsTo('App\Supplier', 'id_supplier');
    }
}
