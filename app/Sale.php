<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = ['invoice', 'description', 'type', 'situation', 'condition', 'ended_at', 'amount', 'discount', 'total', 'id_user', 'id_refference', 'id_customer', 'created_at'];

    protected $hidden = ['id_user', 'id_refference', 'id_customer'];

    public $timestamps = true;

    public function refference()
    {
        return $this->belongsTo('App\Refference', 'id_refference');
    }

    public function customer()
    {
        return $this->belongsTo('App\Customer', 'id_customer');
    }

    public function products()
    {
        return $this->belongsToMany('App\Product', 'product_sale', 'id_sale', 'id_product');
    }

    public function items()
    {
        return $this->hasMany('App\Item', 'id_sale');
    }
}