<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['class', 'description', 'measurement_unit', 'cost', 'price', 'minimum_quantity', 'quantity', 'extra', 'id_user', 'id_refference'];

    protected $hidden = ['id_user', 'id_refference'];

    public $timestamps = false;

    public function refference()
    {
        return $this->belongsTo('App\Refference', 'id_refference');
    }

    public function sales()
    {
        return $this->belongsToMany('App\Sale', 'product', 'id_product', 'id_sale');
    }

    public function receipts()
    {
        return $this->belongsToMany('App\Receipt');
    }

    public function suppliers()
    {
        return $this->belongsToMany('App\Supplier', 'product_supplier', 'id_product', 'id_supplier');
    }
}