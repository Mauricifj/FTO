<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReferenceType extends Model
{
    protected $fillable = ['value', 'description'];

    public static function allTypes()
    {
        return $types = array(
            new ReferenceType(array('value' => 'type', 'description' => 'Tipo')),
            new ReferenceType(array('value' => 'state', 'description' => 'Estado')),
            new ReferenceType(array('value' => 'payment_method', 'description' => 'Forma de pagamento')),
            new ReferenceType(array('value' => 'contact_type', 'description' => 'Tipo de contato')),
            new ReferenceType(array('value' => 'report_type', 'description' => 'Tipo de relatório'))
        );
    }
}
