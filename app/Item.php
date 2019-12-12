<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ['price', 'quantity', 'total', 'description', 'id_sale', 'id_product', 'id_receipt'];

    public $timestamps = false;

    public function sale()
    {
        return $this->belongsTo('App\Sale', 'id_sale');
    }

    public function receipt()
    {
        return $this->belongsTo('App\Receipt', 'id_receipt');
    }

    public function product()
    {
        return $this->belongsTo('App\Product', 'id_product');
    }
}



