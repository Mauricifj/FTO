<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductClass extends Model
{
    protected $fillable = ['value', 'description'];

    public static function allClasses()
    {
        return $types = array(
            new ProductClass(array('value' => 'product', 'description' => 'Comerciável')),
            new ProductClass(array('value' => 'service', 'description' => 'Serviço')),
            new ProductClass(array('value' => 'material', 'description' => 'Material')),
        );
    }
}
