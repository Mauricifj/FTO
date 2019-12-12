<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    protected $fillable = ['description', 'invoice', 'situation', 'extra', 'id_user', 'id_supplier'];

    protected $hidden = ['id_user', 'id_supplier'];

    public $timestamps = false;

    public function supplier()
    {
        return $this->belongsTo('App\Supplier', 'id_supplier');
    }

    public function products()
    {
        return $this->belongsToMany('App\Product', 'product_receipt', 'id_product', 'id_receipt');
    }

    public function items()
    {
        return $this->hasMany('App\Item', 'id_receipt');
    }
}
